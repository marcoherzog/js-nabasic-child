<?php

// Setup My Child Theme's textdomain.
// @link http://codex.wordpress.org/Child_Themes#Internationalization
function my_child_theme_setup() {

  load_child_theme_textdomain( 'job-shuttle', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'my_child_theme_setup' );


// Register Custom Post Type
function na_company() {
	$labels = array(
			'name'                => _x( 'Companies', 'Post Type General Name', 'job-shuttle' ),
			'singular_name'       => _x( 'Company', 'Post Type Singular Name', 'job-shuttle' ),
			'menu_name'           => __( 'Companies', 'job-shuttle' ),
			'parent_item_colon'   => __( 'Parent Company:', 'job-shuttle' ),
			'all_items'           => __( 'All Companies', 'job-shuttle' ),
			'view_item'           => __( 'View Company', 'job-shuttle' ),
			'add_new_item'        => __( 'Add New Company', 'job-shuttle' ),
			'add_new'             => __( 'New Company', 'job-shuttle' ),
			'edit_item'           => __( 'Edit Company', 'job-shuttle' ),
			'update_item'         => __( 'Update Company', 'job-shuttle' ),
			'search_items'        => __( 'Search companies', 'job-shuttle' ),
			'not_found'           => __( 'No companies found', 'job-shuttle' ),
			'not_found_in_trash'  => __( 'No companies found in Trash', 'job-shuttle' ),
	);

	$rewrite = array(
			'slug'                => 'company',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
	);

	$args = array(
			'label'               => __( 'company', 'job-shuttle' ),
			'description'         => __( 'Company information page', 'job-shuttle' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', ),
			'taxonomies'          => array( 'post_tag' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'menu_icon'           => '',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'           => 'companies',
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
	);

	register_post_type( 'na_company', $args );
}
// Hook into the 'init' action
add_action( 'init', 'na_company', 0 );



?>
