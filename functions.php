<?php

function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css?ver=1.0' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' ,15);


//add style and script
function enqueue_scripts() {

  wp_enqueue_style( 'component', get_stylesheet_directory_uri().'/css/component.css' );
  wp_enqueue_style( 'font-awesome' );
  //wp_enqueue_style( 'bxslider', get_stylesheet_directory_uri().'/css/bxslider.css' );
  wp_enqueue_style( 'custom', get_stylesheet_directory_uri().'/css/custom.css?ver=1.0.2' ,array( 'parent-style' ));

  //wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri().'/css/bootstrap.min.css' ,array( 'parent-style' ));
  
  if(is_front_page() || is_page(27) ){
  	wp_enqueue_style( 'css-home', get_stylesheet_directory_uri().'/css/page/home.css' );
  }
  if( is_page('contact-us') || is_page(37)){
  	 wp_enqueue_style( 'css-contact', get_stylesheet_directory_uri().'/css/page/contact.css' );
  }
  if( is_page('about') || is_page(2)){
  	 wp_enqueue_style( 'css-about', get_stylesheet_directory_uri().'/css/page/about.css' );
  }
  if( is_page('web-services/design-development') || is_page(724)){
  	 wp_enqueue_style( 'css-design-development', get_stylesheet_directory_uri().'/css/page/design-development.css' );
  }
  if( is_page('web-services') || is_page(1495)){
  	 wp_enqueue_style( 'css-web-services', get_stylesheet_directory_uri().'/css/page/web-services.css' );
  }
  if( is_page('web-services/media-services') || is_page(43)){
  	 wp_enqueue_style( 'css-media-services', get_stylesheet_directory_uri().'/css/page/media-services.css' );
  }
  if( is_page('web-services/marketing-services') || is_page(897)){
  	 wp_enqueue_style( 'css-marketing-services', get_stylesheet_directory_uri().'/css/page/marketing-services.css' );
  }
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts',200 );

function enqueue_scripts1() {

  wp_enqueue_script( 'modernizr-js', get_stylesheet_directory_uri().'/js/modernizr.custom.js',array('jquery'),
    false,  true );
  wp_enqueue_script( 'classie-js', get_stylesheet_directory_uri().'/js/classie.js',array('jquery'),
    false,  true );
  wp_enqueue_script( 'sidebarEffects-js', get_stylesheet_directory_uri().'/js/sidebarEffects.js',array('jquery'),
    false,  true );
  //wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri().'/js/jssor.slider-22.0.15.min.js' ,array('jquery'), false,  true);
  //wp_enqueue_script( 'bxslider-js', get_stylesheet_directory_uri().'/js/bxslider.js',array('jquery'),  false,  true );
  wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri().'/js/custom.js?ver=1.1' ,array('jquery'),
    false,  true);
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts1' ,200);



// remove admin bar
add_filter('show_admin_bar', '__return_false');


function remove_ul ( $menu ){
    return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );


add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );


function custom_projects() {
  $labels = array(
    'name'               => _x( 'Project', 'Project' ),
    'singular_name'      => _x( 'Project', 'Project' ),
    'add_new'            => _x( 'Add New', 'Project' ),
    'add_new_item'       => __( 'Add New Project' ),
    'edit_item'          => __( 'Edit Project' ),
    'new_item'           => __( 'New Project' ),
    'all_items'          => __( 'All Projects' ),
    'view_item'          => __( 'View Project' ),
    'search_items'       => __( 'Search Project' ),
    'not_found'          => __( 'No Project found' ),
    'not_found_in_trash' => __( 'No Project found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Projects'
  );
 $args = array(
      'labels' => $labels,
      'hierarchical' => false,
      'description' => 'Custom Theme Project',
      'supports' => array( 'title', 'thumbnail', 'custom-fields' ),
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 5,
      'show_in_nav_menus' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'query_var' => true,
      'can_export' => true,
      'public' => true,
      'has_archive' => 'false',
      'capability_type' => 'post',
      'rewrite' => array( 'slug' => 'project', 'with_front' => false ),
  );
  register_post_type( 'project', $args );
}
add_action( 'init', 'custom_projects' );


function load_projects_shortcode( $atts ) {
  $post__not_in = "";
  $return_post = "";
  $args = array(
    'post_type'   => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'order' => 'ASC'
  );
  $the_query = new WP_Query( $args );
  if( $the_query->have_posts() ):
    while( $the_query->have_posts() ) : $the_query->the_post();
      $return_post .= '<div class="porject_post">';
      //$return_post .= the_post_thumbnail('large');
      $return_post .= '<img src="'.get_the_post_thumbnail_url(get_the_ID(),'large').'" class="img-responsive">';
      $return_post .= '</div>';
      $post__not_in .= get_the_ID().',';
    endwhile;
  endif;
  $post__not_in =  rtrim($post__not_in,",");
        
  $return_post .= do_shortcode('[ajax_load_more container_type="div" post__not_in="'.$post__not_in.'" pause="true" post_type="project" posts_per_page="2"  button_label="LOAD MORE PROJECTS" scroll="false"]');
  return $return_post;
}
add_shortcode( 'load_projects', 'load_projects_shortcode');
