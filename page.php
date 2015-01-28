<?php
/**
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
 get_header(); ?>

 <div class="site-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post" id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>

			<?php posted_on(); ?>

			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => __('Pages: ','properbear'), 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link(__('Edit this entry','properbear'), '<p>', '</p>'); ?>

		</article>

		<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>
