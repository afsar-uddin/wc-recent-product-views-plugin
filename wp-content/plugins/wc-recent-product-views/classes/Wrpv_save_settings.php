<?php
/**
 * @package we recently viewd products
 */

 
 if(!class_exists('Wrpv_save_settings')) {
    class Wrpv_save_settings {
        public function wrpv_save_admin_field_settings() {
            check_admin_referer( 'wrpv_save_settings_field_verify' );

            if(!current_user_can( 'manage_options' )) {
                wp_die("You are failed, next!!!!!!");
            }
            // var_dump($_POST);
            // die();

            $wrpv_label = sanitize_text_field($_POST['wrpv_label']);
            $wrpv_numb_products = sanitize_text_field($_POST['wrpv_numb_products']);
            $product_position = sanitize_text_field($_POST['product_position']);
            $wrpv_in_shop_page = sanitize_text_field($_POST['wrpv_in_shop_page']);
            $wrpv_in_cart_page = sanitize_text_field($_POST['wrpv_in_cart_page']);

            $values = array(
                'wrpv_label' => $wrpv_label,
                'wrpv_numb_products' => $wrpv_numb_products,
                'product_position' => $product_position,
                'wrpv_in_shop_page' => $wrpv_in_shop_page,
                'wrpv_in_cart_page' => $wrpv_in_cart_page
            );

            if(!isset($wrpv_label) || empty($wrpv_label) || $wrpv_label == '') {
                wp_redirect(get_admin_url().'admin.php?page=wrpv_settings&error='.urlencode('Settings failed'));
                exit();    
            }

            update_option('wrpv_settings', $values);
            wp_redirect(get_admin_url().'admin.php?page=wrpv_settings&success='.urlencode('Settings saved'));
            exit();
        }
    }
 }
