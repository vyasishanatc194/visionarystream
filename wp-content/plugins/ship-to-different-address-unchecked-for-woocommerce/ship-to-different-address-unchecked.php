<?php
/*
  Plugin Name:        Ship to Different Address Unchecked for WooCommerce
  Description:        Enabled the option to make the "Ship to Different Address" checkbox default to unchecked on the WooCommerce checkout page.
  Author:             eCreations
  Author URI:         https://www.ecreations.net
  License:            GPLv3
  License URI:        http://www.gnu.org/licenses/quick-guide-gplv3.html
  Text Domain:        ship-to-different-address-unchecked
  Version:            1.2
  Requires at least:  3.0.0
  Tested up to:       5.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Check for WooCommerce
add_action( 'init', 'sdau_woocheck' );
function sdau_woocheck () {
  if (class_exists( 'WooCommerce' )) {
    // Add filter to default the checkbox to unchecked
    add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );
  }else{
    add_action( 'admin_notices', 'sdau_missing_wc_notice' );
  }
}


// Admin Error Message
function sdau_missing_wc_notice() {
  ?>
  <div class="error notice">
      <p><?php _e( 'You need to install and activate WooCommerce in order to use the "Ship to Different Address Unchecked for WooCommerce" plugin!', 'ship-to-different-address-unchecked' ); ?></p>
  </div>
  <?php
}