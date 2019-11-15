<?php
if (!isset($content_width)) $content_width = 770;

define("THEME_DIR", get_template_directory_uri());
define("FUNCT_DIR", get_template_directory() . '/includes/functions/');

// Load CSS and JS files
add_action( 'wp_enqueue_scripts', 'pgthrottle_scripts', 1 );
function pgthrottle_scripts() {
    wp_register_style('pgthrottle-css' , THEME_DIR . '/css/pgthrottle.min.css','','', 'all');
    wp_register_style('theme-css' , THEME_DIR . '/style.css','','', 'all');
    wp_register_style('google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700,800&display=swap','','', 'all');	 
    
	wp_register_script( 'pgthrottle-js', THEME_DIR . '/js/pgthrottle.min.js', '', '', true );

	wp_enqueue_style( array('google-font', 'pgthrottle-css', 'theme-css') );
	wp_enqueue_script( array('jquery','pgthrottle-js') ); 
}

if ( ! function_exists( 'pgthrottle_setup' ) ) :

	function pgthrottle_setup() {
		register_nav_menus(
			array(
				'primary-menu'    => __('Primary Menu', 'pgthrottle'),
				'secondary-menu'    => __('Secondary Menu', 'pgthrottle'),
				'sidebar-menu'    => __('Sidebar Menu', 'pgthrottle'),
                'footer-menu'    => __('Footer Menu', 'pgthrottle'),
                'mobile-menu'    => __('Mobile Menu', 'pgthrottle'),
			)
		);
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails', array('post','page') );
        add_theme_support( 'post-thumbnails' ); 
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		
		add_filter('widget_text', 'do_shortcode');
		// Logo Customizer
		$defaults = array(
			'height'      => 70,
			'width'       => 190,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults ); 
        add_image_size( 'wide-banner', 1200, 300, true );
        add_image_size( 'large-square', 250, 250, true );
        add_image_size( 'large-wide', 500, 350, true );
			}

endif;

add_action( 'after_setup_theme', 'pgthrottle_setup' );

// Core Theme Functions - Required
if ( ! file_exists( FUNCT_DIR . 'core.php' ) ) {
	return new WP_Error( 'Theme Core Functions are missing. Update theme to resolve the problem.', __( 'It appears the core.php file may be missing.', 'pgthrottle' ) );
} else {
	require_once FUNCT_DIR . 'core.php';
}

// Main Navigation Dropdown Walker Nav - Required for Dropdown Menus
if ( ! file_exists( FUNCT_DIR . 'class-wp-bootstrap-navwalker.php' ) ) {
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'pgthrottle' ) );
} else {
	require_once FUNCT_DIR . 'class-wp-bootstrap-navwalker.php';
}

// Enable WooCommerce Theme Support IF WooCommerce Plugin is active
if ( class_exists('woocommerce') ) {
    require_once FUNCT_DIR . 'woocommerce.php';
}

// Theme Brand Settings | WP Dashboard > Appearance > Theme Settings
if ( ! file_exists( FUNCT_DIR . 'settings.php' ) ) {
	return new WP_Error( 'class-wp-pgthrottle-settings-missing', __( 'It appears the settings.php file may be missing.', 'pgthrottle' ) );
} else {
	require_once FUNCT_DIR . 'settings.php';
}

// Appearance & Design Functions
include_once FUNCT_DIR . 'appearance.php';

// Work - Custom Post Type | WP Dashboard > Work
include_once FUNCT_DIR . 'post-type-work.php';

// WordPress Widgets | WP Dashboard > Appearance > Widgets
include_once FUNCT_DIR . 'widgets.php';

// WordPress Theme Custommizer | WP Dashboard > Appearance > Customizer
include_once FUNCT_DIR . 'customizer.php';

// Gravity Forms Custom Functions | WP Dashboard > Gravity Forms
include_once FUNCT_DIR . 'customizer.php';

// Optimization
include_once FUNCT_DIR . 'optimization.php';

?>
