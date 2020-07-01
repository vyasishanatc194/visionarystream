<div class="footer-full">
    <div class="container">
        <footer>
            <?php dynamic_sidebar('footer-need-help'); ?>
        </footer>
    </div>
    <section class="footer-main">
        <div class="container">
            <div class="row mobile-revers">
                <div class="col-lg-7 col-md-7 ">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6">
                            <div class="footer-content conatct-footer">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6">
                            <div class="footer-content">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 ">
                    <div class="eye-exam">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>                           
                </div>
            </div>
        </div>
    </section>
</div>

<div id="modal-frame" class="modal fade modal-frame" role="dialog">
    <div class="modal-dialog ">    
        <!-- Modal content-->
        <div class="modal-content">        
            <div class="modal-body">
                <button class="close close-btn" data-dismiss="modal">&times;</button>
                <div class="modal-frame-content">                
                    
                </div>
            </div>        
        </div>    
    </div>
</div>





<div class="popup-body">
    <!--<div id="close_p"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/close.png" alt="close" title="close"></div>-->
	<div class="popup-cart">
      <a href="<?php echo esc_url( home_url( 'buy-glasses-shopping-cart') ); ?>">
        <div><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-cart2.png" alt="Cart" title="Cart"></div>
        <p><span style="line-height: 30px;" id="cnm_total_products" class="cnm_total_products"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></p>
      </a>
    </div>
	<h2><span><?php //echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>added to your cart</h2>
    <div class="dots"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-round.png" alt="Round" title="Round"> &nbsp;&nbsp; <img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-round.png" alt="Round" title="Round"> &nbsp;&nbsp; <img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-round.png" alt="Round" title="Round"></div>
</div>

<div class="popup-body-twitter">
	<!--<div id="close_pt"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/close.png" alt="close" title="close"></div>-->
	<h2>TRANSMITTING TO</h2>
    <div><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-round.png" alt="Round" title="Round"> &nbsp;&nbsp; <img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-round.png" alt="Round" title="Round"> &nbsp;&nbsp; <img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-round.png" alt="Round" title="Round"></div>
    <div class="prepand5 margin-bottom"><a id="twitter_go" target="_blank" href="https://twitter.com/login"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter-modal-logo.png" alt="Tweet" title="Tweet"></a></div>
    <p>Join the Conversation.</p>
</div>
<a href="https://twitter.com/intent/tweet?hashtags=towards2020" id="aTest" target="_blank" style="display:none;">go</a>
<?php wp_footer();?>

<style type="text/css">
    #close_p{position: absolute; top: 8px; right: 8px;}
    #close_p img{width: 32px; cursor: pointer;}
	
	#close_pt{position: absolute; top: 8px; right: 8px;}
    #close_pt img{width: 32px; cursor: pointer;}
	
	#tweet-icon, #twitter{cursor:pointer;}
</style>

<script>

jQuery(".view-product").on('click', function(){
    var productId = jQuery(this).attr('id');
    try {
        jQuery.ajax({
            type: "POST", 
            url: pw1_script_vars.ajaxurl,
            dataType: "json",
            data: 'action=view_detail&security='+pw1_script_vars.security+'&productId='+productId,
            error: function(e){
                //console.log(e);
            },
            beforeSend: function() {},
            success: function(response, xhr) {
                console.log(response);
                if (!response.success) {
                    
                } else {                      
                    jQuery(".modal-frame-content").html(response.data);
                    $('.owl-carousel-frame').owlCarousel({
                        loop:true, margin:30, smartSpeed:2000, autoplay:true, autoplayTimeout:2000, autoplayHoverPause:false,
                        dots:true, nav:false, loop:true, responsiveClass:true, center: true,
                        responsive:{
                            0:{ items:1, },
                            600:{ items:1, },
                            768:{ items:1, },
                            1000:{ items:1, },
                        },                        
                    });
                }
            },
            complate: function() {}
        });
    } catch(error) {
        console.error(error);
    }
});

