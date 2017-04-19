<?php
/**
 * Template Name: Contact Form
 * The template for displaying a contact form.
 *
 *
 *
 * @package properbear */

get_header(); ?>

<div class="siteContent">

<div class="siteContent-main">

	<?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part('featured', 'media'); ?>
			<?php get_template_part( 'content', 'page' ); ?>
      <?php proper_email_form(); ?>
	<?php endwhile; // end of the loop. ?>

</div>

<?php get_template_part('asides' ); ?>

</div>

<?php get_footer(); ?>
