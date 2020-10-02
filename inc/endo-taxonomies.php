<?php

// Register Custom Taxonomy
function register_taxonomy_section() {

	$labels = array(
		'name'                       => _x( 'Sections', 'Taxonomy General Name', 'properbear' ),
		'singular_name'              => _x( 'Section', 'Taxonomy Singular Name', 'properbear' ),
		'menu_name'                  => __( 'Section', 'properbear' ),
		'all_items'                  => __( 'All Sections', 'properbear' ),
		'parent_item'                => __( 'Parent Section', 'properbear' ),
		'parent_item_colon'          => __( 'Parent Section:', 'properbear' ),
		'new_item_name'              => __( 'New section Name', 'properbear' ),
		'add_new_item'               => __( 'Add New Section', 'properbear' ),
		'edit_item'                  => __( 'Edit Section', 'properbear' ),
		'update_item'                => __( 'Update Section', 'properbear' ),
		'view_item'                  => __( 'View Section', 'properbear' ),
		'separate_items_with_commas' => __( 'Separate sections with commas', 'properbear' ),
		'add_or_remove_items'        => __( 'Add or remove sections', 'properbear' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'properbear' ),
		'popular_items'              => __( 'Popular Sections', 'properbear' ),
		'search_items'               => __( 'Search Sections', 'properbear' ),
		'not_found'                  => __( 'Not Found', 'properbear' ),
		'no_terms'                   => __( 'No items', 'properbear' ),
		'items_list'                 => __( 'Sections list', 'properbear' ),
		'items_list_navigation'      => __( 'Sections list navigation', 'properbear' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'section', array( 'faq' ), $args );

}
add_action( 'init', 'register_taxonomy_section', 0 );