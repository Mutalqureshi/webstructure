<!-- header -->
<?php get_header(); ?>

       
<div id="primary" class="content-area">
    <main id="main" class="site-main container">
        <?php
        while ( have_posts() ) :
        the_post();

        echo '<div class="entry-content">';
        the_content();
        echo '</div><!-- .entry-content -->';

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div>
<div class="top_sec_footer">    
        <div class="container"> 
            <div class="row">
                <div class="col-lg-7 home_c">
                    <?php if($fdata['contact_form']){
                                        $output = do_shortcode($fdata['contact_form']);
                                        echo '<div class="contact_form">'.$output.'</div>';
                    } ?>
                </div><!-- col lg 7 -->
                <div class="col-lg-4 offset-lg-1">
                    <div class="social_widget"> 
                        <?php if ( is_active_sidebar('social_widget') ) : ?>
                                    <?php dynamic_sidebar('social_widget'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- r0w -->
        </div>
    </div><!--top_-->
<?php get_footer(); ?>

<!-- footer -->
