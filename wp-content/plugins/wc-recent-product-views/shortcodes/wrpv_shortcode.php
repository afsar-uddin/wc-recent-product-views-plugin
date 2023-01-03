<?php

if(!function_exists('wrpv_shortcode')) {
    function wrpv_shortcode($atts, $content = null) {
        extract(
            shortcode_atts(
                array(
                    'column' => 4,
                    'num_products' => 4
                ), $atts, 'wrpv'
            )
        );
        return wrpv_view_products($column, $num_products);
    }
}