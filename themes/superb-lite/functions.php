<?php
/**
 * Superb functions and definitions
 *
 * @package Superb
 * @since Superb 1.0
 */

require( get_template_directory() . '/inc/customizer.php' ); // new customizer options

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );




/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Superb 1.0
 *
 * @return void
 */
if ( ! function_exists( 'superb_setup' ) ) {
	function superb_setup() {
		global $content_width;
                
                
                /**
                 * Set the content width based on the theme's design and stylesheet.
                 *
                 * @since Superb 1.0
                 */
                if ( ! isset( $content_width ) )
                        $content_width = 647; /* Default the embedded content width to 790px */

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on Superb, use a find and replace
		 * to change 'superb' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'superb', trailingslashit( get_template_directory_uri() ) . 'languages' );

		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );

		// Create an extra image size for the Post featured image
		add_image_size( 'post_feature_full_width', 657, 400, true );
                
                
		// Create an extra image size for the Post thumbnail image
		add_image_size( 'post_feature_thumb', 350, 200, true );
                
              
		// This theme uses wp_nav_menu() in one location
		register_nav_menus( array(
				'primary' => esc_html__( 'Primary Menu', 'superb' )
			) );

		// This theme supports a variety of post formats
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );

		// Enable support for Custom Backgrounds
		add_theme_support( 'custom-background', array(
				// Background color default
				'default-color' => 'eee',
				// Background image default
				'default-image' => ''
                                
			) );
               
	}
}
add_action( 'after_setup_theme', 'superb_setup' );


/**
 * Enqueue scripts and styles
 *
 * @since Superb 1.0
 *
 * @return void
 */
function superb_scripts_styles() {

	// Register and enqueue our icon font
	// We're using the awesome Font Awesome icon font. http://fortawesome.github.io/Font-Awesome
	wp_enqueue_style( 'fontawesome', trailingslashit( get_template_directory_uri() ) . 'assets/css/font-awesome.min.css' , array(), '4.0.3', 'all' );
        
         if ( class_exists('woocommerce') ) {
            wp_enqueue_style( 'superb-woocommerce', trailingslashit( get_template_directory_uri() ) . 'assets/css/superb-woocommerce.css' , array(), '1.0', 'all' );
         }
         
        wp_enqueue_style( 'flexslider', trailingslashit( get_template_directory_uri() ) . 'assets/css/flexslider.css' , array(), '1.0', 'all' );
        
        
	
	$fonts_url = 'http://fonts.googleapis.com/css?family=Raleway:400,300,700';
	if ( !empty( $fonts_url ) ) {
		wp_enqueue_style( 'superb-fonts', esc_url_raw( $fonts_url ), array(), null );
	}

	// Enqueue the default WordPress stylesheet
	wp_enqueue_style( 'superb-style', get_stylesheet_uri(), array(), '1.0', 'all' );

        wp_enqueue_script('jquery'); 
        
        wp_enqueue_script('superb-slider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array('jquery'));
	/**
	 * Register and enqueue our scripts
	 */

	// Load Modernizr at the top of the document, which enables HTML5 elements and feature detects
	wp_enqueue_script( 'modernizr', trailingslashit( get_template_directory_uri() ) . 'assets/js/modernizr-2.7.1-min.js', array(), '2.7.1', false );
	
	// Adds JavaScript to pages with the comment form to support sites with threaded comments (when in use)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'superb-slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js' );
	wp_enqueue_script('superb-custom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array(), '1.0', 'all', false);
         
}
add_action( 'wp_enqueue_scripts', 'superb_scripts_styles' );


/**
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @since Superb 1.2.5
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string The filtered CSS paths list.
 */
function superb_mce_css( $mce_css ) {
	$fonts_url = 'http://fonts.googleapis.com/css?family=Raleway:400,300,700';

	if ( empty( $fonts_url ) ) {
		return $mce_css;
	}

	if ( !empty( $mce_css ) ) {
		$mce_css .= ',';
	}

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $fonts_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'superb_mce_css' );

// Add specific CSS class by filter
add_filter('body_class','superb_class_names');
function superb_class_names($classes) {
    
        if ( is_front_page()) {
            $classes[] = 'superb-front-page';
        }
        
	// return the $classes array
	return $classes;
}


/**
 * Register widgetized areas
 *
 * @since Superb 1.0
 *
 * @return void
 */
function superb_widgets_init() {
	register_sidebar( array(
			'name' => esc_html__( 'Main Sidebar', 'superb' ),
			'id' => 'sidebar-main',
			'description' => esc_html__( 'Appears in the sidebar on posts and pages except the optional Front Page template, which has its own widgets', 'superb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => esc_html__( 'Footer #1', 'superb' ),
			'id' => 'sidebar-footer1',
			'description' => esc_html__( 'Appears in the footer sidebar', 'superb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => esc_html__( 'Footer #2', 'superb' ),
			'id' => 'sidebar-footer2',
			'description' => esc_html__( 'Appears in the footer sidebar', 'superb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => esc_html__( 'Footer #3', 'superb' ),
			'id' => 'sidebar-footer3',
			'description' => esc_html__( 'Appears in the footer sidebar', 'superb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => esc_html__( 'Footer #4', 'superb' ),
			'id' => 'sidebar-footer4',
			'description' => esc_html__( 'Appears in the footer sidebar', 'superb' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		) );
}
add_action( 'widgets_init', 'superb_widgets_init' );


/* Add theme extras */
require( get_template_directory() . '/inc/theme-extras.php' );