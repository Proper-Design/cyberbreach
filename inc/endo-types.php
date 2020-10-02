<?php

function register_type_faq()
{

    $labels = array(
        'name' => _x('FAQ', 'Post Type General Name', 'proper'),
        'singular_name' => _x('Question', 'Post Type Singular Name', 'proper'),
        'menu_name' => __('FAQs', 'proper'),
        'name_admin_bar' => __('FAQ', 'proper'),
        'archives' => __('Item Archives', 'proper'),
        'attributes' => __('Item Attributes', 'proper'),
        'parent_item_colon' => __('Parent Item:', 'proper'),
        'all_items' => __('All Items', 'proper'),
        'add_new_item' => __('Add New Item', 'proper'),
        'add_new' => __('Add New', 'proper'),
        'new_item' => __('New Item', 'proper'),
        'edit_item' => __('Edit Item', 'proper'),
        'update_item' => __('Update Item', 'proper'),
        'view_item' => __('View Item', 'proper'),
        'view_items' => __('View Items', 'proper'),
        'search_items' => __('Search Item', 'proper'),
        'not_found' => __('Not found', 'proper'),
        'not_found_in_trash' => __('Not found in Trash', 'proper'),
        'insert_into_item' => __('Insert into item', 'proper'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'proper'),
        'items_list' => __('Items list', 'proper'),
        'items_list_navigation' => __('Items list navigation', 'proper'),
        'filter_items_list' => __('Filter items list', 'proper'),
    );
    $args = array(
        'label' => __('FAQ', 'proper'),
        'description' => __('Frequently Asked Questions', 'proper'),
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('faq', $args);

}
add_action('init', 'register_type_faq', 0);