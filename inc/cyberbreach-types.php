<?php

// Register Custom Post Type Workshop
function create_workshop_cpt() {

	$labels = array(
		'name' => _x( 'Workshops', 'Post Type General Name', 'properbear' ),
		'singular_name' => _x( 'Workshop', 'Post Type Singular Name', 'properbear' ),
		'menu_name' => _x( 'Workshops', 'Admin Menu text', 'properbear' ),
		'name_admin_bar' => _x( 'Workshop', 'Add New on Toolbar', 'properbear' ),
		'archives' => __( 'Workshop Archives', 'properbear' ),
		'attributes' => __( 'Workshop Attributes', 'properbear' ),
		'parent_item_colon' => __( 'Parent Workshop:', 'properbear' ),
		'all_items' => __( 'All Workshops', 'properbear' ),
		'add_new_item' => __( 'Add New Workshop', 'properbear' ),
		'add_new' => __( 'Add New', 'properbear' ),
		'new_item' => __( 'New Workshop', 'properbear' ),
		'edit_item' => __( 'Edit Workshop', 'properbear' ),
		'update_item' => __( 'Update Workshop', 'properbear' ),
		'view_item' => __( 'View Workshop', 'properbear' ),
		'view_items' => __( 'View Workshops', 'properbear' ),
		'search_items' => __( 'Search Workshop', 'properbear' ),
		'not_found' => __( 'Not found', 'properbear' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'properbear' ),
		'featured_image' => __( 'Featured Image', 'properbear' ),
		'set_featured_image' => __( 'Set featured image', 'properbear' ),
		'remove_featured_image' => __( 'Remove featured image', 'properbear' ),
		'use_featured_image' => __( 'Use as featured image', 'properbear' ),
		'insert_into_item' => __( 'Insert into Workshop', 'properbear' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Workshop', 'properbear' ),
		'items_list' => __( 'Workshops list', 'properbear' ),
		'items_list_navigation' => __( 'Workshops list navigation', 'properbear' ),
		'filter_items_list' => __( 'Filter Workshops list', 'properbear' ),
	);
	$args = array(
		'label' => __( 'Workshop', 'properbear' ),
		'description' => __( '', 'properbear' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-tag',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => array('slug' => 'workshops')
	);
	register_post_type( 'workshop', $args );

}
add_action( 'init', 'create_workshop_cpt', 0 );