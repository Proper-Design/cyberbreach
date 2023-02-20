<?php
/**
 * The fallback template file for singles and archives.
 *
 * @package WordPress
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>
	<ol class="archiveGrid">
		<?php	while ( have_posts() ) : ?>
			<?php the_post(); ?>
		<li>
			<?php get_template_part( 'template-parts/post-teaser' ); ?>
		</li>
		<?php	endwhile; ?>
	</ol>
	<?php endif; ?>
<?php proper_post_navigation(); ?>


<?php
get_footer();
