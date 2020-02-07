<!-- header -->
<?php get_header(); ?>
       
<div id="primary" class="content-area">
    <main id="main" class="site-main container">
        <?php
        while ( have_posts() ) :
        the_post();

        echo '<div class="entry-content single_post">';
?>

    <div class="blog-post-title-section">
                    <h1 class="blog-head">Recipes
                        <br>
                    </h1>
                         <span class="brd"><?php bcn_display(); ?></span> 

    </div><!-- title section-->
    <div class="row detail-page">
        <div class="col-lg-8">
            <div class="blog-detail-content reci">
                <h1 class="blog-title"><?php the_title(); ?></h1>
                    
                                    <div class="blogListFooter">
                                        <p>
                                            <span class="listAuthor"><?php echo get_the_date(); ?> By <?php the_author_link(); ?></span>
                                            <!-- <span class="listAuthor"><i class="far fa-clock"></i><?php// echo get_the_date(); ?> By <?php //the_author_link(); ?></span> -->
                                            <!-- <span class="listTime">in Our Services</span> -->
                                            <!-- <span class="listTime">in <?php //the_category(', '); ?></span> -->
                                        </p>
                                    </div><!-- ( BLOG LIST FOOTER END ) -->
<?php 
                $post_id = get_the_ID();
                         if (has_post_thumbnail($post_id)){ 
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'single_blog_post'); 
?>
                            <img class="img-fluid" src="<?php echo $url[0]; ?>"  alt="">
<?php 
                         }

 ?>

                        <div class="blogDesc">
                                        <p ><?= get_the_excerpt(); ?></p>
                                        <div class="text-left"><?= get_the_content(); ?></div>
                                    <div class="shareField">
                                            <?php echo do_shortcode('[Social9_Share]'); ?>
                                        </div>

                        </div><!--blog desc-->
                            <div class="full">
                                <ul class="single-pagination">
                                    <li class="previous">
                                        <?php previous_post_link( '%link', __( '', '' ) . '<i class="fa fa-angle-left" aria-hidden="true"></i> Previous' ); ?>
                                    </li>
                                    <li class="next">
                                        <?php   next_post_link( '%link', __( '', '' ) . 'Next <i class="fa fa-angle-right" aria-hidden="true"></i> ' ); ?>
                                    </li>
                                </ul>
                            </div><!-- full-->
            </div><!-- blog detail page-->
        </div><!--col-lg -->

     <div class="col-lg-4">
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        </div>
    </div><!-- -->

 <!--  -->

<?php
        echo '</div><!-- .entry-content -->';

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div>
<?php get_footer(); ?>

<!-- footer -->
