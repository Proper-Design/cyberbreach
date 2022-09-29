<?php

// The primary menu as defined in functions.php

?>
<div id="siteNav-wrapper" class="siteNav-wrapper">
    <nav class="siteNav" role="navigation">
        <button id="siteNav-toggle" class="siteNav-toggle"><?php _e('Menu', 'properbear'); ?></button>
        <?php
		// Limits the menu to one level by default.
		$args = array(
			'theme_location' => 'primary',
			'container' => false,
			'container_id' => '',
			'menu_class' => 'menu',
			'menu_id' => '',
			'echo' => true,
			'fallback_cb' => '',
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 1,
			'walker' => ''
		);
		wp_nav_menu($args); ?>

    </nav>
</div>