<?php 

function header_scripts(){
	wp_enqueue_style( 'thegutsylady-style', get_stylesheet_uri() );
    // main style 
        wp_enqueue_style( 'thegutsylady-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style( 'thegutsylady-fontawesome', get_template_directory_uri() . '/css/all.min.css' );
        wp_enqueue_style( 'thegutsylady-slider', get_template_directory_uri() . '/css/slick.css' );
        wp_enqueue_style( 'thegutsylady-theme', get_template_directory_uri() . '/css/slick-theme.css' );
        wp_enqueue_style( 'thegutsylady-responsive', get_template_directory_uri() . '/css/rwd.css' ,false, time() , 'all');
        wp_enqueue_style( 'thegutsylady-custom', get_template_directory_uri() . '/css/theme-style.css', false, time() , 'all' );
    // style end script start
        wp_enqueue_script( 'thegutsylady-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js' );
        wp_enqueue_script( 'thegutsylady-masonry-js', get_template_directory_uri() . '/js/masonry.pkgd.min.js' );
        wp_enqueue_script( 'thegutsylady-slick-js', get_template_directory_uri() . '/js/slick.js' );
        wp_enqueue_script( 'thegutsylady-custom-js', get_template_directory_uri() . '/js/custom.js', array(), time(), true );
	
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
	add_action( 'wp_enqueue_scripts', 'header_scripts');
// header scrip all 

	//--------//
/**
 * Load redux file.
 */// header scrip all --enc
if ( file_exists( get_template_directory() . '/inc/admin-folder/admin-init.php' ) ) {
	require get_template_directory() . '/inc/admin-folder/admin-init.php';

	function infloway_customize_css() {
		global $fdata;
		echo '<style type="text/css">';
		if(isset($fdata['opt-ace-editor-css'])) {
			echo $fdata['opt-ace-editor-css'];
		}
		echo '</style>';
	}
	add_action( 'wp_head', 'infloway_customize_css', 100);
	
	function infloway_customize_js() {
		global $fdata;
		if(isset($fdata['opt-ace-editor-js'])) {
			echo '<script>
			'.$fdata['opt-ace-editor-js'].'
			</script>
			';
		}
	}
	add_action( 'wp_footer', 'infloway_customize_js', 100);
}


	function the_gutsy_lady(){
		register_nav_menus( array(
		'menu-1' => esc_html__( 'Main Menu', 'the_gutsy_lady' ),
		'menu-2' => esc_html__( 'Sec Menu', 'the_gutsy_lady' ),
		) );


		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		
	}
	add_action('after_setup_theme', 'the_gutsy_lady');



	function phone_num(){
	    global $fdata;
	          $html='';
	            if($fdata['phone']){
	                    $html = $fdata['phone'];
	                }
	    return $html;
	}
	add_shortcode("phone","phone_num");

	function email_txt(){
	    global $fdata;
	          $html='';
	            if($fdata['email']){
	            $html = $fdata['email'];
	        }
	    return $html;
	}
	add_shortcode("email" ,"email_txt");
####################################################
	





	function wpbeginner_numeric_posts_nav() {

 

    if( is_singular() )

        return;

 

    global $wp_query;

 

    /** Stop execution if there's only 1 page */

    if( $wp_query->max_num_pages <= 1 )

        return;

 

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    $max   = intval( $wp_query->max_num_pages );

 

    /** Add current page to the array */

    if ( $paged >= 1 )

        $links[] = $paged;

 

    /** Add the pages around the current page to the array */

    if ( $paged >= 3 ) {

        $links[] = $paged - 1;

        $links[] = $paged - 2;

    }

 

    if ( ( $paged + 2 ) <= $max ) {

        $links[] = $paged + 2;

        $links[] = $paged + 1;

    }

 

    echo '<div class="navigation black-temp"><ul>' . "\n";

 

    /** Previous Post Link */

    if ( get_previous_posts_link() )

        printf( '<li class="prev">%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-angle-left" aria-hidden="true"></i>','') );

 

    /** Link to first page, plus ellipses if necessary */

    if ( ! in_array( 1, $links ) ) {

        $class = 1 == $paged ? ' class="active"' : '';

 

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

 

        if ( ! in_array( 2, $links ) )

            echo '<li>…</li>';

    }

 

    /** Link to current page, plus 2 pages in either direction if necessary */

    sort( $links );

    foreach ( (array) $links as $link ) {

        $class = $paged == $link ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );

    }

 

    /** Link to last page, plus ellipses if necessary */

    if ( ! in_array( $max, $links ) ) {

        if ( ! in_array( $max - 1, $links ) )

            echo '<li>…</li>' . "\n";

 

        $class = $paged == $max ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );

    }
     /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="next">%s</li>' . "\n", get_next_posts_link('<i class="fa fa-angle-right" aria-hidden="true"></i>','') );
    echo '</ul></div>' . "\n";
}


