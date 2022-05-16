<?php

add_action('wp_mail_failed', function ($e) {
  error_log(print_r($e, true));
}, 10);

function proper_send_mail()
{
  /* 
      Request properties:
      from: required
      message: required
      to: optional - default as admin email
      subject: optional
       */

  $recipient = get_option('admin_email');

  $attachments = array();

  $site_title = apply_filters("the_title", get_bloginfo('name'));

  $name = sanitize_text_field($_REQUEST["sender_name"]);
  $email = sanitize_email($_REQUEST["sender_email"]);
  $message = esc_textarea($_REQUEST["email_message"]);
  $message = nl2br("From: $name <$email> \n" . $message);
  $subject = esc_textarea($_REQUEST["email_subject"]);

  $subject = "$site_title contact: " . $subject;
  $headers[] = "From: $site_title <$recipient>";
  $headers[] = "Reply-To: $name <$email>";

  $mail_sent = wp_mail($recipient, $subject, $message, $headers, $attachments);
  if ($mail_sent) {

    wp_send_json_success('Message Sent');
  } else {
    wp_send_json_error("Error sending message");
  }
}

add_action('wp_ajax_proper_send_mail', 'proper_send_mail');
add_action('wp_ajax_nopriv_proper_send_mail', 'proper_send_mail');