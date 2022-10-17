<?php
// Theme Title
add_theme_support('title-tag');
//theme thumbnail
add_theme_support('post-thumbnail');
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

// Theme CSS and jQuery File calling
function rone_css_js_file_calling(){
  wp_enqueue_style('rone-style', get_stylesheet_uri());
  wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.0.2', 'all');
  wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('custom');
}
add_action('wp_enqueue_scripts', 'rone_css_js_file_calling');
/**
 * Add a sidebar.
 */
function rone_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'rone' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'rone' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rone_theme_slug_widgets_init' );

register_nav_menu( 'main_menu', __('Main Menu', 'rone') );

// Walker Menu Properties
function rone_nav_description( $item_output, $item, $args){
  if( !empty ($item->description)){
    $item_output = str_replace($args->link_after . '</a>', '<span class="walker_nav">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output);
  }
  return $item_output;
}
add_filter('walker_nav_menu_start_el', 'rone_nav_description', 10, 3);