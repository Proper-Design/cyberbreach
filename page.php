<?php
/**
 * Template for pages
 *
 * @package WordPress
 */

get_header(); ?>

<div class="page-wrapper">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
		<main <?php post_class('page-content'); ?> id="page-<?php the_ID(); ?>">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
						<?php the_post_thumbnail( 'hero-large', array('class'=>'page-image') ); ?>

		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before'         => __( 'Pages: ', 'properbear' ),
					'next_or_number' => 'number',
					)
				);
				?>
					<?php edit_post_link( __( 'Edit this entry', 'properbear' ), '<p>', '</p>' ); ?>
					<?php get_template_part('template-parts/sticky-cta');?>

				</main>
				
				<?php endwhile; ?>
		<?php endif; ?>
	</div>


<?php get_footer(); ?>
