<?php
function eventpress_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 131,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer Section', 'eventpress'),
		) 
	);
	// Footer top  Section // 
	$wp_customize->add_section(
        'footer_top',
        array(
            'title' 		=> __('Footer Top','eventpress'),
            'description' 	=>'',
			'panel'  		=> 'footer_section',
			'priority' => 1,
		)
    );
	// footer top Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_foo_top' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_foo_top', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Top', 'eventpress' ),
			'section'     => 'footer_top',
			'settings'    => 'hide_show_foo_top',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	// footer  logo // 
    $wp_customize->add_setting( 
    	'footer_logo_setting' , 
    	array(
			'default' 			=> get_template_directory_uri() . '/images/footerlogo.png',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_url',	
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_logo_setting' ,
		array(
			'label'          => __( 'Footer Logo', 'eventpress' ),
			'section'        => 'footer_top',
			'settings'   	 => 'footer_logo_setting',
		) 
	));
	
	// regard Setting // 
	$wp_customize->add_setting(
    	'foot_regards_text',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'foot_regards_text',
		array(
		    'label'   		=> __('Regards Text','eventpress'),
		    'section'		=> 'footer_top',
			'settings'   	 => 'foot_regards_text',
			'type' 			=> 'textarea',
		)  
	);
	//seprator
	if ( class_exists( 'Evento_Customizer_Select_Control' ) ) {
		$wp_customize->add_setting( 
			'footer_ti_sepr' , 
				array(
				'default' => get_template_directory_uri() . '/images/section-hi.png',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'eventpress_sanitize_url',
			) 
		);

		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize, 
		'footer_ti_sepr' , 
			array(
				'label'          => __( 'Separator', 'eventpress' ),
				'section'        => 'footer_top',
				'settings'   	 => 'footer_ti_sepr',
				'choices'        => 
				array(
					''		=>__('Pattern 1', 'eventpress'),
					get_template_directory_uri() . '/images/section-hi.png'		=>__('Pattern 2', 'eventpress'),
				) 
			)) 
		);
	}
	
	// Footer info Section // 
	$wp_customize->add_section(
        'footer_info_settings',
        array(
            'title' 		=> __('Footer Address Info','eventpress'),
			'panel'  		=> 'footer_section',
			'priority' => 2,
		)
    );
	
	// footer info Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'footer_info_setting' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
	'footer_info_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Address', 'eventpress' ),
			'section'     => 'footer_info_settings',
			'settings'    => 'footer_info_setting',
			'type'        => 'ios', // light, ios, flat
			'priority' => 1,
		) 
	));
	
	// footer info contents
	/**
	 * Customizer Repeater for add service
	 */
	
		$wp_customize->add_setting( 'footer_info_contents', 
			array(
			 'sanitize_callback' => 'Eventpress_Repeater_sanitize',
			 'transport'         => $selective_refresh
			)
		);
		
		$wp_customize->add_control( 
			new Eventpress_Repeater( $wp_customize, 
				'footer_info_contents', 
					array(
						'label'   => esc_html__('Footer Address','eventpress'),
						'section' => 'footer_info_settings',
						'add_field_label'                   => esc_html__( 'Add New Address', 'eventpress' ),
						'item_name'                         => esc_html__( 'Address', 'eventpress' ),
						'priority' => 2,
						'customizer_repeater_icon_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
					) 
				) 
			);
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copyright',
        array(
            'title' 		=> __('Copyright Content','eventpress'),
			'panel'  		=> 'footer_section',
			'priority' => 10,
		)
    );
	// Copyright Content Hide/Show Setting // 
	// Team Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hide_show_copyright' , 
			array(
			'default' => '1',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	
	$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_copyright', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'eventpress' ),
			'section'     => 'footer_copyright',
			'settings'    => 'hide_show_copyright',
			'type'        => 'ios', // light, ios, flat
		) 
	));

	// Copyright Content Setting // 
	$wp_customize->add_setting(
    	'copyright_content',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	

	$wp_customize->add_control( 
		'copyright_content',
		array(
		    'label'   		=> __('Copyright Content','eventpress'),
		    'section'		=> 'footer_copyright',
			'settings'   	 => 'copyright_content',
			'type' 			=> 'textarea',
		)  
	);

	// Background Image // 
    $wp_customize->add_setting( 
    	'footer_background_setting' , 
    	array(
			'default' 			=> get_template_directory_uri() . '/images/footerbg.jpg',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_url',
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'footer_background_setting' ,
		array(
			'label'          => __( 'Set Background Image', 'eventpress' ),
			'section'        => 'footer_copyright',
			'description'    => __( 'Upload Image for Background', 'eventpress' ),
		) 
	));	
}
add_action( 'customize_register', 'eventpress_footer' );

// footer selective refresh
function eventpress_home_footer_section_partials( $wp_customize ){

	// hide_show_foo_top
	$wp_customize->selective_refresh->add_partial(
		'hide_show_foo_top', array(
			'selector' => '.footer-section #foot-top',
			'container_inclusive' => true,
			'render_callback' => 'footer_top',
			'fallback_refresh' => true,
		)
	);
	
	// hide_show_copyright
	$wp_customize->selective_refresh->add_partial(
		'hide_show_copyright', array(
			'selector' => '.footer-section .footer-copyright',
			'container_inclusive' => true,
			'render_callback' => 'footer_copyright',
			'fallback_refresh' => true,
		)
	);
	
	// hide_show_footer_social
	$wp_customize->selective_refresh->add_partial(
		'footer_info_setting', array(
			'selector' => '#foo-co-in',
			'container_inclusive' => true,
			'render_callback' => 'footer_info_settings',
			'fallback_refresh' => true,
		)
	);
	// copyright_content
	$wp_customize->selective_refresh->add_partial( 'copyright_content', array(
		'selector'            => '.footer-section .footer-copyright p',
		'settings'            => 'copyright_content',
		'render_callback'  => 'eventpress_copyright_render_callback',
	
	) );
	
	// foot_regards_text
	$wp_customize->selective_refresh->add_partial( 'foot_regards_text', array(
		'selector'            => '.footer-section .footer-logo h2',
		'settings'            => 'foot_regards_text',
		'render_callback'  => 'eventpress_foot_regards_text_render_callback',
	
	) );
	// footer_info_contents
	$wp_customize->selective_refresh->add_partial( 'footer_info_contents', array(
		'selector'            => '#foo-co-in',
	
	) );
	}

add_action( 'customize_register', 'eventpress_home_footer_section_partials' );

// social icons
function eventpress_copyright_render_callback() {
	return get_theme_mod( 'copyright_content' );
}
// foot_regards_text
function eventpress_foot_regards_text_render_callback() {
	return get_theme_mod( 'foot_regards_text' );
}
?>
