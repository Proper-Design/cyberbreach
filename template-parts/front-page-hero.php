		<main <?php post_class('frontPage-hero'); ?> id="page-<?php the_ID(); ?>">

		<?php the_post_thumbnail('hero-small', array('class'=>"frontPage-hero-image" ));?>
		
		<div class="frontPage-hero-content">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_content(); ?>
		</div>
		</main>