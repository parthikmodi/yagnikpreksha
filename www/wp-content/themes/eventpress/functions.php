<?php
if ( ! function_exists( 'eventpress_setup' ) ) :
function eventpress_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'eventpress');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_menu' => esc_html__( 'Primary Menu', 'eventpress' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	add_theme_support('custom-logo');
	
	add_editor_style( array( 'css/editor-style.css', eventpress_google_font() ) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'eventpress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'eventpress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eventpress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eventpress_content_width', 1170 );
}
add_action( 'after_setup_theme', 'eventpress_content_width', 0 );

/**
 * All Styles & Scripts.
 */
require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Called Breadcrumb
 */
require_once get_template_directory() . '/inc/breadcrumb/breadcrumb.php';

/**
 * Sidebar.
 */
require_once get_template_directory() . '/inc/sidebar/sidebar.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer-repeater/class/customizer-repeater-control.php';

/**
 * Customizer additions.
 */
 require get_template_directory() . '/inc/customizer-repeater/inc/customizer.php';
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/inc/jetpack.php';

/**
 * Load Sanitization file.
 */
require_once get_template_directory() . '/inc/sanitization.php';

/**
 * Load Upsale Section in Customizer
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/upsale/class-customize.php' );

/**
 * Called all the Customize file.
 */
require( get_template_directory() . '/inc/customize/customizer_recommended_plugin.php');
require( get_template_directory() . '/inc/customize/customizer_import_data.php'); 
require( get_template_directory() . '/inc/customize/eventpress-header-section.php');
require( get_template_directory() . '/inc/customize/eventpress-blog.php');
require( get_template_directory() . '/inc/customize/eventpress-breadcrumb.php');
require( get_template_directory() . '/inc/customize/eventpress-footer-section.php');
require( get_template_directory() . '/inc/customize/eventpress-premium.php');

/**
 * Load Custom Toggle Control in Customizer
 */
require_once get_template_directory() . '/inc/custom-controls/toggle/class-customizer-toggle-control.php';

if ( class_exists( 'WP_Customize_Control' ) ) {	
require_once get_template_directory() . '/inc/custom-controls/font-control.php';
}
