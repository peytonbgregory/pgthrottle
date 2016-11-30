<?php 
/*Theme includes */


require 'includes/categoryposts.php';
include 'includes/settings.php';
include 'includes/seo.php';
/* require 'includes/theme-update-checker.php';*/
/*Theme Updater. Sometimes it even works!*/
/* $MyThemeUpdateChecker = new ThemeUpdateChecker('pgthrottle', 'http://peytongregory.com/api/?action=get_metadata&pgthrottle.zip');*/

/* Register our sidebars and widgetized areas. */
function pgthrottle_widgets_init() {

	
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => 'Slideshow',
		'id'            => 'slideshow',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
	register_sidebar( array(
		'name'          => 'Home Left',
		'id'            => 'home-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
 
	register_sidebar( array(
		'name'          => 'Home Middle',
		'id'            => 'home-middle',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => 'Home Right',
		'id'            => 'home-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer Left',
		'id'            => 'footer-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Middle',
		'id'            => 'footer-middle',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => 'Footer Right',
		'id'            => 'footer-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'pgthrottle_widgets_init' );

/* Menus */
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
	  'sidebar-menu' => __( 'Sidebar Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Adds class to body tag depending on the browser
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie shiternet-exploder';
	else $classes[] = 'wtf';
	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

// Added Support for Post Thumbnails
add_theme_support( 'post-thumbnails' ); 

// I have no idea what this is for but it looks cool.
add_theme_support( 'html5', array( 'search-form' ) );

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');



// Register Custom Navigation Walker
 require_once('includes/wp_bootstrap_navwalker.php');
