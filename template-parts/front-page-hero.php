		<main <?php post_class('frontPage-hero'); ?> id="page-<?php the_ID(); ?>">



  <iframe
	autoplay="true"
		class="frontPage-hero-video"
    src="https://customer-ilbdw2ocye3963e5.cloudflarestream.com/876564f565cffd56deb2a362ccfa1e96/iframe?autoplay=true&muted=true&poster=https%3A%2F%2Fcustomer-ilbdw2ocye3963e5.cloudflarestream.com%2F876564f565cffd56deb2a362ccfa1e96%2Fthumbnails%2Fthumbnail.jpg%3Ftime%3D%26height%3D600"
    loading="lazy"
    allow="accelerometer; gyroscope; autoplay; encrypted-media; picture-in-picture;"
    allowfullscreen="true"

  ></iframe>
		
		<div class="frontPage-hero-content">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_content(); ?>
		</div>
		</main>