############## Login Logo ###############

add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() {
    global $fdata;
    //print_r($fdata['login-logo']);
    $logo_url = ( isset($fdata['login-logo']) ? $fdata['login-logo']['url'] : get_bloginfo('template_url').'/img/silverfox-logo.png' );
    $logo_height = ( isset($fdata['login-logo']) ? $fdata['login-logo']['height'] : '141' );
    ?>
    <style type="text/css">
        body.login {
            background-color:#fafafa;
        }
        body.login div#login h1 a {
            background-image: url(<?php echo $logo_url ?>);
            padding: 0px;
            margin:0 auto 25px;
            width:auto;
            height:<?=$logo_height?>px;
            background-position:center center;
            background-size:contain;
			}
    </style>
	<?php }

function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('current-year', 'year_shortcode');
/*----------*/
/*----site-url--------*/
function site_url_shortcode() {
  $url = get_site_url();
  return $url;
}
add_shortcode('site-url', 'site_url_shortcode');

function title_shortcode() {
     $sitetitle = get_bloginfo('name');
     return $sitetitle;
}
add_shortcode('site-title', 'title_shortcode');
/*----------*/
 function naked_register_sidebars() {
    register_sidebar(array(                 // Start a series of sidebars to register
        'id' => 'footer_widget',                  // Make an ID
        'name' => 'Footer Widget',                // Name it
        'description' => 'Take it on the side...', // Dumb description for the admin side
        'before_widget' => '<div class="widget">',  // What to display before each widget
        'after_widget' => '</div>', // What to display following each widget
        'before_title' => '<span class="title-side-bar">',  // What to display before each widget's title
        'after_title' => '</span>',     
        'empty_title'=> '',                 // What to display in the case of no title defined for a widget
    ));

     register_sidebar(array(                 // Start a series of sidebars to register
        'id' => 'social_widget',                  // Make an ID
        'name' => 'Social Widget',                // Name it
        'description' => 'Take it on the side...', // Dumb description for the admin side
        'before_widget' => '<div class="widget">',  // What to display before each widget
        'after_widget' => '</div>', // What to display following each widget
        'before_title' => '<span class="title-side-bar">',  // What to display before each widget's title
        'after_title' => '</span>',     
        'empty_title'=> '',                 // What to display in the case of no title defined for a widget
    ));

    register_sidebar(array(                 // Start a series of sidebars to register
        'id' => 'podcast',                  // Make an ID
        'name' => 'Podcast',                // Name it
        'description' => 'Take it on the side...', // Dumb description for the admin side
        'before_widget' => '<div class="podcast_widget">',  // What to display before each widget
        'after_widget' => '</div>', // What to display following each widget
        'before_title' => '<span class="title-side-bar">',  // What to display before each widget's title
        'after_title' => '</span>',     
        'empty_title'=> '',                 // What to display in the case of no title defined for a widget
    )); 

     register_sidebar(array(                 // Start a series of sidebars to register
        'id' => 'blog-sidebar',                  // Make an ID
        'name' => 'Blog Sidebar',                // Name it
        'description' => 'Take it on the side...', // Dumb description for the admin side
        'before_widget' => '<div class="service_widget">',  // What to display before each widget
        'after_widget' => '</div>', // What to display following each widget
        'before_title' => '<span class="title-side-bar">',  // What to display before each widget's title
        'after_title' => '</span>',     
        'empty_title'=> '',                 // What to display in the case of no title defined for a widget
    ));

     
} 
add_action( 'widgets_init', 'naked_register_sidebars' );







function st_my_excerpt($excerpt_length = 55, $id = false, $echo = true) {

    $text = '';

    if ($id) {
        $the_post = & get_post($my_id = $id);
        $text = ($the_post->post_excerpt) ? $the_post->post_excerpt : $the_post->post_content;
    } else {
        global $post;
        $text = ($post->post_excerpt) ? $post->post_excerpt : get_the_content('');
    }

    $text = strip_shortcodes($text);
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);

    $excerpt_more = '';
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
    if ($echo)
        echo apply_filters('the_content', $text);
    else
        return $text;
}

function get_my_excerpt($excerpt_length = 55, $id = false, $echo = false) {
    return st_my_excerpt($excerpt_length, $id, $echo);
}












// post type

