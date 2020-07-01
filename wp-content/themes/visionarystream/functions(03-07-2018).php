<?php

// Enable Menu options

function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'account-details' => __( 'Account Details' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' ); 



// Add the custom field "favorite_color"
/*add_action( 'woocommerce_edit_account_form', 'add_favorite_color_to_edit_account_form' );
function add_favorite_color_to_edit_account_form() {
    $user = wp_get_current_user();
    ?>
		<fieldset>
            <legend><?php esc_html_e( 'PRESCRIPTION', 'woocommerce' ); ?></legend>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="text-align:left;">
            	<label for="upload_a_photo_of_it"><?php esc_html_e( 'UPLOAD A PHOTO OF IT', 'woocommerce' ); ?></label>
                <input type="file" name="upload_a_photo_of_it" id="upload_a_photo_of_it"><br>
                <?php
				if(!empty($user->upload_a_photo_of_it))
				{
					$image_attributes = wp_get_attachment_image_src($user->upload_a_photo_of_it);
                	echo '<img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'">';
				}
				?>
            </p>
    
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="text-align:left;">
                <input type="checkbox" name="send_it_to_us_later" value="send_later" id="send_it_to_us_later" <?php if(esc_attr( $user->send_it_to_us_later ) == 'send_later'){ echo 'checked'; }?>> SEND IT TO US LATER<br>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" style="text-align:left;">
                <input type="checkbox" name="book_an_on_demand_eye_exam" value="book_exam" id="book_an_on_demand_eye_exam" <?php if(esc_attr( $user->book_an_on_demand_eye_exam ) == 'book_exam'){ echo 'checked'; }?>> BOOK AN ON DEMAND EYE EXAM<br>
            </p>
          
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="i_need_reading_glasses"><?php esc_html_e( 'I NEED READING GLASSES', 'woocommerce' ); ?></label>
                <select name="i_need_reading_glasses">
                	<option value=""> - Select - </option>
                    <option value="1.00" <?php if(esc_attr( $user->i_need_reading_glasses) == 1.00){ echo 'selected'; } ?>>1.00</option>
                    <option value="1.25" <?php if(esc_attr( $user->i_need_reading_glasses) == 1.25){ echo 'selected'; } ?>>1.25</option>
                    <option value="1.50" <?php if(esc_attr( $user->i_need_reading_glasses) == 1.50){ echo 'selected'; } ?>>1.50</option>
                    <option value="1.75" <?php if(esc_attr( $user->i_need_reading_glasses) == 1.75){ echo 'selected'; } ?>>1.75</option>
                    <option value="2.00" <?php if(esc_attr( $user->i_need_reading_glasses) == 2.00){ echo 'selected'; } ?>>2.00</option>
                    <option value="2.25" <?php if(esc_attr( $user->i_need_reading_glasses) == 2.25){ echo 'selected'; } ?>>2.25</option>
                    <option value="2.50" <?php if(esc_attr( $user->i_need_reading_glasses) == 2.50){ echo 'selected'; } ?>>2.50</option>
                    <option value="2.75" <?php if(esc_attr( $user->i_need_reading_glasses) == 2.75){ echo 'selected'; } ?>>2.75</option>
                    <option value="3.00" <?php if(esc_attr( $user->i_need_reading_glasses) == 3.00){ echo 'selected'; } ?>>3.00</option>
                    <option value="3.25" <?php if(esc_attr( $user->i_need_reading_glasses) == 3.25){ echo 'selected'; } ?>>3.25</option>
                    <option value="3.50" <?php if(esc_attr( $user->i_need_reading_glasses) == 3.50){ echo 'selected'; } ?>>3.50</option>
                    <option value="3.75" <?php if(esc_attr( $user->i_need_reading_glasses) == 3.75){ echo 'selected'; } ?>>3.75</option>
                    <option value="4.00" <?php if(esc_attr( $user->i_need_reading_glasses) == 4.00){ echo 'selected'; } ?>>4.00</option>
                </select>
            </p>
        </fieldset>
    <?php
}*/

// Save user custom fields....
/*add_action( 'woocommerce_save_account_details', 'save_favorite_color_account_details', 12, 1 );
function save_favorite_color_account_details( $user_id )
{

  	$allowedTypes = array('image/gif', 'image/jpeg', 'image/png');
	
	if (in_array($_FILES["upload_a_photo_of_it"]["type"], $allowedTypes) && ($_FILES["upload_a_photo_of_it"]["size"] < 1048576)){

		require_once( ABSPATH . 'wp-admin/includes/image.php' );
    	require_once( ABSPATH . 'wp-admin/includes/file.php' );
    	require_once( ABSPATH . 'wp-admin/includes/media.php' );
		// Let WordPress handle the upload.
		$img_id = media_handle_upload( 'upload_a_photo_of_it', 0 );
	
		if ( is_wp_error( $img_id ) ) 
		{
		  //echo "Error";
		}
		else
		{
		  update_user_meta( $user_id, 'upload_a_photo_of_it', $img_id );
		  //echo "success";
		}
	
	}
	
    if( isset( $_POST['send_it_to_us_later'] ) )
	{
		update_user_meta( $user_id, 'send_it_to_us_later', sanitize_text_field( $_POST['send_it_to_us_later'] ) );
	}
	
	if( isset( $_POST['book_an_on_demand_eye_exam'] ) )
	{
		update_user_meta( $user_id, 'book_an_on_demand_eye_exam', sanitize_text_field( $_POST['book_an_on_demand_eye_exam'] ) );
	}
	
	if( isset( $_POST['i_need_reading_glasses'] ) )
	{
		update_user_meta( $user_id, 'i_need_reading_glasses', sanitize_text_field( $_POST['i_need_reading_glasses'] ) );
	}
	
    // For Billing email (added related to your comment)
    if( isset( $_POST['account_email'] ) )
	{
        update_user_meta( $user_id, 'billing_email', sanitize_text_field( $_POST['account_email'] ) );
	}
}*/

////////////////////////////////////
if ( ! function_exists('custom_meta_to_order') ) {
    add_action('woocommerce_checkout_update_order_meta', 'custom_meta_to_order', 20, 1);
    function custom_meta_to_order( $order_id ) {
        // get an instance of the WC_Order object
        $order = wc_get_order( $order_id );
		
		/*$cj = $_FILES["upload_a_photo_of_it"]["type"];
		$allowedTypes = array('image/gif', 'image/jpeg', 'image/png');
	
		if (in_array($_FILES["upload_a_photo_of_it"]["type"], $allowedTypes) && ($_FILES["upload_a_photo_of_it"]["size"] < 1048576)){
	
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			require_once( ABSPATH . 'wp-admin/includes/media.php' );
			// Let WordPress handle the upload.
			$img_id = media_handle_upload( 'upload_a_photo_of_it', 0 );
		
			if ( is_wp_error( $img_id ) ) 
			{
			  $cj = "Error";
			}
			else
			{
			  $order->update_meta_data('upload_a_photo_of_it', $img_id);
			  $cj = "success";
			}
		
		}*/
		
		//$order->update_meta_data('test_2', $cj);
		
		if( isset( $_POST['send_it_to_us_later'] ) )
		{
			$order->update_meta_data('send_it_to_us_later', sanitize_text_field( $_POST['send_it_to_us_later'] ));
		}
		
		if( isset( $_POST['book_an_on_demand_eye_exam'] ) )
		{
			$order->update_meta_data('book_an_on_demand_eye_exam', sanitize_text_field( $_POST['book_an_on_demand_eye_exam'] ));
		}
		
		if( isset( $_POST['i_need_reading_glasses'] ) )
		{
			$order->update_meta_data('i_need_reading_glasses', sanitize_text_field( $_POST['i_need_reading_glasses'] ));
		}
        // Save the order data and meta data
        $order->save();
    }
}


wp_dequeue_script('wc-add-to-cart');
wp_enqueue_script( 'wc-add-to-cart', get_bloginfo( 'stylesheet_directory' ). '/js/add-to-cart.js' , array( 'jquery' ), false, true );

add_filter( 'wc_add_to_cart_message_html', 'empty_wc_add_to_cart_message');
function empty_wc_add_to_cart_message() { 
    return ''; 
}; 

// Custom image size
/*add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup()
{
    add_image_size( 'review_profile_image', 81, 81, array( 'center', 'top' ) );
	add_image_size( 'our_goal', 87, 79, array( 'center', 'top' ) );
	add_image_size( 'review_Poppa', 370, 274, array( 'center', 'top' ) );
	add_image_size( 'how_it_works', 372, 237, array( 'center', 'top' ) );
	//add_image_size( 'home_blog_single_image', 380, 250, array( 'center', 'top' ) );
}*/

//////////////////// Custom pages //////////////////////
/*include_once('custom_admin_pages/review_poppa.php');
include_once('custom_admin_pages/email_approve.php');
include_once('custom_admin_pages/stripe_and_sendgrid.php');*/