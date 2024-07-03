<article class="teaser">
	<a href="<?php the_permalink();?>">
		
		<?php echo has_post_thumbnail() ? get_the_post_thumbnail(get_the_id(), 'hero-small',array('class'=>'teaser-image')) :
		'<img class="teaser-image" src="https://place-hold.it/800x450" alt="">';
		?>
		</a>
	<div class="teaser-content">
		<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
		<?php the_excerpt();?>
	</div>
</article>