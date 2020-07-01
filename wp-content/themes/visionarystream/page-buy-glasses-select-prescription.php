<?php get_header(); ?>
<div class="body-full">
	
    <section class="top">
    	<div><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-glass-image.jpg" alt="Image" title="Image"></div>
    </section>
    
</div>

<div class="body-full">
<div class="container">
	
    <section class="block-body">         
        <div class="foundations-image glass-margin">  
        	<ul class="foundations-menu">
                <li><a href="#">Give Something</a></li>
                <li><a href="#">Do Something</a></li>
                <li><a href="#">What is will grant vision</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </section>

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


<div class="glasses-select-popup">
	<div class="single-vision">
    	<h3>single vision prescription <span>$125.00</span></h3>
        <p>Use as distance glasses or readers</p>
    </div>
    <div class="single-vision-button">
    	<div><a href="<?php echo esc_url( home_url( '/buy-glasses-shopping-cart/?add-to-cart=34') ); ?>" class="single-cart">Add To Cart</a> <a href="#" class="single-buy">Buy With Apple Pay</a></div>
    	<p><a href="#">Bifocals Coming Soon!</a></p>
        <p><a href="<?php echo esc_url( home_url( '/') ); ?>">continue shopping</a></p>
    </div>
</div>

<div id="cover" ></div>

<style type="text/css">

#cover{
    position:fixed;
    top:0;
    left:0;
    background:rgba(0,0,0,0.6);
    z-index:9999;
    width:100%;
    height:100%;
    display:none;
}

.glasses-select-popup{
					  width:880px;
					  padding:30px 50px;
					  background:#FFF;
					  border-radius:30px;
					  float:left;
					  position:absolute;
					  z-index:99999;
					  display:none;
					}
					
.single-vision{
				width:100%;
				padding:30px 30px;
				background:#6e7c7c;
				border-radius:30px;
				float:left;
				position:relative;
				text-align:center;
				margin-bottom:20px;
				}
				
	.single-vision h3{ font-family: 'cocogooseregular'; font-size:36px; font-weight:normal; color:#fff; line-height:35px; margin-bottom:10px; text-align:left; }	
	.single-vision h3 span{ float:right; }
	
	.single-vision p{ font-family: 'ralewayregular'; font-size:30px; font-weight:normal; color:#fff; line-height:30px; display:inline-block; margin-bottom:0px; }	
		.single-vision p a{ color:#fff; }
		
.single-vision-button{
					width:100%;
					padding:25px 0px 10px;
					float:left;
					position:relative;
					text-align:center;
					}
	
	.single-vision-button p{ font-family: 'ralewayregular'; font-size:18px; font-weight:normal; color:#282828; line-height:20px; text-transform:uppercase; margin-bottom:20px; width:100%; float:left; }	
		.single-vision-button p a{ color:#282828; }
		
.single-cart{ font-family: 'ralewaybold'; font-size:18px; font-weight:normal; color:#fff; line-height:30px; width:45%; padding:25px 10px; background:#68dee0; float:left; text-transform:uppercase; border-radius:20px; margin-bottom:40px; }	

.single-buy{ font-family: 'ralewaybold'; font-size:18px; font-weight:normal; color:#fff; line-height:30px; width:45%; padding:25px 10px; background:#282828; float:right; text-transform:uppercase; border-radius:20px; margin-bottom:40px; }		
		
@media screen and (max-width: 992px) {
	
.glasses-select-popup{
					  width:96%;
					  padding:3% 3%;
					}
					
.single-vision h3{ font-size:30px; line-height:30px; }
.single-vision p{ font-size:25px; line-height:25px; }
	
	
}



@media screen and (max-width: 767px) {

.single-cart{ width:100%; padding:10px 10px; margin-bottom:20px; }	

.single-buy{ width:100%; padding:10px 10px; margin-bottom:20px; }		
	
}
</style>

<script type="text/javascript">

$( document ).ready(function() {
	$("#cover").css("display","block");
    $(".glasses-select-popup").css("display","block");
	$(".glasses-select-popup").css("position","absolute");
	$(".glasses-select-popup").css("top", Math.max(0, (($(window).height() - $(".glasses-select-popup").outerHeight()) / 2) + $(window).scrollTop()) + "px");
	$(".glasses-select-popup").css("left", Math.max(0, (($(window).width() - $(".glasses-select-popup").outerWidth()) / 2) + $(window).scrollLeft()) + "px");
});				
</script>
</body>

</html>