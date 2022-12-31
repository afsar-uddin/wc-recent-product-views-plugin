<?php
/**
 * @package we recently viewd products
 */


if(!class_exists('Wrpv')) {
    class Wrpv {
        // start session if not start already
        public function wrpv_start_session() {
            if(! session_id()) {
                session_start();
            }
        }

        // create session name
        public function wrpv_session_name() {
            if(is_user_logged_in()) {
                $user_id = get_current_user_id();
                // var_dump($user_id);
                $wrpv_session_name = 'wrpv_product_'.$user_id;
            } else {
                $wrpv_session_name = 'wrpv_product_guest';
            }

            return $wrpv_session_name;
        }

        // init session for current user
        public function wrpv_init_session() {
            $session_init = $this->wrpv_session_name();
            
            if(!isset($_SESSION[$session_init])) {
                $_SESSION[$session_init] = serialize(array());
            }
        }

        // get current user session
        public function wrpv_get_products() {
            $session_init = $this->wrpv_session_name();
            
            if(!isset($_SESSION[$session_init])) {
                return false;
            }

            return unserialize($_SESSION[$session_init]);
        }

        // update user session
        public function wrpv_update_product() {
            $session_init = $this->wrpv_session_name();
            if(!is_product()) {
                return false;
            }

            $viewed_products = $this->wrpv_get_products();

            if(!in_array(get_the_ID(), $viewed_products)) {
                $viewed_products[] = get_the_ID();
            } else {
                $current_product_key = array_search(get_the_ID(), $viewed_products);
                unset($viewed_products[$current_product_key]);
                $viewed_products[] = get_the_ID();
            }
            $_SESSION[$session_init] = serialize($viewed_products);
        }
    }
}