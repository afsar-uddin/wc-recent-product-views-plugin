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
define('WRPV_PATH', plugin_dir_path((__FILE__)));
define('WRPV_URI', plugin_dir_url((__FILE__)));

// echo WRPV_PATH;
// echo "<br/>";
// echo WRPV_URI;

// check woocommerce plugin activation
if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    if(class_exists('WRPV_core')) {
        class WRPV_core {
            public function __construct()
            {
                // do code
            }
        }
    }
}