function our_service() {
  register_post_type( 'Our_Services',   
     array(
      'labels' => array(
        'name' => __( 'Our Services' ),
        'singular_name' => __( 'Our Services' ),
        'add_new'            => _( 'Add New Our Service'),
        'add_new_item'       => __( 'Add New Our Service'),
        'new_item'           => __( 'New Our Services'),
        'edit_item'          => __( 'Edit Our Services'),
        'view_item'          => __( 'View Our Services'),
        'all_items'          => __( 'All Our Service'),
        'search_items'       => __( 'Search Our Services')
      ),        
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','excerpt'),
        'menu_icon'           => 'dashicons-admin-tools',
        'menu_position' => 52
     )  
  );
}
add_action( 'init', 'our_service' );

add_image_size( 'service_home', 355, 252, array( 'center', 'center' ) );
add_image_size( 'blog', 350, 282, array( 'center', 'center' ) );
function our_services() 
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'Our_Services',
        // 'order' => 'ASC',
    ); 
    $loop = new WP_Query($args); // The Loop
    $html = '';
    $html .='<div id="our_services" class="multiple-items">';
        while ( $loop->have_posts() ) : $loop->the_post();
                { 
                    $post_id = get_the_ID();
                        $html .= '<div class="services-section">';

                         if (has_post_thumbnail($post_id)) { 
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'service_home'); 
                                       $html .='<img src="'.$url[0]. ' ">';
                         }
                         else { 
                                  $html .='<img src="http://placehold.it/355x252" width="355" height="252" alt="">';
                              } 
                            $html .= '<h3 class="our-title">'.get_the_title().' </h3>';
                            $html .= '<p>'.get_my_excerpt(32).'</p>';
                            $html .= '<a href="'.get_the_permalink() .'" class="service_btn">Learn More</a>';
                            // $html .= get_the_post_thumbnail();;
                            // $html .= '<h2 class="testimonial-tilte">'.get_the_title().' </h2>';
                        $html .= '</div>';
                    
                } 
        endwhile;
    $html .='</div>';
    return $html;
}
add_shortcode("our_services","our_services");



// ####### services end

// ######  recipes


function our_Recipes() {
  register_post_type( 'Recipes',   
     array(
      'labels' => array(
        'name' => __( 'Recipes' ),
        'singular_name' => __( 'Recipes' ),
        'add_new'            => _( 'Add New Recipes'),
        'add_new_item'       => __( 'Add New Recipes'),
        'new_item'           => __( 'New Recipes'),
        'edit_item'          => __( 'Edit Recipes'),
        'view_item'          => __( 'View Recipes'),
        'all_items'          => __( 'All Recipes'),
        'search_items'       => __( 'Search Recipes')
      ),        
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','excerpt'),
        'menu_position' => 53
     )  
  );
}
add_action( 'init', 'our_Recipes' );


// --

add_image_size( 'Recipes_home', 263, 202, array( 'center', 'center' ) );
add_image_size( 'Recipes_home_2', 550, 331, array( 'center', 'center' ) );
function our_rec() 
{
    $args = array(
        'posts_per_page' => 5,
        'post_type' => 'Recipes',
        // 'order' => 'ASC',
    ); 
    $loop = new WP_Query($args); // The Loop

    $html = "";
    $html .='<div  class="container">';
    $html .='<div  class="row our_Recipes_home grid">';
    $html .='<div class="grid-sizer"></div>';
       $i = 0;
        while ( $loop->have_posts() ) { $loop->the_post();
                 $i++;
                    $post_id = get_the_ID();
                        
if ( $i % 6 == 2 ) {
                        $html .= '<div class="col-md-6 pl-res grid-item recipes-section ">';
                        $html .= '<div class=res_img>';
                         if (has_post_thumbnail($post_id)) { 
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'Recipes_home_2'); 
                                       $html .='<img src="'.$url[0]. ' ">';
                         }
                         else { 
                                  $html .='<img src="http://placehold.it/263x202" width="263" height="202" alt="">';
                              } 

                            $html .= ' <div class="date-des">';
                            $html .= '<span class="max-date">'. get_the_time('M'). " " . get_the_time('d').', ' .get_the_time('Y').'</span>';
                            $html .= ' </div>';

                            $html .= '</div> <!-- img div-->';

                            $html .= '<h3 class="res-title res-mg">'.get_the_title().' </h3>';
                            $html .= '<p>'.get_the_excerpt().'</p>';
                            $html .= '<p class="res_need">'.get_the_content(). '</p>';
                            $html .= '<a href="'.get_the_permalink() .'" class="res_btn">Read more...</a>';
                            $html .= '</div>';
                    }

                    else{
                            $html .= '<div class="col-md-3 pl-res grid-item recipes-section">';
                            $html .= '<div class=res_img>';
                         if (has_post_thumbnail($post_id)) { 
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'Recipes_home'); 
                                       $html .='<img src="'.$url[0]. ' ">';
                         }
                         else { 
                                  $html .='<img src="http://placehold.it/263x202" width="263" height="202" alt="">';
                              } 

                            $html .= ' <div class="date-des">';
                            $html .= '<span class="max-date">'. get_the_time('M'). " " . get_the_time('d').', ' .get_the_time('Y').'</span>';
                            $html .= ' </div>';

                            $html .= '</div> <!-- img div-->';
                            

                            $html .= '<h3 class="res-title">'.get_the_title().' </h3>';
                            $html .= '<p>'.get_the_excerpt().'</p>';
                            $html .= '<a href="'.get_the_permalink() .'" class="res_btn">Read more...</a>';
                            $html .= '</div>';
                    }  /*else*/
        }/*while*/
    $html .='</div>';
    $html .='</div>';
    return $html;
}
add_shortcode("our_recipes","our_rec");



