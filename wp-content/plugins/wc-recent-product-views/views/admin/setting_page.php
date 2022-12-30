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
                    <h2><?php _e('WC Recently viewed products', 'wrpv'); ?></h2>

                    <table class="form-table">
                        <tbody>

                            <form action="options.php" method="post" novalidate="novalidate">
                                <tr>
                                    <th>
                                        <label for="wrpv_label"><?php _e('Recently viewed products', 'wrpv'); ?></label>
                                    </th>
                                    <td><input id="wrpv_label" type="text" name="wrpv_label" value="" class="regular-text"></td>
                                </tr>        
                                <tr>
                                    <th>
                                        <label for="wrpv_numb_products"><?php _e('Product shows items', 'wrpv'); ?></label>
                                    </th>
                                    <td><input id="wrpv_numb_products" type="number" name="wrpv_numb_products" value="" class="regular-text"></td>
                                </tr>        
                                <tr>
                                    <th>
                                        <label for="wrpv_in_shop_page"><?php _e('Position in product page', 'wrpv'); ?></label>
                                    </th>
                                    <td>
                                        <input id="before_relate_product" type="radio" name="select_product" value="">
                                        <label for="before_related_p"><?php _e('Before related products', 'wrpv'); ?></label>                                       <br>

                                        <input id="after_relate_product" type="radio" name="select_product" value="">
                                        <label for="after_related_p"><?php _e('After related products', 'wrpv'); ?></label>                                   
                                    </td>
                                </tr>        
                                <tr>
                                    <th>
                                        <label for="wrpv_in_cart_page"><?php _e('Cart page shows / hide', 'wrpv'); ?></label>
                                    </th>
                                    <td><input id="wrpv_in_cart_page" type="checkbox" name="wrpv_in_cart_page" value="enabled"></td>
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