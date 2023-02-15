<?php

// Display tags and categories

$tags_label = __( 'Tagged: ', 'properbear' );
$cats_label = __( 'Posted in: ', 'properbear' );

?>



<footer class="postMeta">
	<div class="postMeta-tags">
		<?php the_tags( $tags_label, ', ' ); ?>
	</div>

	<div class="postMeta-cats">
		<?php
		echo $cats_label;
		the_category( ', ' );
		?>
	</div>

</footer>
