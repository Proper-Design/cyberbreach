<?php
/*
 * Displays a simple contact form which sends to the site administrator
 * Can be extended with ACF fields
 * 
 * Version 2.0
 */

function proper_email_form()
{

	// Process mail if we are returning to the page after submitting the form
	proper_deliver_mail();

	$contacts_select = false;

	// this is the bit where we set recipient(s)
	// If a recipient has been posted in, use that one
	if (isset($_POST["email-recipient"])) {

		$contacts_select = false;
		$email_recipient = esc_attr($_POST["email-recipient"]);

	// Check we have ACF installed anyway (belt n braces!)
	} elseif (function_exists('get_field') && get_field('contacts')) {

		$contacts = get_field('contacts');

		if (count($contacts) > 1) {
			// if there are more than 1 names on the list we'll create a select later
			$contacts_select = true;

		} else {
			// if there's only 1, we'll just use that
			$email_recipient = $contacts[0]['contact_name'];
			$contacts_select = false;
		}

	}


	// This is the bit where we set the thanks page
	// If a thanks page has been posted in, use that one
	if (isset($_POST["thank_you"])) {

		$thank_you_page = esc_attr($_POST["thank_you"]);

	// Check we have ACF installed anyway (belt n braces!)
	} else if (function_exists('get_field') && get_field('thank_you')) {

		$thank_you_page = get_field('thank_you');

	} else {
		$thank_you_page = esc_url($_SERVER['REQUEST_URI']);
	}

	?>

<form action="<?php echo $thank_you_page; ?>" method="post">

	<?php if ($contacts_select === true) : ?>

		<div class="email-recipient">

			<label for="email-recipient">
				<?php _e('Who would you like to contact?', 'properbear') ?>
			</label>

			<select type="select" name="email-recipient" >
				<?php foreach ($contacts as $key => $contact) : ?>

					<option value="<?php echo $contact['contact_name'] ?>">
						<?php echo $contact['contact_name'] ?>
					</option>

				<?php endforeach; ?>
			</select>

		</div>

		<?php elseif(isset($email_recipient)) : ?>

			<input type="hidden" name="email-recipient" value="<?php echo $email_recipient; ?>">

		<?php endif; ?>

		<div class="sender-name">
			<label for="sender-name"><?php _e('Your Name', 'properbear') ?></label>
			<input
				type="text"
				name="sender-name"
				pattern="[a-zA-Z0-9 ]+"
				value="<?php echo (isset($_POST["sender-name"]) ? esc_attr($_POST["sender-name"]) : '') ?>"
			/>
		</div>

		<div style="display:none !important" class="contact-me-by-fax-only"> <!-- a trap for bots -->
			<label for="contact-me-by-fax-only"><?php _e('Contact by fax', 'properbear') ?></label>
			<input type="checkbox" name="contact-me-by-fax-only" value="1" tabindex="-1" autocomplete="off">
		</div>

		<div class="sender-email">
			<label for="sender-email"><?php _e('Your Email', 'properbear') ?></label>
			<input
				type="email"
				name="sender-email"
				value="<?php echo (isset($_POST["sender-email"]) ? esc_attr($_POST["sender-email"]) : '') ?>"
			/>
		</div>

		<div class="email-message">
			<label for="email-message"><?php _e('Your Message', 'properbear') ?></label>
			<textarea
				name="email-message"><?php echo (isset($_POST["email-message"]) ? esc_attr($_POST["email-message"]) : '') ?></textarea>
		</div>

		<input type="hidden" name="contact-page-id" value="<?php echo get_the_id(); ?>"/>
		<input type="submit" name="email-submitted" value="<?php _e('Send', 'properbear') ?>"/>

	</form>
<?php 
}

/*
 Function to deliver email from contact form

 TODO:
 Adapt to accept parameters to allow usage anywhere
 */

function proper_deliver_mail()
{

    // if the submit button is clicked, send the email
	if (isset($_POST['email-submitted'])) {

		// Handle bad-man bots
		$honeypot = false;
		if (!empty($_REQUEST['contact-me-by-fax-only']) && (bool)$_REQUEST['contact-me-by-fax-only'] == true) {
			$honeypot = true;
			// Treat as spambot. We're not doing anything here at the moment, but we could do if needed
			// log_spambot($_REQUEST);
		} else {

			// get the page id from the form submission
			// get all the recipients from that page's acf field
			$contact_page = $_POST["contact-page-id"];
			$contact_options = get_field('contacts', $contact_page);

			// check for an email recipient in the POST object
			if(isset($_POST["email-recipient"])){
				$email_recipient = $_POST["email-recipient"];
			}

			// test for an email address if none found, look in the recipient list
			if ( isset($email_recipient) && filter_var($email_recipient, FILTER_VALIDATE_EMAIL)) {
				$to = $email_recipient;
			}elseif(is_array($contact_options)) {

				// get the recipient in the contact options?
				$recipient_key = array_search($email_recipient, array_column($contact_options, 'contact_name'));

				if($recipient_key !== FALSE){
					$to = $contact_options[$recipient_key]['contact_email'];
				}else{
					// if the recipient isn't in the contact options, fallback to the site admin
					$to = get_option('admin_email');
				}

			}else{
				$to = get_option('admin_email');
			}


		// process as normal
		// sanitize form values
			$name = sanitize_text_field($_POST["sender-name"]);
			$email = sanitize_email($_POST["sender-email"]);
			$message = esc_textarea($_POST["email-message"]);
			$sanitized_to = sanitize_email($to);
			
			
			$subject = 'New message from ' . get_bloginfo('name');
			$headers = "From: $name <$email>" . "\r\n";

			$payload = array(
				"name" 	=> $name,
				"email" => $email,
				"msg"		=> $message,
				"to" 		=> $sanitized_to
			);

      // If email has been process for sending, display a success message
			if (wp_mail($to, $subject, $message, $headers)) {
				$_POST = array();
			}
		}
	}
}