<?php
/**
 * @package WordPress
 
 */
get_header(); ?>

<div  >

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>

		<main <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<?php the_post_thumbnail( 'large' ); ?>
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php the_date(); ?>
			<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit this entry', 'properbear' ), '<p>', '</p>' ); ?>
			<?php
			wp_link_pages(
				array(
					'before'         => __( 'Pages: ', 'properbear' ),
					'next_or_number' => 'number',
				)
			);
			?>
					<?php get_template_part( 'post', 'meta' ); ?>
		</main>

					<?php comments_template(); ?>

			<?php
	endwhile;
endif;
	?>

	<?php proper_post_navigation(); ?>

</div>

<?php get_footer(); ?>
