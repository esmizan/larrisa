<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

add_action('after_setup_theme', 'rdtheme_setup');
if ( !function_exists( 'rdtheme_setup' ) ) {
	function rdtheme_setup() {
		// Language
		load_theme_textdomain( 'miako', RDTHEME_BASE_DIR . 'languages' );

		// Theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'woocommerce' );

		// Image sizes
		add_image_size( 'rdtheme-size1', 1200, 600, true ); // post/news large
		add_image_size( 'rdtheme-size2', 370, 270, true ); // in the blog page -layout 2
		add_image_size( 'rdtheme-size3', 100, 72, true ); // small image for side bar
		add_image_size( 'rdtheme-size4', 370, 475, true ); // Signle Team
		add_image_size( 'rdtheme-size5', 370, 370, true ); // Testimonial
		add_image_size( 'rdtheme-size6', 350, 450, true ); // Team Slider
		add_image_size( 'rdtheme-size7', 560, 410, true ); // Law Slider 3 / Grid
		add_image_size( 'rdtheme-size8', 600, 300, true ); // Law Slider 3 / Grid
		
		add_editor_style();

		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'miako' ),
		) );
	}	
}

// Initialize Widgets
add_action( 'widgets_init', 'rdtheme_widgets_register' );
if ( !function_exists( 'rdtheme_widgets_register' ) ) {
	function rdtheme_widgets_register() {
		
		$footer_widget_titles = array(
			'1' => __( 'Footer 1', 'miako' ),
			'2' => __( 'Footer 2', 'miako' ),
			'3' => __( 'Footer 3', 'miako' ),
			'4' => __( 'Footer 4', 'miako' ),
		);

		// Register Widget Areas ( Common )
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'miako' ),
			'id'            => 'sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			) );
			
		// Register Widget Areas ( for Single Case Study Post )
		register_sidebar( array(
			'name'          => __( 'Law Sidebar', 'miako' ),
			'id'            => 'sidebar-law',
			'before_widget' => '<div id="%1$s" class="widget %2$s custom-widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
			) );

		for ( $i = 1; $i <= RDTheme::$options['footer_column']; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles[$i],
				'id'            => 'footer-'. $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widgettitle">',
				'after_title'   => '</h3>',
				) );		
		}
	}
}


// Head Script
add_action( 'wp_head', 'rdtheme_head', 1 );
if( !function_exists( 'rdtheme_head' ) ) {
	function rdtheme_head(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}	
}

// Footer Html
add_action( 'wp_footer', 'rdtheme_footer_html', 1 );
if( !function_exists( 'rdtheme_footer_html' ) ) {
	function rdtheme_footer_html(){
		// Back-to-top link
		if ( RDTheme::$options['back_to_top'] ){
			echo '<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>';
		}
		// Preloader
		if ( RDTheme::$options['preloader'] ){
			if ( !empty( RDTheme::$options['preloader_image']['url'] ) ) {
				$preloader_img = RDTheme::$options['preloader_image']['url'];
			}
			else {
				$preloader_img = RDTHEME_IMG_URL . 'preloder.gif';
			}
			echo '<div id="preloader" style="background-image:url(' . esc_url( $preloader_img ) . ');"></div>';
		}
	}	
}

/*change the redux option*/
function add_another_field_value_sk($field){

    //$field['title'] = __( 'Theme Stylesheet Custom', 'redux-framework-demo' );
    //$field['options']['menu_typo'] = 'newcolor.css';
    $field['options']['subsets'] = true;

    return $field;
}
// In this example: opt_name = theme_data.
add_filter('redux/options/', 'add_another_field_value_sk');