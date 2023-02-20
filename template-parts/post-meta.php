<?php
/**
 * Display tags and categories
 *
 * @package WordPress
 */

$tags_label = __( 'Tagged: ', 'properbear' );
$cats_label = __( 'Posted in: ', 'properbear' );

?>
<footer class="postMeta">
	<div class="postMeta-tags">
		<?php the_tags( $tags_label, ', ' ); ?>
	</div>

	<div class="postMeta-cats">
		<?php
		echo esc_attr( $cats_label );
		the_category( ', ' );
		?>
	</div>

</footer>
