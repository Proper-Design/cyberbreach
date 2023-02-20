<?php
/**
 * The fallback template file for single posts or post-types.
 *
 * @package WordPress
 */

get_header(); ?>

<div>
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_date(); ?>
			<?php the_excerpt(); ?>
			<?php edit_post_link( __( 'Edit this entry', 'properbear' ), '<p>', '</p>' ); ?>
			<?php get_template_part( 'post', 'meta' ); ?>
		</article>

			<?php comments_template(); ?>

			<?php
	endwhile;
endif;
	?>

	<?php proper_post_navigation(); ?>

</div>

<?php get_footer(); ?>
