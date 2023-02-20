<?php
/**
 * @package WordPress
 
 */
get_header(); ?>

<div  >

	<?php if ( have_posts() ) : ?>

		<h2><?php esc_html_e( 'Search Results', 'properbear' ); ?></h2>
		<?php the_posts_pagination(); ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?></h2>
				<?php the_date(); ?>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</article>

		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>

	<?php else : ?>

		<h2><?php esc_html_e( 'Nothing Found', 'properbear' ); ?></h2>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