// recipes end 

add_image_size( 'recent-posts-image', 358, 327, array( 'center', 'center' ) );



function latest_health() 
{
  $loop = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'tax_query' =>array(
                  array(
                    'taxonomy'         => 'category',
                    'terms'            => '4',
                    'field'            => 'term_id',
                  ),
                ),
        // 'order' => 'ASC',
    ) 
);
    // $loop = new WP_Query($args); // The Loop
    $html = "";
    $html .='<div class="container">';
    $html .='<div class="row latest_health">';
        while ( $loop->have_posts() ) { $loop->the_post();
            
                    $post_id = get_the_ID();
                        
                        $html .= '<div class="col-md-4">';
                        $html .= '<div class="main_col_h2">';
                        $html .= '<div class=res_img>';
                         if (has_post_thumbnail($post_id)) { 
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'recent-posts-image'); 
                                       $html .='<img src="'.$url[0]. ' ">';
                         }
                         else { 
                                  $html .='<img src="http://placehold.it/263x202" width="263" height="202" alt="">';
                              } 

                            $html .= ' <div class="date-des blg">';
                            $html .= '<span class="max-date">'. get_the_time('M'). " " . get_the_time('d').', ' .get_the_time('Y').'</span>';
                            $html .= ' </div>';

                            $html .= '</div> <!-- img div-->';
                            $html .= '<div class="main_col_content">';

                            $html .= '<h3 class="res-title res-mg">'.get_the_title().' </h3>';
                            // $html .= '<p>'.get_the_excerpt().'</p>';
                            // $html .= '<p>'.get_my_excerpt(20).'</p>';
                            $html .= '<p>'.get_the_excerpt().'</p>';
                            // $html .= '<p class="res_need">'.get_the_content(). '</p>';
                            $html .= '<a href="'.get_the_permalink() .'" class="res_btn hea_btn">Read more</a>';
                            $html .= '</div>';
                            $html .= '</div>';
                            $html .= '</div>';
                   
        }/*while*/
    $html .='</div>';
    $html .='</div>';
    return $html;
}
add_shortcode("latest_health","latest_health");


// nutrition

function latest_neu() 
{
  $loop = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'tax_query' =>array(
                  array(
                    'taxonomy'         => 'category',
                    'terms'            => '5',
                    'field'            => 'term_id',
                  ),
                ),
        // 'order' => 'ASC',
    ) 
);
    // $loop = new WP_Query($args); // The Loop
    $html = "";
    $html .='<div class="container">';
    $html .='<div class="row latest_health">';
        while ( $loop->have_posts() ) { $loop->the_post();
            
                    $post_id = get_the_ID();
                        
                        $html .= '<div class="col-md-4">';
                        $html .= '<div class="main_col_h">';
                        $html .= '<div class=res_img>';
                         if (has_post_thumbnail($post_id)) { 
                            $url = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'recent-posts-image'); 
                                       $html .='<img src="'.$url[0]. ' ">';
                         }
                         else { 
                                  $html .='<img src="http://placehold.it/263x202" width="263" height="202" alt="">';
                              } 

                            $html .= ' <div class="date-des blg">';
                            $html .= '<span class="max-date">'. get_the_time('M'). " " . get_the_time('d').', ' .get_the_time('Y').'</span>';
                            $html .= ' </div>';

                            $html .= '</div> <!-- img div-->';
                            $html .= '<div class="main_col_content">';

                            $html .= '<h3 class="res-title res-mg">'.get_the_title().' </h3>';
                            // $html .= '<p>'.get_the_excerpt().'</p>';
                            $html .= '<p>'.get_the_excerpt().'</p>';
                            // $html .= '<p class="res_need">'.get_the_content(). '</p>';
                            $html .= '<a href="'.get_the_permalink() .'" class="res_btn hea_btn">Read more</a>';
                            $html .= '</div>';
                            $html .= '</div>';
                            $html .= '</div>';
                   
        }/*while*/
    $html .='</div>';
    $html .='</div>';
    return $html;
}
add_shortcode("latest_neu","latest_neu");

