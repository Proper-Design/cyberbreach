<?php
/**
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
 get_header(); ?>

 <div class="site-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<?php posted_on(); ?>
			<?php the_excerpt(); ?>
			<?php get_template_part('post', 'meta'); ?>
		</article>

	<?php endwhile; ?>

	<?php post_navigation(); ?>

	<?php else : ?>

		<h1><?php _e('Nothing Found','properbear'); ?></h1>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
