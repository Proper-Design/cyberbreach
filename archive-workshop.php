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

	<div class="archiveHero">
		<h1><?php echo $title; ?></h1>	
	</div>


<?php if ( have_posts() ) : ?>
			<ol class="archive-grid">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li>
					<?php get_template_part( 'template-parts/workshop-teaser' ); ?>
				</li>
				<?php endwhile; ?>
			</ol>
				<?php the_posts_pagination(); ?>			
	<?php endif; ?>

</div>

<?php get_footer(); ?>
