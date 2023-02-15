<?php
/* Enable auto-updates of plugins/themes with cron */

add_action(
	'wp_update_plugins',
	function() {

		if ( wp_doing_cron() && ! doing_action( 'wp_maybe_auto_update' ) ) {

			do_action( 'wp_maybe_auto_update' );

		}
	},
	20
);
