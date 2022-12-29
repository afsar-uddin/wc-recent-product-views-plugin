<?php
/**
 * @package we recently viewd products
 */
if(!defined('ABSPATH')) {
    exit; //Exit if accessed directly
}

if(!class_exists('wrpv_setting_page')) {
    class wrpv_setting_page {
        public function wrpv_create_setting_page() {
            add_submenu_page('woocommerce', __('WC Recently Viewd Products', 'wrpv'), __('WC Recently Viewd Products', 'wrpv'), 'manage_options', 'wrpv_settings', 'wrpv_settings_page_callback');
        }
    }
}