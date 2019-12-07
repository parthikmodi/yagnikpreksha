/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
	
	$(document).ready(function ($) {
        $('input[data-input-type]').on('input change', function () {
            var val = $(this).val();
            $(this).prev('.cs-range-value').html(val);
            $(this).val(val);
        });
    })
	
	// header_email
	wp.customize(
		'header_email', function( value ) {
			value.bind(
				function( newval ) {
					$( '#header-top #top-email span' ).text( newval );
				}
			);
		}
	);
	// header_phone_number
	wp.customize(
		'header_phone_number', function( value ) {
			value.bind(
				function( newval ) {
					$( '#header-top #top-phone span' ).text( newval );
				}
			);
		}
	);
	
	// wedding_section_title
	wp.customize(
		'wedding_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about-event .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// wedding_section_description
	wp.customize(
		'wedding_section_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about-event .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// wedding_section_groom_title
	wp.customize(
		'wedding_section_groom_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#wedding-person-one h4' ).text( newval );
				}
			);
		}
	);
	
	// wedding_section_groom_name
	wp.customize(
		'wedding_section_groom_name', function( value ) {
			value.bind(
				function( newval ) {
					$( '#wedding-person-one h3' ).text( newval );
				}
			);
		}
	);
	
	// wedding_section_groom_description
	wp.customize(
		'wedding_section_groom_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#wedding-person-one p' ).text( newval );
				}
			);
		}
	);
	
	// wedding_section_bride_title
	wp.customize(
		'wedding_section_bride_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#wedding-person-two h4' ).text( newval );
				}
			);
		}
	);
	
	// wedding_section_bride_name
	wp.customize(
		'wedding_section_bride_name', function( value ) {
			value.bind(
				function( newval ) {
					$( '#wedding-person-two h3' ).text( newval );
				}
			);
		}
	);
	
	// wedding_section_bride_description
	wp.customize(
		'wedding_section_bride_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#wedding-person-two p' ).text( newval );
				}
			);
		}
	);
	
	// about_section_title
	wp.customize(
		'about_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#ab-se-td h2' ).text( newval );
				}
			);
		}
	);
	
	// about_section_description
	wp.customize(
		'about_section_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#ab-se-td p' ).text( newval );
				}
			);
		}
	);
	
	// about_content_title
	wp.customize(
		'about_content_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about .about-events-text h2' ).text( newval );
				}
			);
		}
	);
	
	// about_content_description
	wp.customize(
		'about_content_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#about .about-events-text p' ).text( newval );
				}
			);
		}
	);
	
	// about_first_button_label
	wp.customize(
		'about_first_button_label', function( value ) {
			value.bind(
				function( newval ) {
					$( '#b-t-btn' ).text( newval );
				}
			);
		}
	);
	
	// about_second_button_label
	wp.customize(
		'about_second_button_label', function( value ) {
			value.bind(
				function( newval ) {
					$( '#b-t-rm' ).text( newval );
				}
			);
		}
	);
	
	// about_video_button_label
	wp.customize(
		'about_video_button_label', function( value ) {
			value.bind(
				function( newval ) {
					$( '#b-t-wm' ).text( newval );
				}
			);
		}
	);
	
	// funfact_section_title
	wp.customize(
		'funfact_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#counter .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// funfact_section_description
	wp.customize(
		'funfact_section_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#counter .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// donation_title
	wp.customize(
		'donation_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#donation .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// donation_description
	wp.customize(
		'donation_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#donation .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// blog_title
	wp.customize(
		'blog_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#latest-news .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// blog_description
	wp.customize(
		'blog_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#latest-news .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// product_title
	wp.customize(
		'product_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-product .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// product_description
	wp.customize(
		'product_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.home-product .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// gallery_title
	wp.customize(
		'gallery_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#gallery .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// gallery_description
	wp.customize(
		'gallery_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#gallery .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// events_title
	wp.customize(
		'events_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#ourteam .section-header h2' ).text( newval );
				}
			);
		}
	);
	
	// Events_description
	wp.customize(
		'Events_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#ourteam .section-header p' ).text( newval );
				}
			);
		}
	);
	
	// cont_form_title
	wp.customize(
		'cont_form_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-section .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// cont_form_description
	wp.customize(
		'cont_form_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.contact-section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// custom_section_title
	wp.customize(
		'custom_section_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#custom_section .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// custom_section_description
	wp.customize(
		'custom_section_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#custom_section .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// foot_regards_text
	wp.customize(
		'foot_regards_text', function( value ) {
			value.bind(
				function( newval ) {
					$( '.footer-section .footer-logo h2' ).text( newval );
				}
			);
		}
	);
	
	// copyright_content
	wp.customize(
		'copyright_content', function( value ) {
			value.bind(
				function( newval ) {
					$( '.footer-section .footer-copyright p ' ).text( newval );
				}
			);
		}
	);
	
	// team_page_title
	wp.customize(
		'team_page_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '#organisers .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// about_team_description
	wp.customize(
		'about_team_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '#organisers .section-title p' ).text( newval );
				}
			);
		}
	);
	
	// gift_page_title
	wp.customize(
		'gift_page_title', function( value ) {
			value.bind(
				function( newval ) {
					$( '.gift-page .section-title h2' ).text( newval );
				}
			);
		}
	);
	
	// gift_page_description
	wp.customize(
		'gift_page_description', function( value ) {
			value.bind(
				function( newval ) {
					$( '.gift-page .section-title p' ).text( newval );
				}
			);
		}
	);
	
} )( jQuery );