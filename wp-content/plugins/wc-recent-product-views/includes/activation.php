<?php

/**
 * @package we recently viewd products
 */
if(!defined('ABSPATH')) {
    exit; //Exit if accessed directly
}

if(!function_exists('wrpv_activation')) {
    function wrpv_activation() {
        if(!get_option('wrpv_settings')) {
            add_option('wrpv_settings', array(
                'wrpv_label' => 'Recently viewed products',
                'wrpv_numb_products' => 4,
                'product_position' => 'after_related_product',
                'wrpv_in_shop_page' => '',
                'wrpv_in_cart_page' => 'enabled'
            ));
        }
    }
}
