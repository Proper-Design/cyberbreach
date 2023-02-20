<?php
/**
 * Template Part for a featured image with a caption.
 * Don't link on single pages.
 *
 * @package WordPress
 */

if ( ! is_singular() ) {
	$link_to_post = true;
} else {
	$link_to_post = false;
}
$featured_img = get_the_image(
	array(
		'featured'     => true,
		'size'         => 'large',
		'image_class'  => 'featuredImage',
		'link_to_post' => $link_to_post,
		'echo'         => false,
	)
);
if ( $featured_img ) : ?>
	<div class="featuredImage-wrapper">
		<?php echo esc_attr( $featured_img ); ?>
	</div>
<?php endif; ?>
