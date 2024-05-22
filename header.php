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
	<?php get_template_part( 'template-parts/cookies-notice' ); ?>
	<div class="siteWrapper">
	<div class="siteHeader-wrapper">
		<header class="siteHeader" role="banner">
		<h1 class="siteHeader-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php get_template_part('template-parts/header-logo');?>
			</a>
		</h1>
		</header>
		<?php get_template_part( 'template-parts/header-nav' ); ?>
</div>
<div>
