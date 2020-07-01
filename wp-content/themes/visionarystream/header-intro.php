<?php
//set cookie on load
if(!isset($_COOKIE["how-it-works"])){
	setcookie("how-it-works", "visited", time()+(86400*30), "/", "",  0); //86400 = 1 day	
}
?>
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
<link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400" rel="stylesheet"> 
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/style.css?v=<?php echo $version; ?>">

<!-- Custom Fonts -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/font/Dax-Regular/stylesheet.css?v=<?php echo $version; ?>" type="text/css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/font/Dax-Bold/stylesheet.css?v=<?php echo $version; ?>" type="text/css">

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

<?php wp_head(); ?>
<!-- jQuery -->
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.js?v=<?php echo $version; ?>"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js?v=<?php echo $version; ?>"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.foggy.min.js?v=<?php echo $version; ?>"></script>

<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->

<style type="text/css">

.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  /*width: 70%;*/
  margin: auto;
}

</style>


</head>

<body <?php body_class($bodyClass); ?>>