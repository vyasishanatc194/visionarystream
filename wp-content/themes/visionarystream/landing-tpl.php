<?php 
/* Template Name: Landing Page */ 
get_header();
if (have_posts() ) : 
	while (have_posts() ) : the_post(); 
	?>
    <div class="body-full">
    
        <section class="top">
                    
            
            <div class="topBranding">
            	<img src="<?php bloginfo('template_url'); ?>/images/wgLogoType.png" alt="Will Grant Logo Type" />
            </div>
            
            <div id="top_slider">
            <?php
			if( have_rows('top_banner') ):
				while ( have_rows('top_banner') ) : the_row();
					?><div><img src="<?php echo the_sub_field( "image" ); ?>" alt="Image" title="Image"></div><?php                    
				endwhile;
			endif;
			?>
            </div>
            
            <div class="topSplash">
            	<img src="<?php bloginfo('template_url'); ?>/images/caseArt.jpg" alt="WGV Case Artwork" />
            </div>
            
        </section>
    
    </div>

	<div class="body-full">	
		<section class="top2">
			<h2><?php echo get_field( "top_title_2" ); ?></h2>
		</section>    
	</div>
    
    
	
	<div class="body-full2">
	<div class="container">
		
			<section class="index-body">
				<?php echo get_field( "towards_2020_stands_for_a_lot" ); ?>
                <a id="the-glasses" name="the-glasses"></a>
				<div class="wrapper-1120">
					<div class="glass-body">
						<h4>The</h4>
						<h3><span>2020s</span></h3>
					</div>
					<div class="wrapper-1000">
                    
                    	<?php
						$args = array(
							'post_type'             => 'product',
							'post_status'           => 'publish',
							'posts_per_page'        => '2',
							'tax_query'             => array(
								array(
									'taxonomy'      => 'product_cat',
									'terms'         => 16,
									'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
								)
							)
						);
						$products = new WP_Query($args);
						$counter_1 = 1;
						if ( $products->have_posts() ) {
							// The 2nd Loop
							while ( $products->have_posts() ) {
								$products->the_post();
								$product_name = explode(" ",get_the_title( $products->post->ID ));
								$_product = wc_get_product( $products->post->ID );
								$regular_price = $_product->get_regular_price();
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $products->post->ID ), 'single-post-thumbnail' );
								
								$version = $product->get_attribute('Version');
								$color = $product->get_attribute('Color');
								
								if($counter_1 == 1)
								{
								?>
                                <div class="glass-left">
                                    <div><img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title( $products->post->ID ); ?>" title="<?php echo get_the_title( $products->post->ID ); ?>"></div>
                                    <p><?php echo $product_name[0]; ?> <strong><?php echo $product_name[1]; ?></strong></p>
                                    <p>$<?php echo $regular_price; ?> US</p>
                                    <p><span><?php echo $color; ?> &nbsp; | &nbsp; <?php echo $version; ?></span></p>
                                    <div class="cartBtns">
                                    	<a href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID) ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $products->post->ID; ?>" data-product_sku="" aria-label="Add “<?php echo $product_name[1]; ?>” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="<?php echo esc_url( home_url( '/information/?add-to-cart='.$products->post->ID) ); ?>"><div class="buy-now">Buy<br>Now</div></a>  
                                    </div>                                  
                                </div>
                                <?php
								}
								else
								{
									?>
                                    <div class="glass-right">
                                        <div><img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title( $products->post->ID ); ?>" title="<?php echo get_the_title( $products->post->ID ); ?>"></div>
                                        <p><?php echo $product_name[0]; ?> <strong><?php echo $product_name[1]; ?></strong></p>
                                        <p>$<?php echo $regular_price; ?> US</p>
                                        <p><span><?php echo $color; ?> &nbsp; | &nbsp; <?php echo $version; ?></span></p>
                                        <div class="cartBtns">
                                        	<a href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID) ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $products->post->ID; ?>" data-product_sku="" aria-label="Add “<?php echo $product_name[1]; ?>” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="<?php echo esc_url( home_url( '/information/?add-to-cart='.$products->post->ID.'&quantity=1') ); ?>"><div class="buy-now">Buy<br>Now</div></a>
                                        </div>
                                    </div>
                                    <?php
								}
								$counter_1++;
							}
							wp_reset_postdata();
						}
						$counter_1 = 1;
						?>
                        
					</div>
				</div>
			</section>
	
	</div>
	</div>
	
	<div class="body-full2">
	<div class="container">
		
			<section class="index-body2">
				<h2><?php echo get_field( "what_does_2020_mean_to_you_title" ); ?></h2>
				<h3><?php echo get_field( "what_does_2020_mean_to_you_subtitle" ); ?></h3>
				<div class="tweet-icon"><img id="tweet-icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-tweet.png" alt="Tweet" title="Tweet"></div>
				<?php //echo get_field( "what_does_2020_mean_to_you_content" ); ?>
                
                <div style="margin-bottom:42px;"><?php echo do_shortcode( '[custom-twitter-feeds]' ); ?></div>
                <style>
				#ctf .ctf-item {
					padding: 1px 1px !important;
					border:0px !important;
					overflow: hidden;
				}
				
				#ctf .ctf-out-of-tweets{display: none;}
				</style>
                
				<h2 class="prepand">#<span>Towards</span>2020</h2>
				
                <div class="container2">
                    <div class="towards-image">
                        <?php
                        if( have_rows('towards2020_photo') ):
                            while ( have_rows('towards2020_photo') ) : the_row();
                                ?><div><img src="<?php echo the_sub_field( "image" ); ?>" alt="Image" title="Image"></div><?php                    
                            endwhile;
                        endif;
                        ?>
                    </div> 
                </div>
                     
			</section>
	
	</div>
	</div>
	
	<div class="body-full">
		<div class="icon-full"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-full-icon.png" alt="Icon" title="Icon"></div>
	</div>
	
	<div class="body-full2">
		<div class="container">
        
        	
	
			<?php /* ?><section class="index-vision">
				<h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vs-text.png" alt="THE Will Grant Vision Foundations" title="THE Will Grant Vision Foundations"></h2>      		
            
				<div class="wrapper-1000">
					
                    <?php
					$args = array(
						'post_type'             => 'product',
						'post_status'           => 'publish',
						'posts_per_page'        => '2',
						'tax_query'             => array(
							array(
								'taxonomy'      => 'product_cat',
								'terms'         => 17,
								'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
							)
						)
					);
					$products = new WP_Query($args);
					$counter_1 = 1;
					if ( $products->have_posts() ) {
						// The 2nd Loop
						while ( $products->have_posts() ) {
							$products->the_post();
							$product_name = explode(" ",get_the_title( $products->post->ID ));
							$_product = wc_get_product( $products->post->ID );
							$regular_price = $_product->get_regular_price();
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $products->post->ID ), 'single-post-thumbnail' );
							
							$version = $product->get_attribute('Version');
							$color = $product->get_attribute('Color');
							
							if($counter_1 == 1)
							{
							?>
							<div class="glass-left">
								<div><img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title( $products->post->ID ); ?>" title="<?php echo get_the_title( $products->post->ID ); ?>"></div>
								<p><?php echo $product_name[0]; ?> <strong><?php echo $product_name[1]; ?></strong></p>
								<p>$<?php echo $regular_price; ?> US</p>
								<p><span><?php echo $color; ?> &nbsp; | &nbsp; <?php echo $version; ?></span></p>
                                <div class="cartBtns">
									<a href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID) ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $products->post->ID; ?>" data-product_sku="" aria-label="Add “<?php echo $product_name[1]; ?>” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID.'&quantity=1') ); ?>"><div class="buy-now">Buy<br>Now</div></a>
                                </div>
							</div>
							<?php
							}
							else
							{
								?>
								<div class="glass-right">
									<div><img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title( $products->post->ID ); ?>" title="<?php echo get_the_title( $products->post->ID ); ?>"></div>
									<p><?php echo $product_name[0]; ?> <strong><?php echo $product_name[1]; ?></strong></p>
									<p>$<?php echo $regular_price; ?> US</p>
									<p><span><?php echo $color; ?> &nbsp; | &nbsp; <?php echo $version; ?></span></p>
                                    <div class="cartBtns">
										<a href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID) ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $products->post->ID; ?>" data-product_sku="" aria-label="Add “<?php echo $product_name[1]; ?>” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID.'&quantity=1') ); ?>"><div class="buy-now">Buy<br>Now</div></a>
                                    </div>
								</div>
								<?php
							}
							$counter_1++;
						}
						wp_reset_postdata();
					}
					$counter_1 = 1;
					?>
                    
				</div>
				<div class="foundations-text">
					<?php echo get_field( "promotional_content" ); ?>
				</div>
				<div class="foundations-image">
					<ul>
						<li><img src="<?php $gallery_photo_1 = get_field( "gallery_photo_1" ); echo $gallery_photo_1['url']; ?>" alt="<?php echo $gallery_photo_1['alt']; ?>" title="<?php echo $gallery_photo_1['title']; ?>"></li>
						<li><img src="<?php $gallery_photo_2 = get_field( "gallery_photo_2" ); echo $gallery_photo_2['url']; ?>" alt="<?php echo $gallery_photo_2['alt']; ?>" title="<?php echo $gallery_photo_2['title']; ?>"></li>
						<li><img src="<?php $gallery_photo_3 = get_field( "gallery_photo_3" ); echo $gallery_photo_3['url']; ?>" alt="<?php echo $gallery_photo_3['alt']; ?>" title="<?php echo $gallery_photo_3['title']; ?>"></li>
					</ul>
					<ul class="foundations-menu">
						<li><a href="#">Why</a></li>
						<li><a href="#">How</a></li>
						<li><a href="#">What</a></li>
						<li><a href="#">Create An Account</a></li>
						<li><a href="#">Shipping</a></li>
						<li><a href="#">Faq</a></li>
					</ul>
				</div>            
			</section> <?php */ ?>
            
            <div class="visionaryCallout">
            	<img src="<?php bloginfo('template_url'); ?>/images/visionary.jpg" alt="Visionary Wanted. Seeking uncompromising advocate to radically transform the way we live & conserve. Must be skilled blacksmith, inventor, designer & falconer. Must prefer sustainability to salary. Climb rocks, not ladders. Contract length: 40 years minimum with option to extend. Call 424 352-2020. Only qualified applicants will be considered." />
            </div>
	
		</div>
        
        <div class="eyeBallArt">
            <img src="<?php bloginfo('template_url'); ?>/images/eyeball.jpg" alt="Medical professional with giant eyeball on their back, with WGV logo in the pupil." />
        </div>
        
        <div class="streamOnCallout"><a href="<?php echo esc_url( home_url( '/') ); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btnStreamOnLarge.png" alt="stream on" title="stream on"></a></div>
        
        
        <?php include (TEMPLATEPATH . '/inc/footer-nav.php'); ?>
        
        
	</div>
    
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/jquery.bxslider.css">
  	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bx.min.js"></script>
  	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.bxslider.min.js"></script>
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/fancybox/jquery.fancybox.min.css">
  	<script src="<?php bloginfo('stylesheet_directory'); ?>/fancybox/jquery.fancybox.min.js"></script>
    
  	<script>
    $(document).ready(function(){
		$('.towards-image').bxSlider({
			pager: false,
			controls: false,
    		auto: true,
			mode:'fade',
			speed: 3000
		});
		
		$('#top_slider').bxSlider({
			pager: false,
			controls: false,
    		auto: true,
			mode:'fade',
			speed: 5000
		});
		
		
		<?php if(!isset($_COOKIE["how-it-works"])){ ?>
		
			$.fancybox.open({
				src  : '<?php bloginfo('siteurl'); ?>/how-it-works/',
				type : 'iframe',
				toolbar: false,
				infobar: false,
				arrows: false,
				autosize: false,
				autoscale: false,
				fitToView: false,
				animationEffect: "fade",
				animationDuration: 500,
				iframe: {
					css: {'height': '90%', 'width': '90%', 'max-width': '1800px'}
				}/*,
				opts : {
					afterShow : function( instance, current ) {
						console.info( 'done!' );
					}
				}*/
			});
			
			
		
		<?php } ?>
		
		
		var howitworks = $('[data-fancybox="how"]').fancybox({
				toolbar: false,
				infobar: false,
				arrows: false,
				autosize: false,
				autoscale: false,
				fitToView: false,
				animationEffect: "fade",
				animationDuration: 500,
				iframe: {
					css: {'height': '90%', 'width': '90%', 'max-width': '1800px'}
				}
			})
		
		
		
    });
  </script>
	<?php 
	endwhile; 
endif;
get_footer(); ?>