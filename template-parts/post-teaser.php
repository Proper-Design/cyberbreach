<?php
/**
 * Preview of a single post.
 *
 * @package WordPress
 */

?>
<article <?php post_class( 'postTeaser' ); ?>>
	<h1><a href="<?php the_permalink();?>">
		<?php the_title(); ?>
	</a></h1>
	<?php the_date(); ?>
	<?php the_excerpt(); ?>
</article>