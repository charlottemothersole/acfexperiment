<?php
/*add styles*/
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() { 
    wp_enqueue_style( 'charlotte', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/flexslider.css' );
}

/*add javascript*/
add_action('wp_enqueue_scripts', 'cm_scripts');

function cm_scripts() {
  wp_enqueue_script('jquery');
  wp_enqueue_script('flexsliderjs',get_template_directory_uri(). '/jquery.flexslider.js');
  wp_enqueue_script('script',get_template_directory_uri(). '/script.js');

}

//setting featured image function for posts
if(function_exists('add_theme_support')) {
add_theme_support('post-thumbnails');
set_post_thumbnail_size('category-thumbnail');

add_image_size('category-hero',600,300,true);
add_image_size('category-thumbnail',200,200,array('left','top'));
}

/*to filter number of words in excerpt*/
function cm_wpdocs_custom_excerpt_length($length) {
  return 40;
}
add_filter('excerpt_length','cm_wpdocs_custom_excerpt_length');

/*to filter 'read more' suffix on excerpt*/
function cm_wpdocs_excerpt_more( $more ) {
  return '...';
}
add_filter( 'excerpt_more', 'cm_wpdocs_excerpt_more' );

/*to add menus*/
function cm_register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Nav Menu' ),
        'extra-menu' => __( 'Extra Menu' ),
       )
     );
   }
   add_action( 'init', 'cm_register_my_menus' );

/*to add WP options page*/
function cm_register_options_page() {
acf_add_options_page( array(
  'page_title' => 'Option Page',

) );
}

add_action('init', 'cm_register_options_page');
   