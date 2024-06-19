<?php
/**
 * @package WordPress
 */
get_header(); ?>

<div class="page-wrapper">
	<?php if ( have_posts() ) : ?>
		<?php	while ( have_posts() ) : the_post(); ?>
			<main <?php post_class('page-content'); ?> id="post-<?php the_ID(); ?>">
			<?php the_title( '<h1>', '</h1>' ); ?>
				<?php the_post_thumbnail( 'hero-large', array('class'=>'page-image') ); ?>
				<?php the_content(); ?>
			</main>
		<?php endwhile; ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
