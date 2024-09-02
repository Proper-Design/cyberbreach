<?php
/**
 * Render target for React Cookie Consent
 *
 * @package WordPress
 */

$cookie_strings = array(
	'message'    => __( 'We use cookies to enhance your browsing experience, analyse site traffic, and personalize content. By continuing to use this website, you agree to our use of cookies.', 'properbear' ),
	'buttonText' => __( 'Ok, got it', 'properbear' ),
);

wp_localize_script( 'properbear-theme', 'cookieStrings', $cookie_strings );

?>
 
<div id="cookiesRoot"></div>
