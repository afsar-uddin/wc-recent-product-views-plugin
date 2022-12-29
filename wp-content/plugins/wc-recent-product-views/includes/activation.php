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
                'wrpv_in_shop_page' => '',
                'wrpv_in_cart_page' => 'enabled'
            ));
        }
    }
}

// if(!function_exists('rvps_activation')){
// 	/**
// 	 * [rvps_activation add setting option at the time of plugin activation]
// 	 * 
// 	 */
// 	function rvps_activation (){
// 		//check if rvps_settings option not found
// 		if(!get_option( 'rvps_settings' )){

// 				add_option( 'rvps_settings', array(
// 						'rvps_label' 			=> 'Recently viewed products',
// 						'rvps_numb_products' 	=> 4,
// 						'rvps_position' 		=> 'after_related_product',
// 						'rvps_in_shop_page' 	=> '',
// 						'rvps_in_cart_page' 	=> 'enabled'
// 				));
// 		}
// 	}
// }