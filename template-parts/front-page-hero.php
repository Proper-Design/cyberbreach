		<main <?php post_class('frontPage-hero'); ?> id="page-<?php the_ID(); ?>">
		
		<img class="frontPage-hero-image" src="https://place-hold.it/1600x900" alt="">
		<div class="frontPage-hero-content">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_content(); ?>
		</div>
		</main>