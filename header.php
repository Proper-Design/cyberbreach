<?php
/**
 * The theme header component.
 *
 * @package WordPress
 */

?>
<!doctype html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php
	if ( is_search() ) {
		echo '<meta name="robots" content="noindex, nofollow" />';}
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="siteWrapper">

	<div class="siteHeader-wrapper">
		<header class="siteHeader" role="banner">

		<h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
			title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<svg width="1.5em" height="1.5em" viewBox="0 0 100 100"><?php the_proper_icon( 'proper-logo' ); ?></svg>
			<?php bloginfo( 'name' ); ?></a>
		</h1>
		</header>
		<?php get_template_part( 'header', 'nav' ); ?>
	</div>


	<div class="siteContent-wrapper">
