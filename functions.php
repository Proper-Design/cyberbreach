<?php
/**
 * Core functions file for Proper Bear.
 *
 * @package WordPress
 */

/**
 * Theme setup function
 */
function properbear_setup() {
	load_theme_textdomain( 'properbear', get_template_directory() . '/languages' );

	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', 'gallery' ) );
	add_post_type_support( 'page', 'excerpt' );

	register_nav_menu( 'primary', __( 'Navigation Menu', 'properbear' ) );
}
add_action( 'after_setup_theme', 'properbear_setup' );

/**
 * Scripts & Styles
 */
function properbear_scripts_styles() {
	$version = filemtime( get_template_directory() . '/style.css' );

	wp_enqueue_script(
		'properbear-theme',
		get_stylesheet_directory_uri() . '/assets/js/build/index.js',
		array( 'wp-element', 'wp-util' ),
		$version,
		true
	);

	wp_enqueue_style(
		'proper-bear-styles',
		get_stylesheet_uri(),
		array(),
		$version
	);

	add_editor_style(get_stylesheet_uri() );

	/**
	* Load Comments
	*/
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'properbear_scripts_styles' );

	/**
	* Include all PHP files in the inc folder
	*/
foreach ( glob( get_template_directory() . '/inc/*.php' ) as $filename ) {
	require_once $filename;
}

add_theme_support( 'post-thumbnails' );

/**
 * Set Image sizes
*/
add_image_size( 'hero-large', 1920, 1080, true );
add_image_size( 'hero', 1280, 720, true );
add_image_size( 'hero-small', 800, 450, true );
add_image_size( 'thumbnail-large', 800, 800, true );
