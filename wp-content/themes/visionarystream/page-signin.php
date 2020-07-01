<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Visionary Stream</title>

<!-- Bootstrap Core CSS --> 
<?php $version = '1.0.3'; ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.css?v=<?php echo $version; ?>">    
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css?v=<?php echo $version; ?>">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css?v=<?php echo $version; ?>">

<!-- Custom Fonts -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/font-awesome/css/font-awesome.min.css?v=<?php echo $version; ?>" type="text/css">

<!-- media queries css -->
<link href="<?php bloginfo('stylesheet_directory'); ?>/css/media-queries-min.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">

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

<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->

<style type="text/css">

.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  /*width: 70%;*/
  margin: auto;
}

</style>
</head>

<body>

<div class="signin-header-full">

<div class="container">
		
     <div class="logo"><a href="index.html"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-logo.png" alt="Visionary Stream" title="Visionary Stream"></a></div>		

</div>

	<div class="nav-body">
        <div>
        	<div class="btn" onClick="$('nav').slideToggle()"><i class="fa fa-navicon"></i></div>
        </div>
        <nav>
            <ul>
                <li><a href="glasses.html">Glasses</a></li>
                <li><a href="eye-exams.html">Eye Exams</a></li>
                <li><a href="exhibits.html">Exhibits</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="exposures.html">Exposures</a></li>
                <li><a href="login.html"><strong>LOGIN</strong></a></li>
            </ul>
        </nav>
    </div>

</div>

<div class="body-full2">
<div class="container">

	<div class="signin-block">
    	<div class="signin-left">
        	<h2>I’m new</h2>
            <p>You will have an opportunity to create an account later.</p>
        </div>
        <div class="signin-right">
        	<h2>i’m back</h2>
            <div><input name="" type="text" class="signin-input" value="Email Address"></div>
            <div><input name="" type="text" class="signin-input" value="Password"></div>
            <div><input name="" type="button" class="checkout-button" value="Checkout"></div>
            <p><a href="#">Forgot password?</a></p>
        </div>
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
</body>

</html>