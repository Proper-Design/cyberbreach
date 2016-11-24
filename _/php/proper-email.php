<?php
/*
 Displays a simple contact form
 */

function proper_email_form() {

	// Process mail if we are returning to the page after submitting the form
	proper_deliver_mail();


	// this is the bit where we set recipient(s)
	// If a recipient has been posted in, use that one
	if(isset( $_POST["email-recipient"])){

		$contacts_select = false;
		$email_recipient = esc_attr( $_POST["email-recipient"] );

	// Check we have ACF installed anyway (belt n braces!)
	}elseif(function_exists('get_field') && get_field('contacts')){

		$contacts = get_field('contacts');

		if( count($contacts) > 1 ){
			// if there are more than 1 names on the list we'll create a select later
			$contacts_select = true;

		}else{
			// if there's only 1, we'll just use that
			$contacts_select = false;
			$email_recipient = $contacts[0]['contact_email'];
		}

	}else{
		// if not we'll just the site default
		$contacts_select = false;
		$email_recipient = get_option( 'admin_email' );;
	}


	// This is the bit where we set the thanks page
	// If a thanks page has been posted in, use that one
	if(isset( $_POST["thank_you"])){

		$thank_you_page = esc_attr( $_POST["thank_you"] );

	// Check we have ACF installed anyway (belt n braces!)
	}else if(function_exists('get_field') && get_field('thank_you')){

		$thank_you_page = get_field('thank_you');

	}else{
		$thank_you_page = esc_url( $_SERVER['REQUEST_URI'] );
	}

?>

<form action="<?php echo $thank_you_page; ?>" method="post">

	<?php if($contacts_select): ?>

		<div class="email-recipient">

			<label for="email-recipient">
				<?php _e('Who would you like to contact?','properbear') ?>
			</label>

			<select type="select" name="email-recipient" >
				<?php foreach ($contacts as $key => $contact): ?>

					<option value="<?php echo $contact['contact_email']?>">
						<?php echo $contact['contact_name']?>
					</option>

				<?php endforeach; ?>
			</select>

		</div>

		<?php else: ?>

			<input type="hidden" name="email-recipient" value="<?php echo $email_recipient;?>">

		<?php endif; ?>

		<div class="sender-name">
			<label for="sender-name"><?php _e('Your Name','properbear') ?></label>
			<input
				type="text"
				name="sender-name"
				pattern="[a-zA-Z0-9 ]+"
				value="<?php echo ( isset( $_POST["sender-name"] ) ? esc_attr( $_POST["sender-name"] ) : '' ) ?>"
			/>
		</div>

		<div class="sender-email">
			<label for="sender-email"><?php _e('Your Email','properbear') ?></label>
			<input
				type="email"
				name="sender-email"
				value="<?php echo ( isset( $_POST["sender-email"] ) ? esc_attr( $_POST["sender-email"] ) : '' ) ?>"
			/>
		</div>

		<div class="email-message">
			<label for="email-message"><?php _e('Your Message','properbear') ?></label>
			<textarea
				name="email-message"><?php echo( isset( $_POST["email-message"] ) ? esc_attr( $_POST["email-message"] ) : '' ) ?></textarea>
		</div>

		<input type="submit" name="email-submitted" value="<?php _e('Send','properbear') ?>"/>

	</form>
<?php }

/*
 Function to deliver email from contact form

 TODO:
 Adapt to accept parameters to allow usage anywhere
 */

function proper_deliver_mail() {

    // if the submit button is clicked, send the email
    if ( isset( $_POST['email-submitted'] ) ) {

        // sanitize form values
        $name    = sanitize_text_field( $_POST["sender-name"] );
        $email   = sanitize_email( $_POST["sender-email"] );
        $message = esc_textarea( $_POST["email-message"] );
        $to      = sanitize_email( $_POST["email-recipient"] );

        $subject = 'New message from ' . get_bloginfo( 'name' );


        $headers = "From: $name <$email>" . "\r\n";

        // If email has been process for sending, display a success message
        if ( wp_mail( $to, $subject, $message, $headers ) ) {
        	$_POST = array();
        }
    }
}