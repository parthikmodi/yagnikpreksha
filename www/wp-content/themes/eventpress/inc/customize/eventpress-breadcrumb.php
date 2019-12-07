<?php
function eventpress_breadcrumb_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Breadcrumb Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'breadcrumb_setting', 
		array(
			'priority'      => 129,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Page Breadcrumb', 'eventpress'),
		) 
	);

	/*=========================================
	Background Section
	=========================================*/ 
	$wp_customize->add_section(
        'breadcrumb_design',
        array(
        	'priority'      => 1,
            'title' 		=> __('Settings','eventpress'),
            'description' 	=>'',
			'panel'  		=> 'breadcrumb_setting',
		)
    );
	
	$wp_customize->add_setting( 
		'hide_show_breadcrumb' , 
			array(
			'default' => '1',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Breadcrumb Hide/Show', 'eventpress' ),
			'section'     => 'breadcrumb_design',
			'settings'    => 'hide_show_breadcrumb',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	$wp_customize->add_section(
        'breadcrumb_background',
        array(
        	'priority'      => 2,
            'title' 		=> __('Background','eventpress'),
            'description' 	=>'',
			'panel'  		=> 'breadcrumb_setting',
		)
    );
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_background_setting' , 
    	array(
			'default' 			=> get_template_directory_uri() .'/images/breadcrumbbg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_background_setting' ,
		array(
			'label'          => __( 'Background Image', 'eventpress' ),
			'section'        => 'breadcrumb_background',
			'settings'   	 => 'breadcrumb_background_setting',
		) 
	));
}

add_action( 'customize_register', 'eventpress_breadcrumb_setting' );

// breadcrumb selective refresh
function eventpress_home_breadcrumb_section_partials( $wp_customize ){
	
	// hide show breadcrumb
	$wp_customize->selective_refresh->add_partial(
		'hide_show_breadcrumb', array(
			'selector' => '#breadcrumb-area',
			'container_inclusive' => true,
			'render_callback' => 'breadcrumb_design',
		)
	);
	}
add_action( 'customize_register', 'eventpress_home_breadcrumb_section_partials' );
?>