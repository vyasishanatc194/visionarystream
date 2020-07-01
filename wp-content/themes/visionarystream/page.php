<?php 
get_header();

// if (have_posts() ) : 
// 	while (have_posts() ) : the_post();
$category_obj = get_queried_object();
$pageId = $category_obj->term_id;
?>
    <div class="body-full2 <?php echo 'category-'.$pageId; ?>">
		<section class="vs-barnd-top" style="background-image: url('<?php echo get_field('feature_image')['url']; ?>');">         
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bannr-bottom">
                            <img src="<?php echo get_field('feature_small_image')['url']; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
		</section>
		<?php
			$args = array(
				'post__not_in' => array( $post->ID ), 
				'posts_per_page' => 5, 
				'no_found_rows' => 1, 
				'post_status' => 'publish', 
				'post_type' => 'product', 
				'tax_query' => array(
							[ 'taxonomy' => 'product_cat',
							'field' => 'id',
							'terms' => $pageId ]
					));
			$products = new WP_Query( $args );
		?>
		<section class="brand-frame">
            <div class="container conatiner-1000">
                <div class="row">
					<?php 
						while ( $products->have_posts() ) : $products->the_post();
							$sales_price = $product->sale_price;
                            $version = $product->get_attribute('Version');
                            $color = $product->get_attribute('Color');
                            $product_name = explode(" ",get_the_title( $products->post->ID ));
					?>
                    <div class="col-lg-6 col-md-6">
                        <div class="frame-box">
							<div><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"></div>
							<p><?php echo $product_name[0]; ?> <strong><?php echo $product_name[1]; ?></strong></p>
							<p>$<?php echo $sales_price; ?> US</p>
							<p><span><?php echo $color; ?> &nbsp; | &nbsp; <?php echo $version; ?></span></p>
							<div class="cartBtns">
								<a href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID) ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $products->post->ID; ?>" data-product_sku="" aria-label="Add “<?php echo $product_name[1]; ?>” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="<?php echo esc_url( home_url( '/information/?add-to-cart='.$products->post->ID) ); ?>"><div class="buy-now">Buy<br>Now</div></a>  
							</div>                                 
                        </div>
					</div>
					<?php 
						endwhile;
						wp_reset_postdata();
					?>
                </div>
            </div>
		</section>
		
		<?php
			if (get_field('section_image')) :
		?>
		<section class="selected-name-of-brand">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="barnd-heading">
							<?php echo get_field('section_content'); ?>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="select-barnd-banner">
                            <img src="<?php echo get_field('section_image')['url']; ?>" alt="<?php echo $category_obj->name; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php endif; ?>
		
		<?php
			$args = array( 
				'post__not_in' => array( $post->ID ), 
				'posts_per_page' => 5, 
				'no_found_rows' => 1, 
				'post_status' => 'publish', 
				'post_type' => 'product', 
				'tax_query' => array( 
							array(
							'taxonomy' => 'product_cat',
							'field' => 'id',
							'terms' => $pageId
							)
					));
			$products = new WP_Query( $args );
		?>
		<section class="brand-frame">
            <div class="container conatiner-1000">
                <div class="row">
					<?php 
						while ( $products->have_posts() ) : $products->the_post();
							$sales_price = $product->sale_price;
                            $version = $product->get_attribute('Version');
                            $color = $product->get_attribute('Color');
							$product_name = explode(" ",get_the_title( $products->post->ID ));
							if (get_field('show_on_brand_page_section_2', $products->post->ID)) :
					?>
					<div class="col-lg-6 col-md-6">
                        <div class="frame-box">
							<div>
								<a href="#" class="view-product" data-toggle="modal" data-target="#modal-frame" id="<?php echo $products->post->ID; ?>" >
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
								</a>
							</div>
							<p><?php echo $product_name[0]; ?> <strong><?php echo $product_name[1]; ?></strong></p>
							<p>$<?php echo $sales_price; ?> US</p>
							<p><span><?php echo $color; ?> &nbsp; | &nbsp; <?php echo $version; ?></span></p>
							<div class="cartBtns">
								<a href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID) ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $products->post->ID; ?>" data-product_sku="" aria-label="Add “<?php echo $product_name[1]; ?>” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="<?php echo esc_url( home_url( '/information/?add-to-cart='.$products->post->ID) ); ?>"><div class="buy-now">Buy<br>Now</div></a>  
							</div>
                        </div>
                    </div>
					<?php 
							endif;
						endwhile;
						wp_reset_postdata();
					?>
                </div>
            </div>
		</section>
		<?php
			if (get_field('section_images')) :
			while ( have_rows( 'section_images' ) ) : the_row(); 
				$image_1  = get_sub_field( 'image_1' );
				$image_2  = get_sub_field( 'image_2' );
				$image_3  = get_sub_field( 'image_3' );
		?>
		<section class="profile-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="img-left-box">
                            <img src="<?php echo $image_1['url']; ?>" alt="">
                        </div>
                    
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="img-right-top-box">
                            <img src="<?php echo $image_2['url']; ?>" alt="">
                        </div>
                        <div class="img-right-bottom-box">
                            <img src="<?php echo $image_3['url']; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
		</section>
		<?php 
			endwhile;
		endif;
		?>
		
		<section class="brand-frame-3">
            <div class="container">
                <div class="row">
					<?php 
						while ( $products->have_posts() ) : $products->the_post();
							$sales_price = $product->sale_price;
                            $version = $product->get_attribute('Version');
                            $color = $product->get_attribute('Color');
							$product_name = explode(" ",get_the_title( $products->post->ID ));
							if (get_field('show_on_brand_page_section_3', $products->post->ID)) :
					?>
                    <div class="col-lg-4 col-md-4">
                        <div class="frame-box">
							<div>
								<a href="#" class="view-product" data-toggle="modal" data-target="#modal-frame" id="<?php echo $products->post->ID; ?>" >
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
								</a>
							</div>
							<p><?php echo $product_name[0]; ?> <strong><?php echo $product_name[1]; ?></strong></p>
							<p>$<?php echo $sales_price; ?> US</p>
							<p><span><?php echo $color; ?> &nbsp; | &nbsp; <?php echo $version; ?></span></p>
							<div class="cartBtns">
								<a href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID) ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $products->post->ID; ?>" data-product_sku="" aria-label="Add “<?php echo $product_name[1]; ?>” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="<?php echo esc_url( home_url( '/information/?add-to-cart='.$products->post->ID) ); ?>"><div class="buy-now">Buy<br>Now</div></a>  
							</div>
                        </div>
					</div>
					<?php 
							endif;
						endwhile;
						wp_reset_postdata();
					?>
                </div>
            </div>
		</section>
		
		<?php
			if (get_field('section_images_4')) :
			while ( have_rows( 'section_images_4' ) ) : the_row(); 
				$image_1  = get_sub_field( 'image_1' );
				$image_2  = get_sub_field( 'image_2' );
		?>
		<section class="tow-image-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="profile-img-box">
                            <img src="<?php echo $image_1['url']; ?>" alt="">     
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="profile-img-box">
                            <img src="<?php echo $image_2['url']; ?>" alt="">     
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
		<?php 
			endwhile;
		endif;
		?>

		<section class="brand-frame-3">
            <div class="container">
                <div class="row">
					<?php 
						while ( $products->have_posts() ) : $products->the_post();
							$sales_price = $product->sale_price;
                            $version = $product->get_attribute('Version');
                            $color = $product->get_attribute('Color');
							$product_name = explode(" ",get_the_title( $products->post->ID ));
							if (get_field('show_on_brand_page_section_4', $products->post->ID)) :
					?>
                    <div class="col-lg-4 col-md-4">
                        <div class="frame-box">
							<div>
								<a href="#" class="view-product" data-toggle="modal" data-target="#modal-frame" id="<?php echo $products->post->ID; ?>" >
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
								</a>
							</div>
							<p><?php echo $product_name[0]; ?> <strong><?php echo $product_name[1]; ?></strong></p>
							<p>$<?php echo $sales_price; ?> US</p>
							<p><span><?php echo $color; ?> &nbsp; | &nbsp; <?php echo $version; ?></span></p>
							<div class="cartBtns">
								<a href="<?php echo esc_url( home_url( '?add-to-cart='.$products->post->ID) ); ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo $products->post->ID; ?>" data-product_sku="" aria-label="Add “<?php echo $product_name[1]; ?>” to your cart" rel="nofollow"><div class="add-cart">Add To<br>Cart</div></a><a class="btnBuyNow" href="<?php echo esc_url( home_url( '/information/?add-to-cart='.$products->post->ID) ); ?>"><div class="buy-now">Buy<br>Now</div></a>  
							</div>
                        </div>
					</div>
					<?php 
							endif;
						endwhile;
						wp_reset_postdata();
					?>
                </div>
            </div>
		</section>

	</div>
	<?php 
// 	endwhile; 
// endif;
get_footer(); ?>