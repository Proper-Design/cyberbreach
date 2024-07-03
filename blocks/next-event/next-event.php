
<?php
$eventData = get_transient( 'eventData' );

if($eventData):
	
	$date = date("Y-m-d H:i:s");
	$next_event = null;

	foreach($eventData as $event):
		if(!$next_event && $event->Date > $date){
			$next_event = $event;
		} 
	endforeach;
endif;

if($next_event): ?>

<div class="next-event">
Our next session is <?php echo wp_date(get_option( 'date_format' ), strToTime($next_event->Date)) ?>.
</div>
<?php else: ?>
	<div class="next-event">
		We don't currently have any planned sessions.
	</div>
	<?php endif; ?>