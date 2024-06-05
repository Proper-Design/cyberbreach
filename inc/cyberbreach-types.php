<?php

// Register Custom Post Type Product
function create_product_cpt() {

	$labels = array(
		'name' => _x( 'Products', 'Post Type General Name', 'properbear' ),
		'singular_name' => _x( 'Product', 'Post Type Singular Name', 'properbear' ),
		'menu_name' => _x( 'Products', 'Admin Menu text', 'properbear' ),
		'name_admin_bar' => _x( 'Product', 'Add New on Toolbar', 'properbear' ),
		'archives' => __( 'Product Archives', 'properbear' ),
		'attributes' => __( 'Product Attributes', 'properbear' ),
		'parent_item_colon' => __( 'Parent Product:', 'properbear' ),
		'all_items' => __( 'All Products', 'properbear' ),
		'add_new_item' => __( 'Add New Product', 'properbear' ),
		'add_new' => __( 'Add New', 'properbear' ),
		'new_item' => __( 'New Product', 'properbear' ),
		'edit_item' => __( 'Edit Product', 'properbear' ),
		'update_item' => __( 'Update Product', 'properbear' ),
		'view_item' => __( 'View Product', 'properbear' ),
		'view_items' => __( 'View Products', 'properbear' ),
		'search_items' => __( 'Search Product', 'properbear' ),
		'not_found' => __( 'Not found', 'properbear' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'properbear' ),
		'featured_image' => __( 'Featured Image', 'properbear' ),
		'set_featured_image' => __( 'Set featured image', 'properbear' ),
		'remove_featured_image' => __( 'Remove featured image', 'properbear' ),
		'use_featured_image' => __( 'Use as featured image', 'properbear' ),
		'insert_into_item' => __( 'Insert into Product', 'properbear' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'properbear' ),
		'items_list' => __( 'Products list', 'properbear' ),
		'items_list_navigation' => __( 'Products list navigation', 'properbear' ),
		'filter_items_list' => __( 'Filter Products list', 'properbear' ),
	);
	$args = array(
		'label' => __( 'Product', 'properbear' ),
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
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'create_product_cpt', 0 );