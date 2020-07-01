<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title><?php wp_title(); ?></title>

<!-- Bootstrap Core CSS --> 
<?php $version = '1.0.3'; ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.css?v=<?php echo $version; ?>">    
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css?v=<?php echo $version; ?>">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css?v=<?php echo $version; ?>">


<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/font-awesome/css/font-awesome.min.css?v=<?php echo $version; ?>" type="text/css">

<!-- media queries css -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/media-queries-min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">

<!-- Custom additional CSS -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/addendum.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- jQuery -->
<?php wp_head(); ?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.js?v=<?php echo $version; ?>"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js?v=<?php echo $version; ?>"></script>

<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->

<style type="text/css">

.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  /*width: 70%;*/
  margin: auto;
}

</style>

<script type="text/javascript">
jQuery(window).scroll(function(){
  	var sticky = jQuery('.stiky-full'),
      scroll = jQuery(window).scrollTop();

  	if (scroll >= 1)
  	{
		jQuery(".stiky-full").show();
		jQuery(".header-full").hide('slow');
	} 
	else
	{
		jQuery(".stiky-full").hide();
		jQuery(".header-full").show();
	}
});
</script>

</head>

<body <?php body_class($bodyClass); ?>>
<h1>HEEELLLLOOOOOOOOOOOOOOOO</h1>
<div class="stiky-full" style="display:none;">
	<div class="stiky-btn" onClick="$('.stiky-nav').slideToggle()"><i class="fa fa-navicon"></i></div>
    <div class="stiky-logo"><a href="<?php echo esc_url( home_url( '/') ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-logo.png" alt="Visionary Stream" title="Visionary Stream"></a></div>
	
    <div class="stiky-header-cart" <?php if(sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) > 0) { echo 'style="display:block;"'; }else{ echo 'style="display:none;"'; } ?>>
        <a href="<?php echo esc_url( home_url( 'buy-glasses-shopping-cart') ); ?>">
            <div><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-cart.png" alt="Cart" title="Cart"></div>
            <p><span class="cnm_total_products"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></p>
            <h3>View Your Cart</h3>
          </a>
    </div>
    
    <div class="stiky-nav">
        <ul>
            <li><a href="glasses.html">Glasses</a></li>
            <li><a href="eye-exams.html">Eye Exams</a></li>
            <li><a href="exhibits.html">Exhibits</a></li>
            <li><a href="events.html">Events</a></li>
            <li><a href="exposures.html">Exposures</a></li>
            <li><a href="<?php echo esc_url( home_url( 'my-account') ); ?>"><span><?php if (is_user_logged_in()){ echo 'My Account'; }else{ echo 'Login'; } ?></span></a></li>
        </ul>
    </div>
</div>

<div class="header-full">
	<div class="container">
			
	    <div class="logo"><a href="<?php echo esc_url( home_url( '/') ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-logo.png" alt="Visionary Stream" title="Visionary Stream"></a></div>

	</div>
    
</div>

<div class="body-full">
<div class="container">
	
    <section class="block-body">         
        <!--<div class="prescription-menu">
        	<ul>
            	<li><a href="<?php echo esc_url( home_url( 'information') ); ?>" class="fixed">Information</a></li>
                <li><a href="<?php echo esc_url( home_url( 'prescription') ); ?>">Prescription</a></li>
                <li><a href="#">Review</a></li>
            </ul>
        </div>-->
        
        <section class="index-vision">
			<?php 
			if (have_posts() ) : 
				while (have_posts() ) : the_post();	
					the_content(); 
				endwhile; 
			endif;
			?>
        </section> 
        
        <!--<div class="prescription-body">
        	<div class="main-body">
                <h2>Your  Details</h2>
                <div><input name="" type="text" class="information-input" value="" placeholder="first and last name"></div>
                <div><input name="" type="email" class="information-input" value="" placeholder="email"></div>
                <div><input name="" type="password" class="information-input" value="" placeholder="password"></div>
                <div><input name="" type="tel" class="information-input" value="" placeholder="phone"></div>
                <div class="update-text"><input name="" type="checkbox"> text me updates about my order.  Yes I agree to these terms <img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-icon.png" alt="Image" title="Image"></div>
            </div>
            <hr>
            <div class="main-body">
                <h2>ship to</h2>
                <div><input name="" type="text" class="information-input" value="" placeholder="first and last name"></div>
                <div><input name="" type="text" class="information-input" value="" placeholder="street address"></div>
            </div>
            <div class="main-body">
                <h2>bill to</h2>
                <div><input name="" type="text" class="information-input" value="" placeholder="card details"></div>
                <div class="update-text">READEEM A GIFT CARD OR PROMO CODE</div>
            </div>
        </div>
        <div class="prescription-table">
        	<table width="100%" cellpadding="0" cellspacing="0" border="0">
            	<tbody>
                	<tr>
                    	<td width="81%">subtotal</td>
                        <td width="19%"><?php echo WC()->cart->get_cart_total(); ?></td>
                    </tr>
                    <tr>
                    	<td>shipping</td>
                        <td>free</td>
                    </tr>
                </tbody>
                <tfoot>
                	<tr>
                    	<td><span>total</span></td>
                        <td><span><?php echo WC()->cart->get_cart_total(); ?></span></td>
                    </tr>
                </tfoot>
            </table>
            <div class="prepand4"><input name="" type="submit" class="review-button" value="review"></div>
        </div>-->
    </section>

</div>
</div>
<?php get_footer(); ?>