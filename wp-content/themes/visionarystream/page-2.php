<?php
/**
 * Template Name: Landing Page 1
 */

get_header();
$pageId = get_the_ID();
$post = get_post($pageId);
?>

<div class="body-full">
    
    <section class="vs-glasses-top" style="background-image: url('<?php echo get_the_post_thumbnail_url($pageId); ?>');">         
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bannr-bottom">
                        <?php echo $post->post_content; ?>                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="glass-frame">
        <div class="container conatiner-1000">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="frame-box">
                        <div><img src="<?php echo get_field('image_1', $pageId)['url']; ?>" alt="2020 EYE" title="2020 EYE"></div>               
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="frame-box">
                        <div><img src="<?php echo get_field('image_2', $pageId)['url']; ?>" alt="2020 EYE" title="2020 EYE"></div>                                 
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="glass-heading">
                        <?php echo get_field('spexwax_content', $pageId); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php if (get_field('hide_or_show_section_all_brands', $pageId)) : ?>
    <section class="all-brand-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="all-brnad-heading" style="background-image: url('<?php echo get_field('section_image', $pageId)['url']; ?>');">
                        <h1><?php echo get_field('section_title_all_brands', $pageId); ?></h1>
                    </div>
                </div>
            </div>

            <div class="all-brnad-grid">
                <div class="row row-30">
                    <?php
                        $args = array(
                            'taxonomy'     => 'product_cat',
                            'orderby'      => 'name'
                        );
                        $all_categories = get_categories( $args );
                        foreach ($all_categories as $cat) {
                            if($cat->category_parent == 0) {
                                $category_id = $cat->term_id;
                                $link = get_term_link($cat->slug, 'product_cat');
                                $cat_name = $cat->name;
                                $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
                                // get the image URL
                                $image = wp_get_attachment_url( $thumbnail_id ); 
                    ?>
                    <a href="<?php echo $link; ?>" title="<?php echo $cat_name; ?>">
                        <div class="col-lg-4 col-md-4 col-sm-6 pad-30">
                            <div class="all-brand-img">
                                <img src="<?php echo $image; ?>" alt="<?php echo $cat_name; ?>" title="<?php echo $cat_name; ?>" />
                            </div>
                        </div>
                    </a>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>               
        </div>
    </section>
    <section class="client-logo">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-carousel-logo owl-theme">
                        <?php
                            $args = array(
                                'post_type' => 'logo',
                            );
                            $query = new WP_Query( $args );
                            while ( $query->have_posts() ) : $query->the_post();
                        ?>
                            <div class="item">
                                <div class="img-client-logo">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
                                </div>
                            </div>
                        <?php 
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (get_field('hide_or_show_section_best_deal', $pageId)) : ?>
    <section class="best-deal-section">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="deal-heading">
                        <h2><?php echo get_field('section_title_best_deal', $pageId); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="conatiner-fluid">
            <div class="row">    
                 <div class="owl-carousel owl-carousel-best-deal owl-theme">
                    <?php
                        $args = array(
                            'post_type'      => 'product',
                            'posts_per_page' => 10,
                        );
                    
                        $loop = new WP_Query( $args );
                        $maximumper = 0;
                        while ( $loop->have_posts() ) : $loop->the_post();
                            global $product;
                            if (get_field('is_it_best_deal', get_the_ID())) :
                                $regular_price = $product ->regular_price;
                                $sales_price = $product ->sale_price;
                                $percentage = round((( ( $regular_price - $sales_price ) / $regular_price ) * 100),1) ;
                                if ($percentage > $maximumper) {
                                    $maximumper = $percentage;
                                }
                    ?>
                    <a href="<?php echo get_permalink(); ?>">
                        <div class="item">
                            <div class="col-lg-12">
                                <div class="best-deal-box">
                                    <div class="frame-box">
                                        <div>
                                            <a href="#" class="view-product" data-toggle="modal" data-target="#modal-frame" id="<?php echo $products->post->ID; ?>" >
                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                                            </a>
                                        </div>
                                        <p><?php echo get_the_title(); ?></p>
                                        <h3><?php echo sprintf( __('%s', 'woocommerce' ), $maximumper . '%' ); ?> <span>OFF</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                            endif;
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if (get_field('hide_or_show_section_auctions', $pageId)) : ?>
    <section class="auction-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="auction-heading">
                        <h2><?php echo get_field('section_title_auctions', $pageId); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="conatiner-fluid">
            <div class="row">    
                 <div class="owl-carousel owl-carousel-auction owl-theme">
                    <?php
                        $args = array(
                            'post_type'      => 'product',
                            'posts_per_page' => 10,
                        );
                    
                        $loop = new WP_Query( $args );
                        $maximumper = 0;
                        while ( $loop->have_posts() ) : $loop->the_post();
                            global $product;
                            if (get_field('is_it_in_auctions', get_the_ID())) :
                                $regular_price = $product ->regular_price;
                                $sales_price = $product ->sale_price;
                                $percentage = round((( ( $regular_price - $sales_price ) / $regular_price ) * 100),1) ;
                                if ($percentage > $maximumper) {
                                    $maximumper = $percentage;
                                }
                    ?>
                    <div class="item">
                        <div class="col-lg-12">
                            <div class="auction-box">
                                <div class="frame-box">
                                    <div>
                                        <a href="#" class="view-product" data-toggle="modal" data-target="#modal-frame" id="<?php echo $products->post->ID; ?>" >
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>">
                                        </a>
                                    </div>
                                    <p><?php echo get_the_title(); ?></p>
                                    <h3><?php echo sprintf( __('%s', 'woocommerce' ), $maximumper . '%' ); ?> <span>OFF</span></h3>
                                </div>
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
        </div>
    </section>
<?php endif; ?>
<?php if (get_field('hide_or_show_section_give_a_pair', $pageId)) : ?>
    <section class="allframe-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="frames-heading">
                        <h3><?php echo get_field('section_title_give_a_pair', $pageId); ?></h3>
                        <?php echo get_field('section_content_give_a_pair', $pageId); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 10,
                    );
                
                    $products = new WP_Query( $args );
                    while ( $products->have_posts() ) : $products->the_post();
                        if (get_field('is_it_in_give_a_pair', get_the_ID())) :
                            $sales_price = $product->sale_price;
                            $version = $product->get_attribute('Version');
                            $color = $product->get_attribute('Color');
                            $product_name = explode(" ",get_the_title( $products->post->ID ));
                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6">
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
                </a>
                <?php
                        endif;
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
<?php endif; ?>
    <section class="stream-btn-div">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="div-btn">
                        <a href="#" class="btn btn-default btn-stream">Stream on</a>
                    </div>
                </div>
            </div>
        </div>    
    </section>

<?php 
get_footer(); ?>