<?php

$workshops = new WP_Query(
	array(
		'post_type' => 'workshop',
	)
);

?>

<div class="frontPageGrid">

<h2 class="frontPageGrid-title">> Workshop Products <</h2>

<?php if($workshops->have_posts()):?>
<?php while ($workshops->have_posts()):
			$workshops->the_post(); ?>
			<?php get_template_part('template-parts/workshop-teaser');?>
<?php endwhile;
		wp_reset_postdata(); ?>
<?php endif;?>
			
			<!-- Emulator -->
			<?php get_template_part('template-parts/emulator-teaser');?>

</div>