<?php

// Display tags, categories and comment count
 ?>

 <footer class="postmetadata">
	<?php the_tags(__('Tags: ','properbear'), ', ', '<br />'); ?>
	<?php _e('Posted in','properbear'); ?> <?php the_category(', ') ?>
</footer>