jQuery( document ).ready(function() {

    jQuery("#nav_menu-2").addClass("footer-links-content");
    jQuery("#nav_menu-2>div").addClass("link-footer");

    jQuery("#nav_menu-3").addClass("footer-links-content");
    jQuery("#nav_menu-3>div").addClass("link-footer");

    jQuery("#close_p").click(function(){
        jQuery('.popup-body').css('display','none');
    });
	
	jQuery("#tweet-icon").click(function(){
        jQuery(".popup-body-twitter").css("display","block");
		jQuery(".popup-body-twitter").css("position","absolute");
		jQuery(".popup-body-twitter").css("top", Math.max(0, ((jQuery(window).height() - jQuery(".popup-body-twitter").outerHeight()) / 2) + jQuery(window).scrollTop()) + "px");
		jQuery(".popup-body-twitter").css("left", Math.max(0, ((jQuery(window).width() - jQuery(".popup-body-twitter").outerWidth()) / 2) + jQuery(window).scrollLeft()) + "px");
		
		window.setTimeout(function() {
			//window.location.href = 'https://twitter.com/intent/tweet?hashtags=towards2020';
			document.getElementById("aTest").click();
			jQuery(".popup-body-twitter").css("display","none");
		}, 5000);
    });
	
	jQuery("#twitter_go").click(function(){
		//window.location.href = 'http://willgrantvision.com/dev/';
		location.reload();
	});
	
	
	jQuery("#twitter").click(function(){
        jQuery(".popup-body-twitter").css("display","block");
		jQuery(".popup-body-twitter").css("position","absolute");
		jQuery(".popup-body-twitter").css("top", Math.max(0, ((jQuery(window).height() - jQuery(".popup-body-twitter").outerHeight()) / 2) + jQuery(window).scrollTop()) + "px");
		jQuery(".popup-body-twitter").css("left", Math.max(0, ((jQuery(window).width() - jQuery(".popup-body-twitter").outerWidth()) / 2) + jQuery(window).scrollLeft()) + "px");
		
		window.setTimeout(function() {
			window.location.href = 'https://twitter.com/intent/tweet?hashtags=towards2020';
		}, 5000);
    });

    
});

</script>

<script type="text/javascript">
  window.lhnJsSdkInit = function () {
    lhnJsSdk.setup = {
      application_id: "6096174a-b2ed-46ac-ca4c-539c2b81a64e",
      application_secret: "8hN+WIWp5+X3nguifldmKYl7R0V2eHBHbHy0eccbktwD1PzwG4"
    };
    lhnJsSdk.controls = [{
      type: "hoc",
      id: "69788dcb-3e48-4baa-8448-4ffe298ac428"
    }];
  };
  (function (d, s) {
    var newjs, lhnjs = d.getElementsByTagName(s)[0];
    newjs = d.createElement(s);
    newjs.src = "https://developer.livehelpnow.net/js/sdk/lhn-jssdk-current.min.js";
    lhnjs.parentNode.insertBefore(newjs, lhnjs);
  }(document, "script"));
</script>

<script>
    $('.owl-carousel-logo').owlCarousel({
    loop:true,
    margin:30,
    smartSpeed:2000,
    autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:false,
    dots:false,
    nav:false,
    responsiveClass:true,
    // navText: ['<span class="span-roundcircle left-roundcircle"><img src="assets/images/icon/arrow-left.png" class="left_arrow_icon" alt="arrow" /></span>','<span class="span-roundcircle right-roundcircle"><img src="assets/images/icon/arrow-right.png" class="right_arrow_icon" alt="arrow" /></span>'],
    responsive:{
        0:{
            items:2,
        },
        600:{
            items:2,
        },
        768:{
            items:3,
        },
        1000:{
            items:4,
        },
        1025:{
            loop:true,
            autoWidth:true,
        }
    }
});


    $('.owl-carousel-best-deal').owlCarousel({
    loop:true,
    margin:30,
    smartSpeed:2000,
    autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:false,
    dots:true,
    nav:true,
    loop:true,
    responsiveClass:true,
    center: true, 
    
    navText: ['<span class="span-roundcircle left-roundcircle"><img src="/wp-content/uploads/2020/06/arrow-left.png" class="left_arrow_icon" alt="arrow" /></span>','<span class="span-roundcircle right-roundcircle"><img src="/wp-content/uploads/2020/06/arrow-right.png" class="right_arrow_icon" alt="arrow" /></span>'],
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        768:{
            items:3,
        },
        1000:{
            items:4,
        },
        1025:{
            items:3,
        }
    },

    
});



$('.owl-carousel-auction').owlCarousel({
    loop:true,
    margin:30,
    smartSpeed:2000,
    autoplay:true,
    autoplayTimeout:1500,
    autoplayHoverPause:false,
    dots:true,
    nav:true,
    loop:true,
    responsiveClass:true,
    center: true, 
    
    navText: ['<span class="span-roundcircle left-roundcircle"><img src="/wp-content/uploads/2020/06/arrow-left.png" class="left_arrow_icon" alt="arrow" /></span>','<span class="span-roundcircle right-roundcircle"><img src="/wp-content/uploads/2020/06/arrow-right.png" class="right_arrow_icon" alt="arrow" /></span>'],
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        768:{
            items:3,
        },
        1000:{
            items:4,
        },
        1025:{
            items:3,
        }
    },

    
});

</script>

</body>

</html>