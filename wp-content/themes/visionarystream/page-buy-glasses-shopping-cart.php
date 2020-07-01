<?php get_header(); ?>



<div class="cart-full">
<div class="container">
	
    <div class="cart-body">
    	<h2>You have <?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> items in your cart</h2>
        <div><a href="<?php echo esc_url( home_url( 'information') ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-checkout.png" alt="checkout" title="checkout"></a></div>
        <?php 
		$s_total = $woocommerce->cart->total; 
		
		/*
		if($s_total >= 150)
		{
			$total = floor(($s_total * 0.2)/32);
			?>
            <p>With this purchase you will give <?php echo $total; ?> <?php if($total == 1){ echo 'person';}else{ echo 'people';} //echo WC()->cart->get_cart_total(); ?> vision</p>
            <?php
		}
		else
		{
			$total = 150 - $s_total;
			?>
            <p>Spend $<?php echo $total; ?> more to give the gift of vision to 1 person.</p>
            <?php
		}*/
		
		
		
		if($s_total >= 110)
		{
			$total = floor(($s_total * 0.3)/33);
			?>
            <p>With this purchase you will give <?php echo $total; ?> <?php if($total == 1){ echo 'person';}else{ echo 'people';} //echo WC()->cart->get_cart_total(); ?> vision</p>
            <?php
		}
		else
		{
			$total = 110 - $s_total;
			?>
            <p>Spend $<?php echo $total; ?> more to give the gift of vision to 1 person.</p>
            <?php
		}
		
		
		
		?>
    	
    </div>
    
</div>
</div>

<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
<?php
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item )
{
	$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	
	//global $product;
	//$version = $product->get_attribute('Version');
	//$color = $product->get_attribute('Color');
	
	$item_data = $cart_item['data'];	
    $attributes = $item_data->get_attributes();
	$c = 1;
	foreach ( $attributes as $attribute )
	{
		if($c == 1)
		{
			$version = $attribute[data][options][0];
		}
		else
		{
			$color = $attribute[data][options][0];
		}
		$c++;
	}
	
	?>
    <div class="shopping-cart-full">
        <div class="wrapper-1700">
            
            <div class="cart-table">
            	
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td class="cart-image">
                        <?php
                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
        
                        if ( ! $product_permalink ) {
                            echo wp_kses_post( $thumbnail );
                        } else {
                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
                        }
                        ?>
                        </td><td>
                            <h3><?php if ( ! $product_permalink ) {
                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                } else {
                                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                } ?></h3>
                            <p><?php echo $color; ?></p>
                            <p><?php echo $version; ?></p>
                        </td>
                        <td data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>"><h3>Quantity</h3>
                            <?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								), $_product, false );
							}
	
							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
							?>
                        </td>
                        <td>
                            <h3><?php
                                echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                            ?> US</h3>
                            <div class="cart-font">
								<?php
									// @codingStandardsIgnoreLine
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" aria-label="%s" data-product_id="%s" data-product_sku="%s" class="btnRemove"><img src="https://www.visionarystream.com/dev/images/vs-cross.png" alt="Remove" title="Remove"> Remove</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									), $cart_item_key );
								?>
                        	</div>
                        </td>
                        <td><?php do_action( 'woocommerce_cart_contents' ); ?></td>
                    </tr>
                    
                </table>
                
            </div>
        
        </div>
    </div>
    <?php
}
?>

<?php if(sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) > 0) { ?>
<div class="body-full">
<div class="container">
	
    <div class="cart-bottom">
    	<button style="display:none;" id="btn_action"  type="submit" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
        <img style="cursor:pointer;" id="update_cart" src="<?php bloginfo('stylesheet_directory'); ?>/images/update-cart.png" alt="Update Cart" title="Update Cart">
        <?php do_action( 'woocommerce_cart_actions' ); ?>
        <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
    </div>

</div>
</div>
<?php } ?>
</form>


<div class="body-full">
<div class="container">
	
    <div class="cart-bottom">
    	<p>Still want to continue shopping?</p>
        <div><a href="<?php echo esc_url( home_url( '/') ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-stream.png" alt="stream on" title="stream on"></a></div>
    </div>

</div>
</div>

<div class="footer-full">
<div class="container">

	<footer>    
        <h2>Need Help?</h2>
        <p>We’re available by email: <br> info@willgrantvision.com</p>
        <div><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-instragram.png" alt="Instragram" title="Instragram"></a><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-tweet2.png" alt="Tweet" title="Tweet"></a><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-facebook.png" alt="Facebook" title="Facebook"></a></div>  	
    </footer>

</div>
</div>

<?php wp_footer();?>
<script>
jQuery( document ).ready(function() {
    jQuery("#update_cart").click(function(){
        jQuery("#btn_action").trigger("click");
    });    
});
</script>
</body>

</html>