// testimonial posttype

function testimonial() {
  register_post_type( 'Testimonials',   
     array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonials' ),
        'add_new'            => _( 'Add New Testimonials'),
        'add_new_item'       => __( 'Add New Testimonials'),
        'new_item'           => __( 'New Testimonials'),
        'edit_item'          => __( 'Edit Testimonials'),
        'view_item'          => __( 'View Testimonials'),
        'all_items'          => __( 'All Testimonials'),
        'search_items'       => __( 'Search Testimonials')
      ),        
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail','excerpt'),
        'menu_position' => 53
     )  
  );
}
add_action( 'init', 'testimonial' );



// fetch 

function testimonials_list(){
    $args = array(
        // 'posts_per_page' => 1,
        'post_type' => 'testimonials',
        'order' => 'ASC',
    ); 
    $loop = new WP_Query($args); // The Loop

    // $html .= '<section class="testimonial-sec">';
    // $html .= '<h2>Testimonials</h2>';
    $html ='';
    $html .='<div id="testimonial-slider" class="testimonial">';
        while ( $loop->have_posts() ) : $loop->the_post();
                { 
                    $post_id = get_the_ID();
                    $html .='<div class="testimonial-div">';

                        $html .= '<div class="testimonial-slider-section">';
                        // $html .= '<h2 class="testimonial-tilte">'.get_the_title().' </h2>';
                        
                        $html .= '<p>'.get_the_content().'</p>';
                        $html .= '<hr class="testimonial_hr">';

                            $html .='<div class="rating">';
                            $html .= get_the_post_thumbnail();;
                            $html .= '</div><!-- 5start-->';
                        $html .= '<h3 class="testimonial-tilte">'.get_the_title().' </h3>';
                        
                        $html .= '</div>';
                    // $html .= '<p><strong>-'.get_the_title().','.get_field("name").'</strong><br>'.get_field("test_location").'</p>';                 
                    $html .='</div>';
                    
                } 
        endwhile;
    $html .='</div>';
    // $html .= '</section>';
    return $html;
}
add_shortcode("testimonials-list","testimonials_list");






function podcast(){
    $html ='';
    $html .='<div id="podcast_home" class="podcast_home">';
         if( is_active_sidebar('podcast') ) { 
               dynamic_sidebar('podcast'); 
            }
    $html .='</div>';
    // $html .= '</section>';
    return $html;
}
add_shortcode("podcast_home","podcast");








add_image_size( 'single_blog_post', 999, 450, array( 'center', 'center' ));


// woo commerce function 

remove_action("woocommerce_single_product_summary","woocommerce_template_single_title",5);
add_action("woocommerce_single_product_summary", "woocommerce_my_single_title",5);

if ( ! function_exists( "woocommerce_my_single_title" ) ) {
function woocommerce_my_single_title() {
?>
<h1 itemprop="name" class="product_title entry-title single_page_title"><?php the_title(); ?></h1>
<?php
}
}

// quantity hide

function cw_remove_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'cw_remove_quantity_fields', 10, 2 );


/*
 * Woocommerce Remove excerpt from single product
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'the_content', 20 );


 
// Readd above product tabs
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_after_single_product_summary' , 'woocommerce_template_single_sharing', 50 );



add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;

    ob_start();

    ?>
    <a class="new" href="<?php echo wc_get_cart_url(); ?>">           
                        <img src="<?php echo get_template_directory_uri()?>/img/cart.jpg" alt="">
                        <span class="cart_quantity new"><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span>
            </a>

    <?php
    $fragments['a.new'] = ob_get_clean();
    return $fragments;
}


// display custom post types 'photos' in recent posts widget
// function wcs_cpt_recent_posts_widget( $params ) {
//     $params['post_type'] = array( 'our_services' ,'post','Recipes');
//     return $params;
// }
// add_filter( 'widget_posts_args', 'wcs_cpt_recent_posts_widget' );

function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');