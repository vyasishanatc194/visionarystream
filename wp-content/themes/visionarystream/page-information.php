<?php 
	get_header();
?>

<div class="body-full">
<div class="container">
	
    <section class="block-body">
        
        <section class="index-vision">
			<?php 
			if (have_posts() ) : 
				while (have_posts() ) : the_post();	
					the_content(); 
				endwhile; 
			endif;
			?>
        </section> 
        
    </section>

</div>
</div>
<?php get_footer(); ?>