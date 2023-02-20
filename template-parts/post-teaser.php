<?php
/**
 * Preview of a single post.
 *
 * @package WordPress
 */

?>
<article <?php post_class( 'postTeaser' ); ?>>
	<h1><?php the_title(); ?></h1>
	<?php the_date(); ?>
	<?php the_excerpt(); ?>
</article>
