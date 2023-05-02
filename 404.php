<?php
/**
 * Error 404 template.
 *
 * @package WordPress
 */

get_header(); ?>

	<main class="page-wrapper">
		<h1><?php esc_html_e( 'Error 404 - Page Not Found', 'properbear' ); ?></h1>
		<?php get_template_part('template-parts/search-form');?>
	</main>

<?php get_footer(); ?>
