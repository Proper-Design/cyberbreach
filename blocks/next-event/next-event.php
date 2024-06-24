
<?php
$eventData = get_transient( 'eventData' );

$next_event = $eventData[0]
?>
<?php if($next_event) { ?>

<span>
Our next session is <?php echo wp_date(get_option( 'date_format' ), strToTime($next_event->Date)) ?>
</span>
<?php } ?>