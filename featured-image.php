<?php

// Display a large featured image

// Don't link on single pages
if ( ! is_singular() ) {
	$link = true;
} else {
	$link = false;
}

$featured_img = get_the_image(
	array(
		'featured'     => true,
		'size'         => 'large',
		'image_class'  => 'featuredImage',
		'link_to_post' => $link,
		'echo'         => false,
	)
);

if ( $featured_img ) : ?>

	<div class="featuredImage-wrapper">
		<?php echo $featured_img; ?>
	</div>

<?php endif;

?>
