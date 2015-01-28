<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'properbear'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$options = array();

	$options[] = array(
		'name' => __('Header Meta', 'properbear'),
		'type' => 'heading');

// Standard Meta
	$options[] = array(
		'name' => __('Head ID', 'properbear'),
		'desc' => __("", 'properbear'),
		'id' => 'meta_headid',
		'std' => 'www-sitename-com',
		'type' => 'text');
	$options[] = array(
		'name' => __('Google Webmasters', 'properbear'),
		'desc' => __("Speaking of Google, don't forget to set your site up: <a href='http://google.com/webmasters' target='_blank'>http://google.com/webmasters</a>", 'properbear'),
		'id' => 'meta_google',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Author Name', 'properbear'),
		'desc' => __('Populates meta author tag.', 'properbear'),
		'id' => 'meta_author',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Mobile Viewport', 'properbear'),
		'desc' => __('Uncomment to use; use thoughtfully!', 'properbear'),
		'id' => 'meta_viewport',
		'std' => 'width=device-width, initial-scale=1.0',
		'type' => 'text');

// Icons
	$options[] = array(
		'name' => __('Site Favicon', 'properbear'),
		'desc' => __('', 'properbear'),
		'id' => 'head_favicon',
		'type' => 'upload');
	$options[] = array(
		'name' => __('Apple Touch Icon', 'properbear'),
		'desc' => __('', 'properbear'),
		'id' => 'head_apple_touch_icon',
		'type' => 'upload');

// App: Windows 8
	$options[] = array(
		'name' => __('App: Windows 8', 'properbear'),
		'desc' => __('Application Name', 'properbear'),
		'id' => 'meta_app_win_name',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __('Tile Color', 'properbear'),
		'id' => 'meta_app_win_color',
		'std' => '',
		'type' => 'color');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __('Tile Image', 'properbear'),
		'id' => 'meta_app_win_image',
		'std' => '',
		'type' => 'upload');

// App: Twitter
	$options[] = array(
		'name' => __('App: Twitter Card', 'properbear'),
		'desc' => __('twitter:card (summary, photo, gallery, product, app, player)', 'properbear'),
		'id' => 'meta_app_twt_card',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __('twitter:site (@username of website)', 'properbear'),
		'id' => 'meta_app_twt_site',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __("twitter:title (the user's Twitter ID)", 'properbear'),
		'id' => 'meta_app_twt_title',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __('twitter:description (maximum 200 characters)', 'properbear'),
		'id' => 'meta_app_twt_description',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __('twitter:url (url for the content)', 'properbear'),
		'id' => 'meta_app_twt_url',
		'std' => '',
		'type' => 'text');

// App: Facebook
	$options[] = array(
		'name' => __('App: Facebook', 'properbear'),
		'desc' => __('og:title', 'properbear'),
		'id' => 'meta_app_fb_title',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __('og:description', 'properbear'),
		'id' => 'meta_app_fb_description',
		'std' => '',
		'type' => 'textarea');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __('og:url', 'properbear'),
		'id' => 'meta_app_fb_url',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('', 'properbear'),
		'desc' => __('og:image', 'properbear'),
		'id' => 'meta_app_fb_image',
		'std' => '',
		'type' => 'upload');

	return $options;

}