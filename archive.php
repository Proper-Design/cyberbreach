<?php
/**
 * Default template for any archive.
 *
 * @package WordPress
 */

get_header(); ?>

<div>
	<?php if ( have_posts() ) : ?>
		<?php /* If this is a category archive */ if ( is_category() ) { ?>
			<h2><?php esc_html_e( 'Archive for the', 'properbear' ); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php esc_html_e( 'Category', 'properbear' ); ?></h2>
		<?php /* If this is a tag archive */ } elseif ( is_tag() ) { ?>
			<h2><?php esc_html_e( 'Posts Tagged', 'properbear' ); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
		<?php /* If this is a daily archive */ } elseif ( is_day() ) { ?>
			<h2><?php esc_html_e( 'Archive for', 'properbear' ); ?> <?php the_time( 'F jS, Y' ); ?></h2>
		<?php /* If this is a monthly archive */ } elseif ( is_month() ) { ?>
			<h2><?php esc_html_e( 'Archive for', 'properbear' ); ?> <?php the_time( 'F, Y' ); ?></h2>
		<?php /* If this is a yearly archive */ } elseif ( is_year() ) { ?>
			<h2 class="pagetitle"><?php esc_html_e( 'Archive for', 'properbear' ); ?> <?php the_time( 'Y' ); ?></h2>
		<?php /* If this is an author archive */ } elseif ( is_author() ) { ?>
			<h2 class="pagetitle"><?php esc_html_e( 'Author Archive', 'properbear' ); ?></h2>
		<?php } ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/post-teaser' ); ?>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
	<?php else : ?>

		<h2><?php esc_html_e( 'Nothing Found', 'properbear' ); ?></h2>

	<?php endif; ?>

</div>

<?php get_footer(); ?>
