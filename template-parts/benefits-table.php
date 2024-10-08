<?php

$benefits = get_field('benefits', 'option');



?>


<div class="benefitsTable">

<header class="benefitsTable-header">
	<h2>> Benefits _</h2>
</header>
	

	<?php foreach($benefits as $benefit):?>
		<div class="card">
			<div class="card-inner">
				
			<?php
				if( isset($benefit['icon'])){
					the_proper_svg($benefit['icon'], 'card-icon');
					} 
				?>
				<div class="card-content">
					
					<h3 class="card-title">
						<?php echo $benefit['title'];?>
					</h3>
					<p><?php echo $benefit['content'];?></p>
				</div>
			</div>
		</div>

		<?php endforeach;?>
		
		<div class="benefitsTable-footer">
				<?php get_template_part('template-parts/sticky-cta');?>
		</div>
	</div>