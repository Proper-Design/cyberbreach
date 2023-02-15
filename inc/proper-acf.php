<?php

// Proper Bear Adavnced Custom Fields helpers

// Add custom load and save points for Advanced Custom Fields
add_filter( 'acf/settings/save_json', 'properbear_acf_save_point' );

function properbear_acf_save_point( $path ) {

	// update path
	$path = get_stylesheet_directory() . '/assets/acf-json';

	// return
	return $path;
}


add_filter( 'acf/settings/load_json', 'properbear_json_load_point' );

function properbear_json_load_point( $paths ) {

	// remove original path (optional)
	unset( $paths[0] );

	// append path
	$paths[] = get_stylesheet_directory() . '/assets/acf-json';

	// return
	return $paths;
}


