<?phpif (!isset($content_width)) $content_width = 770;//pgthrottle theme setupadd_action( 'after_setup_theme', 'pgthrottle_setup' );if ( ! function_exists( 'pgthrottle_setup' ) ) :	function pgthrottle_setup() {		register_nav_menus(			array(				'primary-menu'    => 'Primary Menu', 'pgthrottle',				'secondary-menu'    => 'Secondary Menu', 'pgthrottle'			)		);		add_theme_support( 'automatic-feed-links' );		add_theme_support( 'title-tag' );		add_theme_support( 'post-thumbnails' ); 		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );		add_filter('widget_text', 'do_shortcode');		}endif;if ( ! file_exists( get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php' ) ) {	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );} else {	require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';}// Adds class to body tag depending on the browseradd_filter('body_class','pgthrottle_browser_body_class');function pgthrottle_browser_body_class($classes) {	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;	if($is_lynx) $classes[] = 'lynx';	elseif($is_gecko) $classes[] = 'gecko';	elseif($is_opera) $classes[] = 'opera';	elseif($is_NS4) $classes[] = 'ns4';	elseif($is_safari) $classes[] = 'safari';	elseif($is_chrome) $classes[] = 'chrome';	elseif($is_IE) $classes[] = 'ie iexploder gtfo';	else $classes[] = 'wtf';	if($is_iphone) $classes[] = 'iphone';	return $classes;}// Widgetsadd_action( 'widgets_init', 'pgthrottle_widgets_init' );function pgthrottle_widgets_init() {	register_sidebar( array(		'name'          => 'Sidebar', 		'id'            => 'sidebar-1',		'description'   => 'Add sidebar widgets here.',		'before_widget' => '<div id="%1$s" class="widget %2$s">',		'after_widget'  => '</div>',		'before_title'  => '<h4 class="widget-title">',		'after_title'   => '</h4>',	) );	register_sidebar(array(		'name'	=> 'Slideshow',		'id'    => 'slideshow-1',		'description' => 'Add home page slideshow widgets here.',		'before_widget' => '<div id="%1$s" class="widget %2$s">',		'after_widget'  => '</div>',		'before_title'  => '',		'after_title'   => '',	) );	register_sidebar(array(		'name'	=> 'Store',		'id'    => 'store-1', 		'description' => 'Add widgets to a left sidebar on WooCommerce Pages.',		'before_widget' => '<div id="%1$s" class="widget mb-3 pb-3 border-bottom %2$s">',		'after_widget'  => '</div>',		'before_title'  => '<h4 class="widget-title text-secondary">',		'after_title'   => '</h4>',	) );	register_sidebar(array(		'name'	=> 'Footer Top',		'id'    => 'footer-1',		'description' => 'Add widgets to the footer of every page.',		'before_widget' => '<div id="%1$s" class="widget %2$s">',		'after_widget'  => '</div>',		'before_title'  => '',		'after_title'   => '',	) );    register_sidebar( array(		'name'          => 'Footer Left', 		'id'            => 'footer-left',		'description'   => 'Add widgets to the left side of the purple footer on every page.',		'before_widget' => '<div id="%1$s" class="widget %2$s">',		'after_widget'  => '</div>',		'before_title'  => '<h3 class="widget-title text-white">',		'after_title'   => '</h3>',	) );	register_sidebar( array(		'name'          => 'Footer Right', 		'id'            => 'footer-right',		'description'   => 'Add widgets to the  right side of the purple footer on every page.',		'before_widget' => '<div id="%1$s" class="widget %2$s">',		'after_widget'  => '</div>',		'before_title'  => '<h3 class="widget-title text-white">',		'after_title'   => '</h3>',	) );}// Adds btn class to page number linksadd_filter('next_posts_link_attributes', 'posts_link_attributes');add_filter('previous_posts_link_attributes', 'posts_link_attributes');function posts_link_attributes() {    return 'class="btn btn-sm btn-secondary"';}add_filter( 'get_the_archive_title', function ($title) {    if ( is_category() ) {            $title = single_cat_title( '', false );        } elseif ( is_tag() ) {            $title = single_tag_title( '', false );        } elseif ( is_author() ) {            $title = '<span class="vcard">' . get_the_author() . '</span>' ;        }    return $title;});// Load CSS and JS filesadd_action( 'wp_enqueue_scripts', 'pgthrottle_scripts' );function pgthrottle_scripts() {	wp_register_style('google-font', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700','','','all');	wp_register_style('fullpage-style' , get_template_directory_uri() . '/stylesheets/fullpage.min.css','','', 'all');	wp_register_style('bootstrap-css' , get_template_directory_uri() . '/stylesheets/screen.css','','', 'all');	wp_register_style('pgthrottle-style' , get_template_directory_uri() . '/style.css','','', 'all');		wp_register_script( 'bs-popper', get_template_directory_uri() . '/js/popper.min.js', 'jquery', '', true );	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '', true );	wp_register_script( 'fullpage-js', get_template_directory_uri() . '/js/fullpage.min.js', '', '', true );		wp_enqueue_script(array('jquery','bs-popper','bootstrap-js','fullpage-js'));	wp_enqueue_style( array('google-font','bootstrap-css','pgthrottle-style','fullpage-style'));	 }// Footer Creditsadd_filter('developer_credit', 'pgthrottle_developer_credits');function pgthrottle_developer_credits($newlink) {	$newlink = "<a href='http://www.peytongregory.com/' target='_blank' title='Site Design by Peyton Gregory'>Site Design</a>";	return $newlink;}// Paste code below in footer to displays credits.// echo apply_filters('developer_credit', '');// Add Button class to Gravity Formsadd_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );function form_submit_button($button, $form) {    return '<input type="submit" class="btn btn-primary" id="gform_submit_button_' . $form['id'] . '" value="' . $form['button']['text'] . '">';}