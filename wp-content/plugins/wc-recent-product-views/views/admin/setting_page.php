<?php
/**
 * @package we recently viewd products
 */
if(!defined('ABSPATH')) {
    exit; //Exit if accessed directly
}

function wrpv_settings_page_callback() {
    ?>
        <div id="wpbody" role="main">
            <div id="wpbody-content" aria-label="Main content" tabindex="0">
                <div class="wrap">
                    <h1><?php _e('WC Recently viewed products', 'wrpv'); ?></h1>
                    <?php
                        if(isset($_GET['success'])) {
                            ?>
                                <div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"> 
                                    <p><strong><?php echo urldecode($_GET['success']); ?></strong></p>
                                    <button type="button" class="notice-dismiss"><span class="screen-reader-text"><?php __('Dismiss this notice.', 'wrpv'); ?></span></button>
                                </div>
                            <?php
                        }
                        if(isset($_GET['error'])) {
                            echo urldecode($_GET['error']);
                        }
                    ?>

                    <table class="form-table">
                        <tbody>

                            <form action="admin-post.php" method="post" novalidate="novalidate">
                                <input type="hidden" name="action" value="wrpv_save_settings_field">
                                <?php wp_nonce_field('wrpv_save_settings_field_verify'); 
                                    $settings = get_option('wrpv_settings');
                                ?>
                                <tr>
                                    <th>
                                        <label for="wrpv_label"><?php _e('Recently viewed products', 'wrpv'); ?></label>
                                    </th>
                                    <td><input id="wrpv_label" type="text" name="wrpv_label" 
                                    value="<?php if(isset($settings['wrpv_label'])) {echo $settings['wrpv_label'];} ?>" class="regular-text"></td>
                                </tr>        
                                <tr>
                                    <th>
                                        <label for="wrpv_numb_products"><?php _e('Product shows items', 'wrpv'); ?></label>
                                    </th>
                                    <td><input id="wrpv_numb_products" type="number" name="wrpv_numb_products" value="<?php if(isset($settings['wrpv_numb_products'])) {echo $settings['wrpv_numb_products'];} ?>" class="regular-text"></td>
                                </tr>        
                                <tr>
                                    <th>
                                        <label for="wrpv_in_shop_page"><?php _e('Position in product page', 'wrpv'); ?></label>
                                    </th>
                                    <td>
                                        <input <?php if(isset($settings['product_position'])) {if($settings['product_position'] == 'before_relate_product') {echo 'checked' ;}} ?> id="before_relate_product" type="radio" name="product_position" value="before_relate_product">
                                        <span><?php _e('Before related products', 'wrpv'); ?></span>                                       <br>

                                        <input  <?php if(isset($settings['product_position'])) {if($settings['product_position'] == 'after_relate_product') {echo 'checked' ;}} ?> id="after_relate_product" type="radio" name="product_position" value="after_relate_product">
                                        <span><?php _e('After related products', 'wrpv'); ?></span>                                   
                                    </td>
                                </tr>        
                                <tr>
                                    <th>
                                        <label for="wrpv_in_shop_page"><?php _e('Shop page shows / hide', 'wrpv'); ?></label>
                                    </th>
                                    <td><input <?php if(isset($settings['wrpv_in_shop_page'])) { if($settings['wrpv_in_shop_page'] == 'enabled') { echo 'checked'; } }?> id="wrpv_in_shop_page" type="checkbox" name="wrpv_in_shop_page" value="enabled"></td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="wrpv_in_cart_page"><?php _e('Cart page shows / hide', 'wrpv'); ?></label>
                                    </th>
                                    <td><input <?php if(isset($settings['wrpv_in_cart_page'])) { if($settings['wrpv_in_cart_page'] == 'enabled') { echo 'checked'; } }?> id="wrpv_in_cart_page" type="checkbox" name="wrpv_in_cart_page" value="enabled"></td>
                                </tr>
                                <tr>
									<td>
										<button name="save" class="button-primary" type="submit" value="<?php _e('Save Changes', 'wrpv'); ?>">Save changes</button>
									</td>
								</tr>
                            </form>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    <?php
}