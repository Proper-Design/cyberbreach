<?php
/**
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */


// Theme Setup

function properbear_setup()
{
  load_theme_textdomain('properbear', get_template_directory() . '/languages');

  // Register a menu location
  register_nav_menu('primary', __('Navigation Menu', 'properbear'));

  // Enable support for HTML5 markup.
  add_theme_support('html5', array('comment-list', 'search-form', 'comment-form', 'gallery',));
}
add_action('after_setup_theme', 'properbear_setup');

// Scripts & Styles
function properbear_scripts_styles()
{

  // a single minified scripts file based for all theme and third-party scripts
  wp_enqueue_script('properbear-theme', get_template_directory_uri() . '/_/js/bundle.js', null, null, true); // Put this guy in the footer
  // Swap the above for this line if you need jQuery
  // wp_enqueue_script('properbear-theme', get_template_directory_uri() . '/_/js/bundle.js', array('jquery'), null, true); // Put this guy in the footer

  // Load Stylesheet
  wp_enqueue_style('proper-bear-styles', get_stylesheet_uri());

  // Load Comments
  if (is_singular() && comments_open() && get_option('thread_comments'))
    wp_enqueue_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'properbear_scripts_styles');

// Include all PHP files in the inc folder

foreach (glob(get_template_directory() . '/_/php/*.php') as $filename) {
  require_once $filename;
}

add_theme_support('post-thumbnails');
