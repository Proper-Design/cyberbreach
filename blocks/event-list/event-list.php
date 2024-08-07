
<?php
$events = get_transient( 'eventData' );
$today = date("Y-m-d H:i:s"); ?>


<?php if ($events):

	$last_three = array_slice($events, -2);
	
	
	?>
	<ol class="eventsList">

		
		<?php

foreach ($last_three  as $event):
	
	$date = $event->Date;
	$location = $event->Location;
	$past_event = $today > $date;
	
	?>
<li>
	
	<div class="eventTeaser <?php echo $past_event ? 'past' : 'current' ?>">
		<div><time datetime="<?php echo $date; ?>">
			<?php echo wp_date(get_option( 'date_format' ), strToTime($date)); ?>
		</time>
		</div>
		<div>
			<?php echo $location; ?>
		</div>
	</div>
	
</li>

<?php endforeach; ?>
</ol>
<?php endif;?>
