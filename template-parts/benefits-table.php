<?php

$benefits = get_field('benefits', 'option');

?>


<div class="benefitsTable">

<header class="benefitsTable-header">
	<h2>> Benefits _</h2>
</header>
	

	<?php foreach($benefits as $benefit):?>
		<div class="card">
			<h3 class="card-title">
				<?php echo $benefit['title'];?>
			</h3>
			<p><?php echo $benefit['content'];?></p>
		</div>

		<?php endforeach;?>

</div>