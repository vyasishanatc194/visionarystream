<?php 
/* Template Name: Dark Page */ 

get_header('dark');

if (have_posts() ) : 
	while (have_posts() ) : the_post();	
	
	$pageID=$post->ID;
	$cptName='';
	$taxName='';
	$filterCat='';
	
	if (isset($_GET['filter'])){
		$filterCat=strtolower($_GET['filter']);	
	}
	
	if ($pageID=='125'){
		$cptName='event_boxes';
		$taxName="event_filters";
		$cat1='eye';
		$cat2='opening';
		$cat3='experiences';
	} else
	if ($pageID=='131'){
		$cptName='exhibit_boxes';
		$taxName="exhibit_filters";
		$cat1='vision';
		$cat2='art';
		$cat3='design';
	} else
	if ($pageID=='134'){
		$cptName='exposure_boxes';
		$taxName="exposure_filters";
		$cat1='seeing';
		$cat2='believing';
		$cat3='inspiring';
	}
	
	$pageFeaturedImage = get_the_post_thumbnail_url($pageID,'full');
	
	
	
	
	?>
    
    <div class="body-full" id="darkBody" style="background-image:url(<?php echo $pageFeaturedImage; ?>);">
		<div class="container">
	
			<section class="headerIntro">
            	<h1><a href="./"><?php the_title(); ?></a></h1>
				<?php the_content(); ?>
			</section>
            
            <div id="headerKeywords">
            
            	<ul>
					<li><a href="./?filter=<?php echo $cat1;?>" class="boxLink1 <?php echo ($filterCat==(strtolower(get_field('header_keyword_1')))) ? 'active' : ''; ?>"><?php the_field('header_keyword_1'); ?></a></li>
                    <li><a href="./?filter=<?php echo $cat2;?>" class="boxLink2 <?php echo ($filterCat==(strtolower(get_field('header_keyword_2')))) ? 'active' : ''; ?>"><?php the_field('header_keyword_2'); ?></a></li>
                    <li><a href="./?filter=<?php echo $cat3;?>" class="boxLink3 <?php echo ($filterCat==(strtolower(get_field('header_keyword_3')))) ? 'active' : ''; ?>"><?php the_field('header_keyword_3'); ?></a></li>
                </ul>
            
            </div>
            
	
		</div>
        
        
	</div>
    
    <div class="body-full" id="darkContent">
		<div class="container boxContainer">
            
            
            
            
            	<?php
				
					if (isset($_GET['filter']) && $_GET['filter']!=''){
						
						$args=array(
							'post_type' => $cptName,
							'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'order' => 'asc',
							'tax_query' => array(
								array(
									'taxonomy' => $taxName,
									'field'    => 'slug',
									'terms'    => $_GET['filter']
								),
							)
						);		
						
					} else {
				
						$args=array(
							'post_type' => $cptName,
							'posts_per_page' => -1,
							'orderby' => 'menu_order',
							'order' => 'asc'
						);
					
					}
				
				
				
					$boxQuery = new WP_Query($args);
					
					if ($boxQuery->have_posts()):
					
					?>
                    
                    <!--<section class="bodyContent" data-masonry='{ "itemSelector": ".contentBox", "isFitWidth": true, "horizontalOrder": true }'>-->
                    <section class="bodyContent">
                   
                    
                    	<ul id="boxGroup"><?php
					
						$i=1;
					
						while ($boxQuery->have_posts()) : $boxQuery->the_post();
						
							$cpID=$post->ID;
							$boxClass="";
							
							if ($i>9){
								$i=1;	
							}
							
            	?><li class="box<?php echo $i.' '.$boxClass; ?>">
                	
                        <div class="boxy">
                        	<div class="contentBox">
                            	<div class="contentBoxInner">
                                    <!--<a data-fancybox data-src="#cptHiddenContent<?php echo $cpID; ?>" href="javascript:;" style="background-color:<?php the_field('box_color'); ?>">-->
                                    <a data-fancybox data-src="#cptHiddenContent<?php echo $cpID; ?>" href="javascript:;">
                                    	<div class="boxyPreview">
                                        	<?php echo '<p>'.wp_trim_words( get_the_content(), 10, '...' ).'</p>'; ?>
                                        </div>
                                        <div class="boxyContent">
                                        	<h3><?php the_title(); ?></h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div style="display: none;" id="cptHiddenContent<?php echo $cpID; ?>" class="boxyContent">
                            <?php the_content(); ?>
                        </div>
                        
                        <div class="seoVisible">
                            <?php the_content(); ?>
                        </div>
                    
                    </li><?php
				
							$i++;
						
						endwhile;
						
				?></ul>
                    
                </section>
                
                
                
                <?php
					else:
				?>
                
                
                <section class="bodyContent">
                   
                    <ul id="boxGroup">
                    	<li class="box1">
                        	<div class="boxy">
                            	<div class="contentBox">
                            		<div class="contentBoxInner">
                                    	<a href="javascript:;">
                                    		<div class="boxyContent">
                                            	<h3>Coming Soon</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    	</li>
                    </ul>
                
                </section>
                
                <?php
					endif;
				?>
           
           		<script>
			
					var masObj=jQuery('.bodyContent').masonry({
					  isFitWidth: true,
					  itemSelector: '.contentBox',
					  horizontalOrder: true
					});
					
					//$grid.masonry('reloadItems')
					
					/*jQuery('.boxLink1').on( "click", function() {
						jQuery('#boxGroup .box1').addClass('hiddenElement');
					});*/
					
				</script>
            
            </section>
            
	
		</div>
        
        
	</div>
    
	<?php 
	endwhile; 
endif;

get_footer('dark'); 

?>