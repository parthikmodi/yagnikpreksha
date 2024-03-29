<?php
function eventpress_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 12,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header Section', 'eventpress'),
		) 
	);
	/*=========================================
	Header Contact Settings Section
	=========================================*/
	// Header Contact Setting Section // 
	$wp_customize->add_section(
        'header_booknow',
        array(
        	'priority'      => 1,
            'title' 		=> __('Button Setting','eventpress'),
			'panel'  		=> 'header_section',
		)
    );
	
	// hide/show  search & cart settings
	$wp_customize->add_setting( 
		'booknow_setting' , 
			array(
			'default' => esc_html__('1','eventpress'),
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
	'booknow_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'eventpress' ),
			'section'     => 'header_booknow',
			'settings'    => 'booknow_setting',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	// Header button icon Setting // 
	$wp_customize->add_setting(
    	'header_btn_icon',
    	array(
	        'default'			=> esc_html__('fa-bell','eventpress'),
			'sanitize_callback' => 'eventpress_sanitize_text',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control(new Eventpress_Customizer_Icon_Picker_Control($wp_customize,  
		'header_btn_icon',
		array(
		    'label'   => esc_html__('Button Icon','eventpress'),
		    'section' => 'header_booknow',
			'settings'=> 'header_btn_icon',
			'iconset' => 'fa',
		))  
	);
	// Header button label Setting // 
	$wp_customize->add_setting(
    	'header_btn_lbl',
    	array(
			'sanitize_callback' => 'eventpress_sanitize_text',
			'capability' => 'edit_theme_options',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'header_btn_lbl',
		array(
		    'label'   => esc_html__('Button label','eventpress'),
		    'section' => 'header_booknow',
			'settings'=> 'header_btn_lbl',
			'type' => 'text',
		)  
	);
	
	// Header button link Setting // 
	$wp_customize->add_setting(
    	'header_btn_link',
    	array(
			'sanitize_callback' => 'eventpress_sanitize_url',
			'capability' => 'edit_theme_options',
		)
	);	

	$wp_customize->add_control( 
		'header_btn_link',
		array(
		    'label'   => esc_html__('Button link','eventpress'),
		    'section' => 'header_booknow',
			'settings'=> 'header_btn_link',
			'type' => 'text',
		)  
	);
	/*=========================================
	Sticky Header Section
	=========================================*/
	$wp_customize->add_section(
        'sticky_header',
        array(
        	'priority'      => 10,
            'title' 		=> __('Sticky Header','eventpress'),
			'panel'  		=> 'header_section',
		)
    );
	
	
	$wp_customize->add_setting( 
		'sticky_header_setting' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	
	$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
	'sticky_header_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'eventpress' ),
			'section'     => 'sticky_header',
			'settings'    => 'sticky_header_setting',
			'type'        => 'ios', // light, ios, flat
		) 
	));
}
add_action( 'customize_register', 'eventpress_setting' );

// header selective refresh
function eventpress_header_section_partials( $wp_customize ){

// booknow_setting
	$wp_customize->selective_refresh->add_partial(
		'booknow_setting', array(
			'selector' => '.navbar-wrapper .nav-btn',
			'container_inclusive' => true,
			'render_callback' => 'header_booknow',
			'fallback_refresh' => true,
		)
	);
	
	// book now button
	$wp_customize->selective_refresh->add_partial( 'header_btn_lbl', array(
		'selector'            => '.navbar-wrapper .nav-btn a',
		'settings'            => 'header_btn_lbl',
		'render_callback'  => 'eventpress_booknow_render_callback',
	
	) );
	}

add_action( 'customize_register', 'eventpress_header_section_partials' );

// book now button 
function eventpress_booknow_render_callback() {
	return get_theme_mod( 'header_btn_lbl' );
}
?>