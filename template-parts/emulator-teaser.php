<?php

$emulator_page = get_field('emulator_page', 'options');

?>

<article class="emulatorTeaser">

	<a class="teaser-image-wrapper" href="<?php the_permalink();?>">
		<?php echo get_the_post_thumbnail($emulator_page, 'hero-small', array('class'=>'teaser-image')); ?>
	</a>
		<div class="emulatorTeaser-content">
			<h3><a href="<?php echo get_the_permalink($emulator_page); ?>"><?php echo $emulator_page->post_title;  ?></a></h3>
			<?php echo get_the_excerpt($emulator_page); ?>
		</div>
	</article>