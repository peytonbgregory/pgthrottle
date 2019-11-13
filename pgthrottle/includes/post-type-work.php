<?php 
// Register Custom Post Type
function work() {

	$labels = array(
		'name'                  => _x( 'Work', 'Post Type General Name', 'pgthrottle' ),
		'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'pgthrottle' ),
		'menu_name'             => __( 'Work', 'pgthrottle' ),
		'name_admin_bar'        => __( 'Work', 'pgthrottle' ),
		'archives'              => __( 'Our Work', 'pgthrottle' ),
		'attributes'            => __( 'Work Attributes', 'pgthrottle' ),
		'parent_item_colon'     => __( 'Parent Project:', 'pgthrottle' ),
		'all_items'             => __( 'All Work', 'pgthrottle' ),
		'add_new_item'          => __( 'Add New Project', 'pgthrottle' ),
		'add_new'               => __( 'Add New', 'pgthrottle' ),
		'new_item'              => __( 'New Item', 'pgthrottle' ),
		'edit_item'             => __( 'Edit Item', 'pgthrottle' ),
		'update_item'           => __( 'Update Item', 'pgthrottle' ),
		'view_item'             => __( 'View Item', 'pgthrottle' ),
		'view_items'            => __( 'View Items', 'pgthrottle' ),
		'search_items'          => __( 'Search Item', 'pgthrottle' ),
		'not_found'             => __( 'Not found', 'pgthrottle' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pgthrottle' ),
		'featured_image'        => __( 'Featured Image', 'pgthrottle' ),
		'set_featured_image'    => __( 'Set featured image', 'pgthrottle' ),
		'remove_featured_image' => __( 'Remove featured image', 'pgthrottle' ),
		'use_featured_image'    => __( 'Use as featured image', 'pgthrottle' ),
		'insert_into_item'      => __( 'Insert into item', 'pgthrottle' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'pgthrottle' ),
		'items_list'            => __( 'Items list', 'pgthrottle' ),
		'items_list_navigation' => __( 'Items list navigation', 'pgthrottle' ),
		'filter_items_list'     => __( 'Filter items list', 'pgthrottle' ),
	);
	$args = array(
		'label'                 => __( 'Work', 'pgthrottle' ),
		'description'           => __( 'Projects', 'pgthrottle' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'work_category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'Work', $args );

}
add_action( 'init', 'work', 0 );

function my_cptui_change_posts_per_page( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
       return;
    }

    if ( is_post_type_archive( 'work' ) ) {
       $query->set( 'posts_per_page', -1 );
    }
}
add_filter( 'pre_get_posts', 'my_cptui_change_posts_per_page' );

function wpa_cpt_tags( $query ) {
    if ( $query->is_tag() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'work' ) );
    }
}
add_action( 'pre_get_posts', 'wpa_cpt_tags' );



// Register Custom Taxonomy
function project_category() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'pgthrottle' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'pgthrottle' ),
		'menu_name'                  => __( 'Category', 'pgthrottle' ),
		'all_items'                  => __( 'All Project Categories', 'pgthrottle' ),
		'parent_item'                => __( 'Parent Project Category', 'pgthrottle' ),
		'parent_item_colon'          => __( 'Parent Project Category:', 'pgthrottle' ),
		'new_item_name'              => __( 'New Project Category', 'pgthrottle' ),
		'add_new_item'               => __( 'Add New Project Category', 'pgthrottle' ),
		'edit_item'                  => __( 'Edit Project Category', 'pgthrottle' ),
		'update_item'                => __( 'Update Project Category', 'pgthrottle' ),
		'view_item'                  => __( 'View Project Category', 'pgthrottle' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'pgthrottle' ),
		'add_or_remove_items'        => __( 'Add or remove Project Category', 'pgthrottle' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'pgthrottle' ),
		'popular_items'              => __( 'Popular Project Categories', 'pgthrottle' ),
		'search_items'               => __( 'Search Project Categories', 'pgthrottle' ),
		'not_found'                  => __( 'Not Found', 'pgthrottle' ),
		'no_terms'                   => __( 'No items', 'pgthrottle' ),
		'items_list'                 => __( 'Project Category list', 'pgthrottle' ),
		'items_list_navigation'      => __( 'Project Categories list navigation', 'pgthrottle' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'work_category', array( 'work' ), $args );

}
add_action( 'init', 'work_category', 0 );


?>
