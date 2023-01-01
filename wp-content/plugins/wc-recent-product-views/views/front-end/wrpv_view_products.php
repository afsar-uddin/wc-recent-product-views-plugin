<?php 

if(!function_exists('wrpv_view_products')) {
    function wrpv_view_products($col_num = 0, $product_num = 0) {
        $products = new Wrpv();
        $product_ids = $products->wrpv_get_products();

        if(! $product_ids) {
            return false;
        }

        if(count($product_ids) <= 0) {
            return false;
        }

        $wrpv_settings = get_option('wrpv_settings');

        if($product_num == 0) {
            $num_of_display_products = isset($wrpv_settings['wrpv_numb_products']) ? $wrpv_settings['wrpv_numb_products'] : 4;
        } else {
            $num_of_display_products = $product_num;
        }

        if(count($product_ids) > $num_of_display_products) {
            $ids = array_slice($product_ids,  -1 * $num_of_display_products, $num_of_display_products, true); 
        } else {
            $ids = $product_ids;
        }

        $the_query = new WP_Query(array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'post__in' => array_reverse($ids),
            'orderby' => 'post__in'
        ));

        if($the_query->have_posts()) {
            echo '<section classs="products">';
            echo '<h2>'.isset($wrpv_settings['wrpv_label']) ? $wrpv_settings['wrpv_label'] : ''.'</h2>';

            if($col_num == 0) {
                $col = 4;
            } else {
                $col = $col_num;
            }

            echo '<ul class="products columns-'.apply_filters('loop_shop_columns', $col).'">';

            while($the_query->have_posts()) : $the_query->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            echo '</ul>';

            echo '</section>';

            wp_reset_postdata();
        } else {
            return false;
        }
    }
}

// var_dump(wrpv_view_products());

?>