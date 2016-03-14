/**
 * Twenty Fourteen Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
        wp.customize( 'header_contact', function( value ) {
		value.bind( function( to ) {
			$( '.header-contact p' ).text( to );
		} );
	} );
        wp.customize( 'facebook_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.superb-fb a' ).attr('href', to );
		} );
	} );
       wp.customize( 'twitter_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.social-links .superb-twitter a' ).attr('href', to );
		} );
	} );
        wp.customize( 'googleplus_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.social-links .superb-gplus a' ).attr('href', to );
		} );
	} );
        wp.customize( 'pinterest_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.social-links .superb-pinterest a' ).attr('href', to );
		} );
	} );
        wp.customize( 'github_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.social-links .superb-github a' ).attr('href', to );
		} );
	} );
        wp.customize( 'youtube_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.social-links .superb-youtube a' ).attr('href', to );
		} );
	} );
         wp.customize( 'slider_one', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 img' ).attr('src', to );
		} );
	} );
         wp.customize( 'slider_title_one', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 .flex-caption h2' ).text( to );
		} );
	} );
         wp.customize( 'slider_one_description', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 .flex-caption p' ).text( to );
		} );
	} );
        wp.customize( 'slider_one_link_url', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 .flex-caption .slider-button' ).attr('href', to );
		} );
	} );
         wp.customize( 'slider_one_link_text', function( value ) {
		value.bind( function( to ) {
			$( '#slider1 .flex-caption .slider-button' ).text( to );
		} );
	} );
         wp.customize( 'slider_two', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 img' ).attr('src', to );
		} );
	} );
         wp.customize( 'slider_title_two', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 .flex-caption h2' ).text( to );
		} );
	} );
         wp.customize( 'slider_two_description', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 .flex-caption p' ).text( to );
		} );
	} );
        wp.customize( 'slider_two_link_url', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 .flex-caption .slider-button' ).attr('href', to );
		} );
	} );
         wp.customize( 'slider_two_link_text', function( value ) {
		value.bind( function( to ) {
			$( '#slider2 .flex-caption .slider-button' ).text( to );
		} );
	} );
         wp.customize( 'slider_three', function( value ) {
		value.bind( function( to ) {
			$( '#slider3 img' ).attr('src', to );
		} );
	} );
         wp.customize( 'slider_title_three', function( value ) {
		value.bind( function( to ) {
			$( '#slider3 .flex-caption h2' ).text( to );
		} );
	} );
         wp.customize( 'slider_three_description', function( value ) {
		value.bind( function( to ) {
			$( '#slider3 .flex-caption p' ).text( to );
		} );
	} );
        wp.customize( 'slider_three_link_url', function( value ) {
		value.bind( function( to ) {
			$( '#slider3 .flex-caption .slider-button' ).attr('href', to );
		} );
	} );
         wp.customize( 'slider_three_link_text', function( value ) {
		value.bind( function( to ) {
			$( '#slider3 .flex-caption .slider-button' ).text( to );
		} );
	} );
       
        wp.customize( 'home_featured_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one .featured-image img' ).attr('src', to );
		} );
	} );
        wp.customize( 'home_title_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one h3 a' ).text( to );
		} );
	} );
        
         wp.customize( 'home_description_one', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one p' ).text( to );
		} );
            } );
                
         wp.customize( 'home_one_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one .read-more' ).attr('href', to );
		} );
	} );
        
        wp.customize( 'home_one_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-one .read-more' ).text( to );
		} );
	} );
        wp.customize( 'home_featured_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two .featured-image img' ).attr('src', to );
		} );
	} );
        wp.customize( 'home_title_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two h3 a' ).text( to );
		} );
	} );
        
         wp.customize( 'home_description_two', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two p' ).text( to );
		} );
            } );
                
         wp.customize( 'home_two_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two .read-more' ).attr('href', to );
		} );
	} );
        
        wp.customize( 'home_two_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-two .read-more' ).text( to );
		} );
	} );
        wp.customize( 'home_featured_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three .featured-image img' ).attr('src', to );
		} );
	} );
        wp.customize( 'home_title_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three h3 a' ).text( to );
		} );
	} );
        
         wp.customize( 'home_description_three', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three p' ).text( to );
		} );
            } );
                
         wp.customize( 'home_three_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three .read-more' ).attr('href', to );
		} );
	} );
        
        wp.customize( 'home_three_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-featured-three .read-more' ).text( to );
		} );
	} );
        wp.customize( 'tagline_title', function( value ) {
		value.bind( function( to ) {
			$( '.business-tagline h3' ).text( to );
		} );
	} );
        wp.customize( 'tagline_description', function( value ) {
		value.bind( function( to ) {
			$( '.business-tagline p' ).text( to );
		} );
	} );
        
        wp.customize( 'contact_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-contact h3' ).text( to );
		} );
	} );
        
        wp.customize( 'address_detail', function( value ) {
		value.bind( function( to ) {
			$( '.home-contact #address' ).text( to );
		} );
	} );
        
        wp.customize( 'contact_email', function( value ) {
		value.bind( function( to ) {
			$( '.home-contact #email' ).text( to );
		} );
	} );
        
         wp.customize( 'contact_phone', function( value ) {
		value.bind( function( to ) {
			$( '.home-contact #phone' ).text( to );
		} );
	} );
        wp.customize( 'cta_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-cta p' ).text( to );
		} );
	} );
        
         wp.customize( 'home_cta_link_url', function( value ) {
		value.bind( function( to ) {
			$( '.home-cta .cta-button' ).attr('href', to );
		} );
            } );
                
         wp.customize( 'home_cta_link_text', function( value ) {
		value.bind( function( to ) {
			$( '.home-cta .cta-button' ).text( to );
		} );
	} );
         wp.customize( 'video_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-video-two h3' ).text( to );
		} );
	} );
        
        wp.customize( 'superb_home_intro_text_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-intro-text-section h3' ).text( to );
		} );
	} );
        
        wp.customize( 'superb_post_title', function( value ) {
		value.bind( function( to ) {
			$( '.home-post-title h3' ).text( to );
		} );
	} );
        
         wp.customize( 'superb_footer_footer_text', function( value ) {
		value.bind( function( to ) {
			$( '.smallprint p' ).text( to );
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
				$( '.site-title,  .site-description' ).css( {
					'clip': 'auto',
					'position': 'static'
				} );

				$( '.site-title a' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );