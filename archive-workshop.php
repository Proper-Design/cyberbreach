<?php
/**
 * Default template for any archive.
 *
 * @package WordPress
 */

get_header();

$archive = get_queried_object();
// print_r($archive);


if (is_tax() || is_category() || is_tag()) {
	$tax = $archive->taxonomy;
	$title = $archive->name;
	$type = null;
} else {
	$type = $archive->name;
	$title = $archive->labels->archives;
	$tax = null;
}


?>


<div class="page-wrapper">
<h1><?php echo $title; ?></h1>	

<?php if ( have_posts() ) : ?>
			<ol class="archiveGrid">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li>
					<?php get_template_part( 'template-parts/post-teaser' ); ?>
				</li>
				<?php endwhile; ?>
			</ol>
				<?php the_posts_pagination(); ?>
				<?php else : ?>
					
					<h2><?php esc_html_e( 'Nothing Found', 'properbear' ); ?></h2>
					
	<?php endif; ?>

</div>

<?php get_footer(); ?>
