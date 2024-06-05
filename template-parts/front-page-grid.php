<?php

$products = new WP_Query(
	array(
		'post_type' => 'product',
	)
);

?>

<div class="frontPageGrid">

<h2 class="frontPageGrid-title">> Workshop Products <</h2>

<?php if($products->have_posts()):?>
<?php while ($products->have_posts()):
			$products->the_post(); ?>
			<?php get_template_part('template-parts/product-teaser');?>
<?php endwhile;
		wp_reset_postdata(); ?>
<?php endif;?>
			
			<!-- Emulator -->
			<?php get_template_part('template-parts/emulator-teaser');?>

</div>