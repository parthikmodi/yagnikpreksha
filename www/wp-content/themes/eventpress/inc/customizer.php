<?php
/**
 * eventpress Theme Customizer.
 *
 * @package eventpress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function eventpress_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
}
add_action( 'customize_register', 'eventpress_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function eventpress_customize_preview_js() {
	wp_enqueue_script( 'eventpress_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'eventpress_customize_preview_js' );



/**
 * Register panels for Customizer.
 */
function eventpress_customizer_register( $wp_customize ) {
	$wp_customize->add_panel(
		'eventpress_frontpage_sections', array(
			'priority' => 128,
			'title' => esc_html__( 'Homepage Sections', 'eventpress' ),
		)
	);
}
add_action( 'customize_register', 'eventpress_customizer_register' );
?>