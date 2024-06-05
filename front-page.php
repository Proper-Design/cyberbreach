<?php
/**
 * Template for pages
 *
 * @package WordPress
 */

get_header(); ?>


	<?php	if ( have_posts() ) : ?>
<?php	while ( have_posts() ) : ?>
<?php	the_post(); ?>
<?php get_template_part('template-parts/front-page-hero');?>

<?php endwhile; ?>
<?php	endif; ?>
	<?php get_template_part('template-parts/front-page-grid');?>

	<?php get_template_part('template-parts/benefits-table');?>

<?php get_footer(); ?>
