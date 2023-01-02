<?php

if(!class_exists('Wrpv_view')) {
    class Wrpv_view {
        public function wrpv_show_after_related_products() {
            $wrpv_settings = get_option('wrpv_settings');

            // if(!isset($wrpv_settings['product_position']) && $wrpv_settings['product_position'] !=='after_relate_product') {
            //     return;
            // }

            if(!isset($wrpv_settings['product_position'])) {
                return;
            }

            if($wrpv_settings['product_position'] !== 'after_relate_product') {
                return;
            }

            if(wrpv_view_products()) {
                wrpv_view_products();
            }
        }

        public function wrpv_show_before_related_products() {
            $wrpv_settings = get_option('wrpv_settings');

            if(!isset($wrpv_settings['product_position'])) {
                return;
            }

            if($wrpv_settings['product_position'] !== 'before_relate_product') {
                return;
            }

            if(wrpv_view_products()) {
                wrpv_view_products();
            }
        }
    }
}

?>