<?php 
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
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
     register_sidebar( array(
		'name'          => 'Footer Middle', 
		'id'            => 'footer-middle',
		'description'   => 'Add widgets to the left side of the purple footer on every page.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer Right', 
		'id'            => 'footer-right',
		'description'   => 'Add widgets to the  right side of the purple footer on every page.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Archive Header', 
		'id'            => 'archive-header',
		'description'   => 'Add widgets to top of archive pages.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
?>
