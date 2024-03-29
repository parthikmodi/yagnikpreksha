<?php
function eventpress_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	/*=========================================
	Blog Section Panel
	=========================================*/
		$wp_customize->add_section(
			'blog_setting', array(
				'title' => esc_html__( 'Blog Section', 'eventpress' ),
				'panel' => 'eventpress_frontpage_sections',
				'priority' => apply_filters( 'eventpress_section_priority', 50, 'eventpress_blog' ),
			)
		);
	/*=========================================
	Blog Settings Section
	=========================================*/
	// Blog Settings Section // 
	$wp_customize->add_setting( 
		'hide_show_blog' , 
			array(
			'default' =>  esc_html__( '1', 'eventpress' ),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => $selective_refresh,
		) 
	);
	$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_blog', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'eventpress' ),
			'section'     => 'blog_setting',
			'settings'    => 'hide_show_blog',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	
	// Blog Header Section // 
	
	
	// Blog Title // 
	$wp_customize->add_setting(
    	'blog_title',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_html',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_title',
		array(
		    'label'   => __('Title','eventpress'),
		    'section' => 'blog_setting',
			'settings'   	 => 'blog_title',
			'type'           => 'text',
		)  
	);
	
	//seprator
	if ( class_exists( 'Evento_Customizer_Select_Control' ) ) {
		$wp_customize->add_setting( 
			'blog_section_ti_sepr' , 
				array(
				'default' => get_template_directory_uri() . '/images/section-hi.png',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'eventpress_sanitize_url',
			) 
		);

		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize, 
		'blog_section_ti_sepr' , 
			array(
				'label'          => __( 'Section Separator', 'eventpress' ),
				'section'        => 'blog_setting',
				'settings'   	 => 'blog_section_ti_sepr',
				'choices'        => 
				array(
					''		=>__('Pattern 1', 'eventpress'),
					get_template_directory_uri() . '/images/section-hi.png'		=>__('Pattern 2', 'eventpress'),
				) 
			)) 
		);
	}
	// Blog Description // 
	$wp_customize->add_setting(
    	'blog_description',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'transport'         => $selective_refresh,
		)
	);	
	
	$wp_customize->add_control( 
		'blog_description',
		array(
		    'label'   => __('Description','eventpress'),
		    'section' => 'blog_setting',
			'settings'   	 => 'blog_description',
			'type'           => 'textarea',
		)  
	);
	
	// Blog Display Setting // 
	if ( class_exists( 'Evento_Customizer_Range_Control' ) ) {
		$wp_customize->add_setting(
			'blog_display_num',
			array(
				'default'			=> __('3','eventpress'),
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		
		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'blog_display_num', 
			array(
				'section'  => 'blog_setting',
				'settings' => 'blog_display_num',
				'label'    => __( 'No of Posts Display','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 500,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
	}
	
}
add_action( 'customize_register', 'eventpress_blog_setting' );
?>
<?php
// Blog selective refresh
function eventpress_home_blog_section_partials( $wp_customize ){

	// hide show feature
	$wp_customize->selective_refresh->add_partial(
		'hide_show_blog', array(
			'selector' => '#latest-news',
			'container_inclusive' => true,
			'render_callback' => 'blog_setting',
			'fallback_refresh' => true,
		)
	);
	// title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '#latest-news .section-title h2',
		'settings'            => 'blog_title',
		'render_callback'  => 'eventpress_blog_title_render_callback',
	
	) );
	// description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '#latest-news .section-title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'eventpress_blog_desc_render_callback',
	
	) );
	}
add_action( 'customize_register', 'eventpress_home_blog_section_partials' );

// title
function eventpress_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}
// description
function eventpress_blog_desc_render_callback() {
	return get_theme_mod( 'blog_description' );
}
