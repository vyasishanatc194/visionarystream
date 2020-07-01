<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<div id="billing_section">
		<?php if ( $checkout->get_checkout_fields() ) : ?>
    
            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
            
            <h1>Checkout</h1>
    
            <div class="col2-set" id="customer_details">
                <div class="col-1">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div>
    
                <div class="col-2">
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                </div>
            </div>
    
            <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
    
        <?php endif; ?>
        
    </div>
    
    
    
    <!-- Start Pres -->
    
    <div id="blockPrescription">
    <?php //do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
        <h3 id="prescriptionHeading"><?php _e( 'PRESCRIPTION', 'woocommerce' ); ?> <small>( Optional )</small></h3>
        
        <p id="upload_photo_of_it_wrap" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input type="checkbox" name="upload_photo_of_it" value="photo" id="upload_photo_of_it"> <label for="upload_photo_of_it">UPLOAD A PHOTO OF IT</label><br>
        </p>
    
        <div id="ps_2"><?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?></div> 
        
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input type="checkbox" name="send_it_to_us_later" value="send_later" id="send_it_to_us_later"> <label for="send_it_to_us_later">SEND IT TO US LATER</label><br>
        </p>
        
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input type="checkbox" name="book_an_on_demand_eye_exam" value="book_exam" id="book_an_on_demand_eye_exam"> <label for="book_an_on_demand_eye_exam">BOOK AN ON DEMAND EYE EXAM</label><br>
        </p>
    
        <p id="i_need_reading_glasses_wrap" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input type="checkbox" name="i_need_reading_glasses_wrap2" value="glass" id="i_need_reading_glasses_wrap2"> <label for="i_need_reading_glasses_wrap2">I NEED READING GLASSES</label><br>
        </p>
        
        <p id="i_need_reading_glasses_options" class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <!--<label for="i_need_reading_glasses"><?php esc_html_e( 'I NEED READING GLASSES: ', 'woocommerce' ); ?></label>-->
            <select name="i_need_reading_glasses">
                <option value=""> - Select - </option>
                <option value="1.00">+1.00</option>
                <option value="1.25">+1.25</option>
                <option value="1.50">+1.50</option>
                <option value="1.75">+1.75</option>
                <option value="2.00">+2.00</option>
                <option value="2.25">+2.25</option>
                <option value="2.50">+2.50</option>
                <option value="2.75">+2.75</option>
                <option value="3.00">+3.00</option>
                <option value="3.25">+3.25</option>
                <option value="3.50">+3.50</option>
                <option value="3.75">+3.75</option>
                <option value="4.00">+4.00</option>
            </select>
        </p>
    </div>
    <!-- End Pres -->
    
    
	
    <div id="review_section">
        <h3 id="order_review_heading"><?php _e( 'ORDER REVIEW', 'woocommerce' ); ?></h3>
    
        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
    
        <div id="order_review" class="woocommerce-checkout-review-order">
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
        </div>
    	
         <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
        
    </div>

</form>
<div id="pres_cut"><?php //do_action( 'woocommerce_after_checkout_form', $checkout ); ?></div>
<style>

.checkout table td {text-align:left;}
.checkout table td label{font-size: 1.187rem; line-height: 1.75rem; margin-bottom: 20px;}

#ps_2, #i_need_reading_glasses_options{display: none;}

</style>
<script>

jQuery( document ).ready(function() {
    
    /*var shtml = jQuery("#pres_cut").html();
	jQuery("#ps_2").html(shtml);
	jQuery("#pres_cut").html('');*/

    jQuery( "#ps_2 tr:first" ).css( "display", "none" );

    jQuery("#upload_photo_of_it").click(function(){
        if(jQuery(this).is(":checked")) 
        {
            jQuery("#ps_2").show();            
        }
        else
        {
            jQuery("#ps_2").hide();
        } 
    });

   jQuery("#i_need_reading_glasses_wrap2").click(function(){
        if(jQuery(this).is(":checked")) 
        {
            jQuery("#i_need_reading_glasses_options").show();            
        }
        else
        {
            jQuery("#i_need_reading_glasses_options").hide();
        } 
    });
});

</script>
