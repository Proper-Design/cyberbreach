<?php

// The primary menu as defined in functions.php

?>
<div class="siteNav-wrapper">
	<nav class="siteNav" role="navigation">
	
		<?php
			$toggle = '<div class="menuToggle">' . __('Menu', 'properbear') . '</div>';
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
				'items_wrap' => $toggle . '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
				'depth' => 1,
				'walker' => ''
			);
			wp_nav_menu( $args ); ?>

	</nav>
</div>