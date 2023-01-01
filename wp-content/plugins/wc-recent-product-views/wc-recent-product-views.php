<?php
/**
 * Plugin Name: Woocommerce Recent Product Views
 * Plugin URI: https://www.notionwebtech.com
 * Description: Show recenty product views by user on your woocommerce store
 * Version: 1.0.1
 * Author: Afsar Uddin
 * Author URI: http:afsar-uddin.notionwebtech.com
 * License: GPLV2 or later
 * Text Domain: wrpv
 */

// directory access forbiden
if(!function_exists('add_action')) {
    echo "silent is golden!";
    exit;
}

// wordpress version check
if(version_compare(get_bloginfo('version'), '4.0', '<')) {
    $message = "Need wordpress version 4.0 or higher";
    die($message);
}


// constants
define('WRPV_PATH', plugin_dir_path(__FILE__));
define('WRPV_URI', plugin_dir_url(__FILE__));

// echo WRPV_PATH;
// echo "<br/>";
// echo WRPV_URI;


// var_dump(WRPV_PATH.'includes/activation.php');

// check woocommerce plugin activation
// if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        
    if(!class_exists('WRPV_core')) {
        class WRPV_core {
            public function __construct()
            {
                /**
                 * file includes
                 */
                require(WRPV_PATH."views/admin/setting_page.php");
                require(WRPV_PATH."views/front-end/wrpv_view_products.php");
                require(WRPV_PATH."includes/activation.php");

                /**
                 * includes classes
                 */
                require(WRPV_PATH."classes/Wrpv_setting_page.php");
                require(WRPV_PATH."classes/Wrpv_save_settings.php");
                require(WRPV_PATH."classes/Wrpv.php");

                 /**
                  * Hooks
                  */
                  register_activation_hook( __FILE__, 'wrpv_activation' ); //wrpv_activation is the callback function

                  add_action('init', array(new Wrpv(), 'wrpv_start_session'), 10);
                  add_action('init', array(new Wrpv(), 'wrpv_init_session'), 15);
                  add_action('wp', array(new Wrpv(), 'wrpv_update_product'));

                  add_action('admin_menu', array(new wrpv_setting_page(), 'wrpv_create_setting_page'));
                  add_action('admin_post_wrpv_save_settings_field', array(new Wrpv_save_settings(), 'wrpv_save_admin_field_settings'));



                  /**
                   * Shortcodes
                   */
            }
        }
        $WRPV_core = new WRPV_core();
    }
}


function wrpv_test() {
    wrpv_view_products();
}

add_action('wp_footer', 'wrpv_test');