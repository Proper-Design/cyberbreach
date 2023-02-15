<?php

/**
 *
 * Template Name: Contact Form
 *
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
get_header();

$contact_form_config = array(
	'subject'    => __( 'Website Contact', 'properbear' ),
	'submit'     => __( 'Send', 'properbear' ),
	'formError'  => __( 'There a problem with your form', 'properbear' ),
	'fieldError' => __( 'You will need to complete this field', 'properbear' ),
	'sending'    => __( 'Sending...', 'properbear' ),
	'success'    => __( 'Your message has been sent.', 'properbear' ),

	'fieldsets'  => array(
		array(
			'fields' => array(
				array(

					'name'     => 'name',
					'type'     => 'text',
					'label'    => __( 'Your Name', 'properbear' ),
					'required' => true,
				),
				array(
					'type'     => 'email',
					'name'     => 'email',
					'label'    => __( 'Your Email Address', 'properbear' ),
					'required' => true,
				),
				array(
					'type'     => 'textarea',
					'name'     => 'message',
					'label'    => __( 'Your Message', 'properbear' ),
					'required' => true,
				),
			),
		),

	),
);

wp_localize_script( 'properbear-theme', 'contactFormConfig', $contact_form_config );



?>

<div class="siteContent">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>

	<main <?php post_class(); ?> id="page-<?php the_ID(); ?>">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php the_content(); ?>
		<div class="contactForm"></div>
			<?php
			wp_link_pages(
				array(
					'before'         => __( 'Pages: ', 'properbear' ),
					'next_or_number' => 'number',
				)
			);
			?>
					<?php edit_post_link( __( 'Edit this entry', 'properbear' ), '<p>', '</p>' ); ?>
	</main>

			<?php
	endwhile;
endif;
	?>

</div>

<?php get_footer(); ?>
