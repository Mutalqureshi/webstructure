<?php
global $fdata;
?>
<footer>
	
	<div class="mid_sec_foot">
		<div class="container">	
			<div class="row">
					<div class="col-lg-8">
						<div class="footer_widget_left">	
							<?php if ( is_active_sidebar('footer_widget') ) : ?>
									<?php dynamic_sidebar('footer_widget'); ?>
							<?php endif; ?>
						</div>
					</div><!--footer widget col md -->
					<div class="col-lg-4">
						<div class="bottombar_details">
		                    <ul>
		                      <li><i class="fas fa-phone fa-flip-horizontal"></i><a href="tel:<?php echo do_shortcode('[phone]'); ?>" ><?php echo do_shortcode('[phone]'); ?></a></li>
		                      <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo do_shortcode('[email]'); ?>"><?php echo do_shortcode('[email]'); ?></a></li>
		                    </ul>
				        </div><!--bottom bar-->
								
					<div class="footer_social">
                       <ul>
                       	<li>Follow us</li>
  <?php if( $fdata['linkedin']) {?><li><a target="_blank" href="<?php echo $fdata['linkedin']; ?>"><i class="fab fa-linkedin-in"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['facebook']) {?><li><a target="_blank" href="<?php echo $fdata['facebook']; ?>"><i class="fab fa-facebook-f"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['twitter']) {?><li><a target="_blank" href="<?php echo $fdata['twitter']; ?>"><i class="fab fa-twitter"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['google-plus']) {?><li><a target="_blank" href="<?php echo $fdata['google-plus']; ?>"><i class="fab fa-google-plus"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['youtube']) {?><li><a target="_blank" href="<?php echo $fdata['youtube']; ?>"><i class="fa fa-youtube"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['instagram']) {?><li><a target="_blank" href="<?php echo $fdata['instagram']; ?>"><i class="fab fa-instagram"></i>&nbsp;</a></li><?php } ?>
                        </ul>
                        
                    </div>			

					</div>
			</div><!--row -- >
		</div><!--container-->	
	</div><!--mid sec foot-->
	<div class="foot_last">	
			<div class="container">	
				<div class="row">	
					<div class="col-md-12">
						<div class="foot_content">
							<div class="foot-nav">
							<?php 
								if ( has_nav_menu( 'menu-2' )){
								wp_nav_menu(array( 
								'container' => false,
								// 'depth'             => 2,
								'menu_class'=> 'main-menu',
								'menu_id'=> '',
								'theme_location' => 'menu-2'
								)); 
								} 
								else{
								echo "<p>Assign Any Menu To Header Main Menu</p>";
								}
								?>  
							<?php //echo do_shortcode( '[responsive_menu]' ); ?>
							</div><!--foot content-->

							<div class="copy_right_t">	
									<?php if($fdata['footer-copyright']){
										$output = do_shortcode($fdata['footer-copyright']);
										echo '<span class="copy-right-text">'.$output.'</span>';
									} ?>
							</div><!--copy right t-->
						</div><!--foot content-->
					</div><!--col-->
				</div>
			</div>
	</div><!--foot last-->	
</footer>
 <?php echo wp_footer(); ?>
  </body>
</html>

