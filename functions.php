<?php
// Theme Title
add_theme_support('title-tag');
//theme thumbnail
add_theme_support('post-thumbnail');
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

// Theme CSS and jQuery File calling
function repot_css_js_file_calling(){
  wp_enqueue_style('repot-style', get_stylesheet_uri());
  wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css', array(), '5.0.2', 'all');
  wp_register_style('custom', get_template_directory_uri().'/css/custom.css', array(), '1.0.0', 'all');
  wp_enqueue_style('bootstrap');
  wp_enqueue_style('custom');
}
add_action('wp_enqueue_scripts', 'repot_css_js_file_calling');
/**
 * Add a sidebar.
 */
function repot_theme_slug_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Sidebar', 'repot' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'repot' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'repot_theme_slug_widgets_init' );

register_nav_menu( 'main_menu', __('Main Menu', 'repot') );

if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

	function mytheme_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'repot' ),
	    	'footer_menu'  => __( 'Footer Menu', 'repot' ),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
}