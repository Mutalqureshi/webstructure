<?php
global $fdata;
?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <head >
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    
    <?php if( $fdata['favicon-logo']) {echo '<link rel="shortcut icon" href="'.$fdata['favicon-logo']['url'].'" />';}?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900&display=swap" rel="stylesheet">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
  <?php echo wp_head(); ?>
  </head>


  <body <?php body_class(); ?>>
    <!--top-head-->
    
    <header>
      <div class="top-bar">
            <div class="container">
               <div class="row">
                <div class="col-md-8">
                  <div class="topbar_details">
                    <ul>
                      <li><i class="fas fa-envelope"></i><a href="mailto:<?php echo do_shortcode('[email]'); ?>"><?php echo do_shortcode('[email]'); ?></a></li>
                      <li>|</li>
                      <li><i class="fas fa-phone fa-flip-horizontal"></i><a href="tel:<?php echo do_shortcode('[phone]'); ?>" ><?php echo do_shortcode('[phone]'); ?></a></li>
                    </ul>
                  </div>
                </div><!-- col md 6 -->

                <div class="col-md-4">
                    <div class="social-icon">
                       <ul>
  <?php if( $fdata['linkedin']) {?><li><a target="_blank" href="<?php echo $fdata['linkedin']; ?>"><i class="fab fa-linkedin-in"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['facebook']) {?><li><a target="_blank" href="<?php echo $fdata['facebook']; ?>"><i class="fab fa-facebook-f"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['twitter']) {?><li><a target="_blank" href="<?php echo $fdata['twitter']; ?>"><i class="fab fa-twitter"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['google-plus']) {?><li><a target="_blank" href="<?php echo $fdata['google-plus']; ?>"><i class="fab fa-google-plus"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['youtube']) {?><li><a target="_blank" href="<?php echo $fdata['youtube']; ?>"><i class="fa fa-youtube"></i>&nbsp;</a></li><?php } ?>

  <?php if( $fdata['instagram']) {?><li><a target="_blank" href="<?php echo $fdata['instagram']; ?>"><i class="fab fa-instagram"></i>&nbsp;</a></li><?php } ?>
                        </ul>
                        
                    </div><!-- social icon-->
                </div><!--col-->
              </div><!--row-->

            </div><!-- container-->
      </div><!--top bar -->
      <div class="main_header">
        <div class="container">
          <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-9">
                  <div class="logo">
                      <?php if($fdata['site-logo']['url']){
                      echo '<a href="'.get_site_url().'" class="header-logo"><img src="'.$fdata['site-logo']['url'].'" alt="Site-main-logo"></a>';
                        }
                      ?>  
                  </div>
                </div><!-- col-lg-3 col-md-6 col-sm-6 col-9-->
                <div class="col-lg-9 col-md-6 col-sm-6 col-3 header_nav_i">
                     
        
                      <div class="nav-wrapper">
                      <?php 
                        if ( has_nav_menu( 'menu-1' )){
                          wp_nav_menu(array( 
                          'container' => false,
                          'depth'             => 2,
                          'menu_class'=> 'main-menu',
                          'menu_id'=> '',
                          'theme_location' => 'menu-1'
                          )); 
                        } 
                        else{
                          echo "<p>Assign Any Menu To Header Main Menu</p>";
                        }
                      ?>  
                     
                      </div>
        
                      <div class="cart_bar">
                        <ul>
                          <li class="md_t"><img src="<?php echo get_template_directory_uri()?>/img/bars.jpg" alt=""></li>
                          <li>

            <a class="new" href="<?php echo wc_get_cart_url(); ?>">           
                        <img src="<?php echo get_template_directory_uri()?>/img/cart.jpg" alt="">
                        <span class="cart_quantity new"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
            </a>

           
           <?php 
           /*   <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>

             */ ?>

                          </li>
                        </ul>
                      </div>

                      <div class="res-menu">  
                         <?php echo do_shortcode( '[responsive_menu]' ); ?>
                      </div>
                </div><!--col-md-9-->
              </div><!-- row -->
        </div><!-- container-->
      </div><!-- main header-->
    </header>