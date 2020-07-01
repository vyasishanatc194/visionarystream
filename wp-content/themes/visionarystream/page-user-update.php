<?php
error_reporting(0);
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

$upload_dir   = wp_upload_dir();
$baseurl = $upload_dir['baseurl'];

$filters = array(
    'post_status' => 'any',
    'post_type' => 'shop_order',
    'orderby' => 'modified',
    'order' => 'ASC',
	'limit'    => -1,
);

$loop = new WP_Query($filters);

while ($loop->have_posts())
{
    $loop->the_post();
    $order = new WC_Order($loop->post->ID);
	
	$order_id = $loop->post->ID;
	$customer_id = $order->customer_id;
	
	$url = $baseurl."/woocommerce_uploads/alg_uploads/checkout_files_upload/".$order_id."_1.png";
	$title = "Prescription";
	$alt_text = "Prescription";
	
	$src = media_sideload_image( $url, null, null, 'src' );
	$image_id = attachment_url_to_postid( $src );
	
	if( $image_id )
	{
		$im = get_user_meta( $customer_id, 'upload_a_photo_of_it', true); 
		if(empty($im))
		{
			update_user_meta( $customer_id, 'upload_a_photo_of_it', $image_id );	
		}
	}
}