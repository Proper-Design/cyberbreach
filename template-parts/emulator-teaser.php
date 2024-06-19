<?php

$emulator_page = get_field('emulator_page', 'options');

?>

<article class="emulatorTeaser">
		<?php echo get_the_post_thumbnail($emulator_page, 'hero-small', array('class'=>'emulatorTeaser-image')); ?>
		<div class="emulatorTeaser-content">
			<h3><a href="<?php echo get_the_permalink($emulator_page); ?>"><?php echo $emulator_page->post_title;  ?></a></h3>
			<?php echo get_the_excerpt($emulator_page); ?>
		</div>
	</article>