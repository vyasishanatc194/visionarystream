<?php get_header();
if (have_posts() ) : 
	while (have_posts() ) : the_post();	
	?>
    <div class="body-full">
		<div class="container">
	
			<section class="index-vision">
				<?php the_content(); ?>
			</section> 
	
		</div>
	</div>
	<?php 
	endwhile; 
endif;
get_footer(); ?>