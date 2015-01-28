<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */

// Include all PHP files in the inc folder

foreach (glob( get_template_directory() . '/_/inc/php/*.php') as $filename)
{
    require_once $filename;
}

// Options Framework (https://github.com/devinsays/options-framework-plugin)
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/_/inc/' );
	require_once dirname( __FILE__ ) . '/_/inc/options-framework.php';
}

// Theme Setup (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function proper_bear_setup() {
	load_theme_textdomain( 'proper_bear', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'proper_bear' ) );
	add_theme_support( 'post-thumbnails' );
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array('comment-list','search-form','comment-form','gallery',) );
}
add_action( 'after_setup_theme', 'proper_bear_setup' );

// Scripts & Styles (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function proper_bear_scripts_styles() {

	// Load Stylesheet
	wp_enqueue_style( 'proper-bear-styles', get_stylesheet_uri() );

	// Load Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Third party scripts – a single minified scripts file based on bower_components (bower.json)
	wp_enqueue_script( 'proper-bear-thirdparty', get_template_directory_uri() . '/_/dist/thirdparty.min.js' );

	//Third party styles
	wp_enqueue_style( 'proper-bear-thirdparty-styles', get_template_directory_uri() . '/_/dist/thirdparty.min.css' );	

	// Theme scripts - anything that's in _/js-source gets minified into theme.min.js
	wp_enqueue_script( 'proper-bear-theme', get_template_directory_uri() . '/_/dist/theme.min.js' );

}
add_action( 'wp_enqueue_scripts', 'proper_bear_scripts_styles' );

// WP Title (based on twentythirteen: http://make.wordpress.org/core/tag/twentythirteen/)
function proper_bear_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'proper_bear' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'proper_bear_wp_title', 10, 2 );

//Clean up the <head>	
function removeHeadLinks() {
   	remove_action('wp_head', 'rsd_link');
   	remove_action('wp_head', 'wlwmanifest_link');
   	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
   	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
   }
add_action('init', 'removeHeadLinks');

// Custom Menu
register_nav_menu( 'primary', __( 'Navigation Menu', 'proper_bear' ) );

// Navigation - update coming from twentythirteen
function post_navigation() {
	echo '<div class="navigation">';
	echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
	echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
	echo '</div>';
}

// Posted On
function posted_on() {
	printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_author() )
	);
}

// Override img caption shortcode to stop WP adding 10px to .wp-caption divs.
add_filter('img_caption_shortcode', 'fix_img_caption_shortcode', 10, 3);

function fix_img_caption_shortcode($val, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr));

    if ( 1 > (int) $width || empty($caption) ) return $val;

    return '<div id="' . $id . '" class="wp-caption ' . esc_attr($align) . '" style="width: ' . (0 + (int) $width) . 'px">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}