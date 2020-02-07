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

<?php get_footer(); ?>

<!-- footer -->
