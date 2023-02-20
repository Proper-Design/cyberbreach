<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div>
		<label for="s" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'properbear' ); ?></label>
		<input type="search" id="s" name="s" value="" />
		<input type="submit" value="<?php esc_html_e( 'Search', 'properbear' ); ?>" id="searchsubmit" />
	</div>
</form>
