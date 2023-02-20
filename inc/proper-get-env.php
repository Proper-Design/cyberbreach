<?php
/*
	Check environment to see do different things locally to in production

 */
function proper_get_env() {
	// If we're in the browser at .local
	if ( strpos( $_SERVER['SERVER_NAME'], '.local' ) ) {
		return 'local';
	}
	// If we're using WP CLI
	if ( strpos( $_SERVER['WP_CLI_CONFIG_PATH'], 'Local.app' ) ) {
		return 'local';
	}
	if ( strpos( $_SERVER['SERVER_NAME'], 'staging' ) ) {
		return 'staging';
	} else {
		return 'prod';
	}
}
