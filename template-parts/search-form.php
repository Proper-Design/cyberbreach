<?php
/**
 * The search form.
 *
 * @package WordPress
 */

?>

<form role="search" method="get" id="searchform" action="<?php echo esc_attr( home_url( '/' ) ); ?>">
	<form>
		<label for="s" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'properbear' ); ?></label>
		<input type="search" id="s" name="s" value="" />
		<input type="submit" value="<?php esc_html_e( 'Search', 'properbear' ); ?>" id="searchsubmit" />
	</form>
</form>
