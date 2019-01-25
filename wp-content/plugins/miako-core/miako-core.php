<?php
/*
Plugin Name: Miako Core
Plugin URI: http://radiustheme.com
Description: Miako Core Plugin for Miako Theme
Version: 1.3.1
Author: RadiusTheme
Author URI: http://radiustheme.com
*/

define( 'MIAKO_CORE', ( WP_DEBUG ) ? time() : '1.2' );
define( 'MIAKO_CORE_BASE_URL', plugin_dir_url( __FILE__ ) );

// Text Domain
add_action( 'plugins_loaded', 'miako_core_load_textdomain' );
if ( !function_exists( 'miako_core_load_textdomain' ) ) {
	function miako_core_load_textdomain() {
		load_plugin_textdomain( 'miako-core' , false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}
}

// Post types
add_action( 'after_setup_theme', 'miako_core_post_types', 15 );
if ( !function_exists( 'miako_core_post_types' ) ) {
	function miako_core_post_types(){
		if ( !defined( 'MIAKO_VERSION' ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		require_once 'post-types.php';
		require_once 'post-meta.php';
	}
}

// Visual composer
add_action( 'after_setup_theme', 'miako_core_vc_modules', 20 );
if ( !function_exists( 'miako_core_vc_modules' ) ) {
	function miako_core_vc_modules(){
		if ( !defined( 'MIAKO_VERSION' ) || ! defined( 'WPB_VC_VERSION' ) || ! defined( 'RT_FRAMEWORK_VERSION' ) ) {
			return;
		}
		
		require_once 'vc-flaticon/vc-flaticon.php';
		
		$modules = array( 'inc/abstruct', 'miako-cta', 'title', 'law-slider', 'law-grid', 'testimonial' , 'team', 'team-grid', 'about' , 'open-hour' ,  'post' , 'info-text' , 'award-box', 'contact-info', 'counter', 'progress-bar',  'text-with-button' , 'text-with-video', 'pricing-box' );
		
		foreach ( $modules as $module ) {
			require_once 'vc-modules/' . $module. '.php';
		}
	}
}

// Demo Importer settings
require_once 'demo-importer.php';