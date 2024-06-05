<?php

$benefits = [
	[
		'title'=> 'Comprehensive Learning',
		'content' => 'Open to all organisational roles, from CEO to IT support staff. Everyone in your team needs to comprehend the breach response plan.'
	],
		[
		'title'=> 'Clear Responsibilities',
		'content' => 'Regardless of your role, this workshop empowers you to understand your responsibilities and actions during a breach.'
	],
		[
		'title'=> 'Plan Development and Implementation',
		'content' => 'Gain the knowledge and skills to develop and execute an effective breach response. '
	],
		[
		'title'=> 'Enhanced Understanding',
		'content' => 'Develop a broader perspective of all team member roles within a breach scenario.'
	],
		[
		'title'=> 'Cultural Shift',
		'content' => 'Contribute to changing the organisational culture, prioritising cybersecurity, and preparedness.'
	],
		[
		'title'=> 'Early Decision-Making',
		'content' => 'Senior leadership will recognise the significance of making crucial decisions early, even before a breach occurs.'
	],
		[
		'title'=> 'Efficient Management',
		'content' => 'Managers will work more effectively as a cohesive unit, ensuring a consistent and repeatable response to cyber breaches. '
	],
		[
		'title'=> 'Improved Collaboration',
		'content' => 'Building better collaboration between senior leaders is a key outcome of the Cyber Breach Response Workshop. '
	]
];

?>


<div class="benefitsTable">

<header class="benefitsTable-header">
	<h2>Benefits</h2>
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