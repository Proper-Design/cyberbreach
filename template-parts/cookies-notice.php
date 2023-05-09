<?php
/**
 * Render target for React Cookie Consent
 *
 * @package WordPress
 */

$cookie_strings = array(
	'message'    => __( 'We use cookies from third-party services to help us improve our website.', 'properbear' ),
	'buttonText' => __( 'Ok, got it', 'properbear' ),
);

wp_localize_script( 'properbear-theme', 'cookieStrings', $cookie_strings );

?>
 
<div id="cookiesRoot"></div>
