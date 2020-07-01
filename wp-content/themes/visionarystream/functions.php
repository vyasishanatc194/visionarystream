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
					$image_attributes = wp_get_attachment_image_src($user->upload_a_photo_of_it, 'full');
                	echo '<img src="'.$image_attributes[0].'" width="'.$image_attributes[1].'" height="'.$image_attributes[2].'">';
				}
				?>
            </p>
        </fieldset>
    <?php
}

// Save user custom fields....
add_action( 'woocommerce_save_account_details', 'save_favorite_color_account_details', 12, 1 );
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
}*/

////////////////////////////////////
if ( ! function_exists('custom_meta_to_order') ) {
    add_action('woocommerce_checkout_update_order_meta', 'custom_meta_to_order', 20, 1);
    function custom_meta_to_order( $order_id ) {
        // get an instance of the WC_Order object
        $order = wc_get_order( $order_id );
		
		$user_id = get_current_user_id();
		
		if( isset( $_POST['send_it_to_us_later'] ) )
		{
			$order->update_meta_data('send_it_to_us_later', sanitize_text_field( $_POST['send_it_to_us_later'] ));
			update_user_meta( $user_id, 'send_it_to_us_later', sanitize_text_field( $_POST['send_it_to_us_later'] ) );
		}
		
		if( isset( $_POST['book_an_on_demand_eye_exam'] ) )
		{
			$order->update_meta_data('book_an_on_demand_eye_exam', sanitize_text_field( $_POST['book_an_on_demand_eye_exam'] ));
			update_user_meta( $user_id, 'book_an_on_demand_eye_exam', sanitize_text_field( $_POST['book_an_on_demand_eye_exam'] ) );
		}
		
		if( isset( $_POST['i_need_reading_glasses'] ) )
		{
			$order->update_meta_data('i_need_reading_glasses', sanitize_text_field( $_POST['i_need_reading_glasses'] ));
			update_user_meta( $user_id, 'i_need_reading_glasses', sanitize_text_field( $_POST['i_need_reading_glasses'] ) );
		}
        // Save the order data and meta data
        $order->save();
    }
}

add_action('wp_enqueue_scripts', function() {
  wp_dequeue_script('wc-add-to-cart');
  wp_enqueue_script( 'wc-add-to-cart', get_bloginfo( 'stylesheet_directory' ). '/js/add-to-cart.js' , array( 'jquery' ), false, true );
  wp_dequeue_script('cart.min');
  wp_enqueue_script( 'wc-add-to-cart', get_bloginfo( 'stylesheet_directory' ). '/js/cart.min.js' , array( 'jquery' ), false, true );
});

add_filter( 'wc_add_to_cart_message_html', 'empty_wc_add_to_cart_message');
function empty_wc_add_to_cart_message() { 
    return ''; 
}; 

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 
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


// Register Custom Post Type
function register_logos() {

	$labels = array(
		'name'                  => 'Logos',
		'singular_name'         => 'Logo',
		'menu_name'             => 'Logos',
		'name_admin_bar'        => 'Logo',
		'archives'              => 'Logo Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Logo',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'logo_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'logo', $args );
}
add_action( 'init', 'register_logos', 0 );


/* ADD FOOTER Need Help WIDGET */
add_action( 'widgets_init', 'footer_need_help_register_widgets' ); 
function footer_need_help_register_widgets() {
    register_sidebar( array(
        'name'          => __( 'Footer Need Help', 'Second' ),
        'id'            => 'footer-need-help',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'first' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}


/* ADD FOOTER 1 WIDGET */
add_action( 'widgets_init', 'footer_1_register_widgets' ); 
function footer_1_register_widgets() {
    register_sidebar( array(
        'name'          => __( 'Footer 1', 'First' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'first' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}

/* ADD FOOTER 2 WIDGET */
add_action( 'widgets_init', 'footer_2_register_widgets' ); 
function footer_2_register_widgets() {
    register_sidebar( array(
        'name'          => __( 'Footer 2', 'Second' ),
        'id'            => 'footer-2',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'first' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}

/* ADD FOOTER 3 WIDGET */
add_action( 'widgets_init', 'footer_3_register_widgets' ); 
function footer_3_register_widgets() {
    register_sidebar( array(
        'name'          => __( 'Footer 3', 'Second' ),
        'id'            => 'footer-3',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'first' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}

/* ADD FOOTER 4 WIDGET */
add_action( 'widgets_init', 'footer_4_register_widgets' ); 
function footer_4_register_widgets() {
    register_sidebar( array(
        'name'          => __( 'Footer 4', 'Second' ),
        'id'            => 'footer-4',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'first' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}

//ajax localise
function pw1_load_scripts() {
	wp_enqueue_script('pw1-script', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'));
	wp_localize_script('pw1-script', 'pw1_script_vars', array(
	  'ajaxurl' => admin_url('admin-ajax.php'),
	  'siteurl' => get_stylesheet_directory_uri(),
	  'security' => wp_create_nonce('visionarystream'),
	)); 
  }
add_action('wp_enqueue_scripts', 'pw1_load_scripts');

// action to save data in db
function view_detail() {
	check_ajax_referer('visionarystream', 'security');
	$insertdata = [];
	$result = [];
	// default response
	$result['success'] = false;
	$result['data'] = [
		'message' => 'Network error.',
	];

	$product = new WC_product($_POST['productId']);
	$attachment_ids = $product->get_gallery_image_ids();
	$sales_price = $product->sale_price;
	$html = '';

	$html .= '<div class="frame-img"><div class="owl-carousel owl-carousel-frame owl-theme">';
	foreach( $attachment_ids as $attachment_id ) {
		$html .= '<div class="item"><div class="frame-box">';
		$html .= '<img src="'.wp_get_attachment_url( $attachment_id ).'" alt="">';
		$html .= '</div></div>';
	}
	$html .= '</div></div> ';
	$html .= '<div class="frame-content"><div class="frame-desc">';
	$html .= '<h3>'.$product->name.'</h3><h2>Fame Title</h2><h4>$'.$sales_price.' US</h4>';
	$html .= $product->description;
	$html .= '<div class="cartBtns"><a href="https://visionarystream.com/?add-to-cart=34" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="34" data-product_sku="" aria-label="Add “EYE” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="https://visionarystream.com/information/?add-to-cart=34"><div class="buy-now">Buy<br>Now</div></a></div>';
	wp_send_json_success( $html );
}
add_action('wp_ajax_view_detail', 'view_detail');
add_action('wp_ajax_nopriv_view_detail', 'view_detail');


