<?php
/*
Template Name: Search Page
*/
get_header(); ?>
	<section id="primary <?php echo "default page-".$post_id = get_the_ID();?>" class="all-pages <?php echo "page-".$post_id = get_the_ID(); wp_title('');?>">
		<div class="other-page-title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title"></h1>
					</div>
				</div>
			</div>
		</div>
		<section class="search-all">
			<div class="container">
					<?php
					if ( have_posts() ) : ?>
					
			<?php 		
					
					//echo "searching page";
					/*-----this is for pages----------*/
					?>
                    <h1 class="search-head"><?php 	printf( esc_html__( 'Results for: %s', 'storevilla' ), '<span>' . get_search_query() . '</span>' );  //the_title(); ?></h1>
				<div class="row">
					<div class="col-md-8">
						<div class="section-blog">
        <?php
        while ( have_posts() ) :
        the_post();
        // the_content();
        ?>
                <div class="the_blog">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="blog-img">
                             <div class=res_img>
                      <?php 
                            $post_id = get_the_ID();
                         if (has_post_thumbnail($post_id)){ 
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'blog'); 
                            ?>
                            <img class="img-fluid" src="<?php echo $url[0]; ?>"  alt="">
                            <?php 
                            }

                             ?>

                             <div class="date-des">
                                <span class="max-date"><?php echo   get_the_time('M'). ", " . get_the_time('d').', ' .get_the_time('Y')  ?></span>
                             </div>

                            </div> <!-- img div-->'
                            </div>
                        </div><!-- col-sm-8 -->
                            <div class="col-sm-7">
                                <div class="cus_sh1">
                                    <h1 class="cush1-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                        <p><?php st_my_excerpt(40); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="more2">Read More...</a>

                                    <div class="blogListFooter">
                                        <p>
                                            <span class="listAuthor"><i class="far fa-clock"></i><?php echo get_the_date(); ?> By <?php the_author_link(); ?></span>
                                            <span class="listTime">in <?php the_category(', '); ?></span>
                                        </p>
                                        <div class="shareField">
                                            <?php echo do_shortcode('[Social9_Share]'); ?>
                                        </div>
                                    </div><!-- ( BLOG LIST FOOTER END ) -->
                                </div><!-- blog content-->
                            </div><!--col-->


                    </div><!--row -->
                </div><!-- the blog-->

        <?php
        endwhile; // End of the loop.
        ?>

             <div class="text-center">
                <?php wpbeginner_numeric_posts_nav(); ?><!-- ( PAGINATION END ) -->
            </div>


        </div>
					</div>
					<div class="col-sm-4 mggt">
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
					</div><!--md -->
				</div><!-- row-->	

	
					


					
				<?php	
				/*-----this is for pages-ended---------*/
		
		

?>		


				
				
				
				
				
				
					<?php	
					// the_posts_pagination();
					else :
					//get_template_part( 'template-parts/content', 'none' );
					?>	
					<section class="no-result-post not-found ">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<div class="page-content text-center">
										<p class="not-found-para"><?php _e( 'It looks like nothing was found ? Search an other', '' ); ?></p>
										<?php get_search_form(); ?>
									</div><!-- .page-content -->
								</div>
							</div>
						</div>
					</section>
						<?php	
					endif; ?>
			</div>
		</section>
	</section>
<?php get_footer();