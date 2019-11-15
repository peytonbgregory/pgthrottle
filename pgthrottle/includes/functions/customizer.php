<?php 
// Global Theme Variables
$pgoptions=get_option( 'theme_settings' ); 
$pgphonenumber=get_theme_mod( 'pgthrottle_phone_textbox' ); 
$pgphoneurl=preg_replace('/\D+/', '', $pgphonenumber); 
$pgcustom_logo_id = get_theme_mod( 'custom_logo' );
$pglogo = wp_get_attachment_image_src( $pgcustom_logo_id , 'full' );
$pgbodyclass = get_theme_mod( 'pgthrottle_body_class_textbox' );
$pgnoticeclass = get_theme_mod( 'pgthrottle_notice_class_textbox' );
$pgsearchclass = get_theme_mod( 'pgthrottle_search_class_textbox' );
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
<img class="img-responsive img-fluid site-logo py-3" src="<?php echo esc_url( $pglogo[0] ) ?>">
<?php } else { ?>
<h1 class="site-title"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h1>
<?php } 
			echo '</a>';
}
add_filter('pgthrottile_sitetitle','pgthrottle_sitetitle_header');



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
	
	// Site Notice Class
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
    
    	// Site Search Class
	$wp_customize->add_setting( 'pgthrottle_search_class_textbox', array(
	  'capability' => 'edit_theme_options',
	  'default' => 'card bg-secondary border-primary text-light p-1',
	  'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'pgthrottle_search_class_textbox', array(
	  'type' => 'text',
	  'section' => 'title_tagline', // // Add a default or your own section
	  'label' => __( 'Seach Box Class' ),
	  'description' => __( 'Customize the search box class' ),
	) );
	
		// Site Resource Class
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
?>
