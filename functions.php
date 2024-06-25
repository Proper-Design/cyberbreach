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


function cyberbreach_register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type( get_template_directory() .'/blocks/event-list' );
    register_block_type( get_template_directory() .'/blocks/next-event' );

	}
// Here we call our cyberbreach_register_acf_block() function on init.
add_action( 'init', 'cyberbreach_register_acf_blocks' );

function cyberbreach_get_event_data() {

	if( get_transient( 'eventData' ) ) {
    $eventData = get_transient( 'eventData' );
} else {
    $response = wp_remote_get( 'https://crimson-cloud-1110.tines.com/api/v1/records?record_field_ids%5B%5D=35646&record_field_ids%5B%5D=35648&story_ids%5B%5D=65490',
array(
		'headers' => array('Authorization' => 'Bearer k5TSzdCiYAJ_vYg7xTPS'),
));
    

		$body = json_decode( wp_remote_retrieve_body( $response ) );
    $eventData = $body->record_results;
		$dates = array_column($eventData, 'Date');
		array_multisort($dates, SORT_ASC, $eventData);
    
		set_transient( 'eventData', $eventData, DAY_IN_SECONDS );
}

}

add_action( 'init', 'cyberbreach_get_event_data' );
