<!DOCTYPE html>
<html lang="en">

<head class="darkPage">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title><?php wp_title(); ?></title>

<!-- Bootstrap Core CSS --> 
<?php $version = '1.0.4'; ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.css?v=<?php echo $version; ?>">    
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css?v=<?php echo $version; ?>">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css?v=<?php echo $version; ?>">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/font-awesome/css/font-awesome.min.css?v=<?php echo $version; ?>" type="text/css">

<!-- media queries css -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/media-queries-min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">

<!-- Custom additional CSS -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/addendum.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">

<!-- Dark Theme CSS -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/dark.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">


<link href="<?php bloginfo('stylesheet_directory'); ?>/fancybox/jquery.fancybox.min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">

<link href="https://fonts.googleapis.com/css?family=Raleway:100,300" rel="stylesheet"> 

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
<!-- jQuery -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.js?v=<?php echo $version; ?>"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js?v=<?php echo $version; ?>"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/enquire.min.js?v=<?php echo $version; ?>"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/fancybox/jquery.fancybox.min.js?v=<?php echo $version; ?>"></script>
<!--<script src="<?php bloginfo('stylesheet_directory'); ?>/js/packery.min.js?v=<?php echo $version; ?>"></script>-->
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.masonry.min.js?v=<?php echo $version; ?>"></script>

<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->

<script type="text/javascript">
jQuery(window).scroll(function(){
      scroll = jQuery(window).scrollTop();
  	if (scroll >= 1)
  	{
		jQuery(".header-full").addClass('scroll');
		jQuery("nav").slideUp(500);
	} 
	else
	{
		jQuery(".header-full").removeClass('scroll');
		enquire.register("screen and (min-width:768px)", {	
			match : function() {
        		jQuery("nav").slideUp(500);
    		},
			unmatch : function() {
        		jQuery("nav").slideUp(500);
    		}
		});
	}
});

jQuery( document ).ready(function() {
	enquire.register("screen and (min-width:768px)", {	
		match : function() {
			jQuery("nav").hide();
			jQuery("nav").removeClass('hiddenElement');
		},
		unmatch : function() {
			jQuery("nav").removeClass('hiddenElement');
		}
	});
});
</script>

</head>

<body <?php body_class($bodyClass); ?>>

<div class="header-full" id="darkHeader">

	<div class="container">
		
     <div class="logo"><a href="<?php echo esc_url( home_url( '/') ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/inside/vsLogo.png" alt="Visionary Stream" title="Visionary Stream"></a></div>		
     
     
     <div id="navTools">
     
     	<div id="toggleWrap">
            <div class="btn" onClick="jQuery('nav').removeClass('hiddenElement').slideToggle();"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/inside/navBurger.png" alt="Toggle Navigation" title="Toggle Navigation"></div>
        </div>
     
     	<div class="header-cart" <?php if(sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) > 0) { echo 'style="display:inline-block;"'; }else{ echo 'style="display:none;"'; } ?>>
          	<a href="<?php echo esc_url( home_url( 'buy-glasses-shopping-cart') ); ?>">
            	<div><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-cart2.png" alt="Cart" title="Cart"></div>
            	<p><span class="cnm_total_products"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></p>
          		<h3>View Your Cart</h3>
        	</a>
		</div>
        
	</div>
        
        
        
        <nav class="hiddenElement">
            <ul>
                <!--<li><a href="<?php bloginfo('siteurl'); ?>/intro/">How It Works</a></li>-->
                <li><a href="<?php bloginfo('siteurl'); ?>/#the-glasses">Glasses</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/eye-exams/" target="_blank">Eye Exams</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/exhibits/">Exhibits</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/exposures/">Exposures</a></li>
                <li><a href="<?php bloginfo('siteurl'); ?>/events/">Events</a></li>
                <li><a href="<?php echo esc_url( home_url( 'my-account') ); ?>"><span><?php if (is_user_logged_in()){ echo 'My Account'; }else{ echo 'Login'; } ?></span></a></li>
            </ul>
        </nav>

	</div>

</div>