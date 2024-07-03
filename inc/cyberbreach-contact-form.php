<?php


function register_contact_form_fields(){

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
						'type'     => 'text',
						'name'     => 'tel',
						'label'    => __( 'Your Phone Number', 'properbear' ),
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
	
}

add_action('wp_head', 'register_contact_form_fields');