<?php

function post_contact($request)
{
  /* 
      Request properties:
      from: required
      message: required
      to: optional - default as admin email
      subject: optional
       */
  $body = json_decode($request->get_body());

  // Google ReCaptcha
  require_once 'recaptcha/autoload.php';

  // ReCaptcha Secret Key
  $recaptcha = new \ReCaptcha\ReCaptcha('6LcM6OMUAAAAAMO5tPaKNxFvfxzcGlNnaJmIAeqK');
  // $resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')->verify($gRecaptchaResponse, $remoteIp);
  $resp = $recaptcha->setExpectedHostname()->verify($body->recaptcha, get_client_ip_server());
  if ($resp->isSuccess()) {
    // Verified!
  } else {
    $errors = $resp->getErrorCodes();
    error_log(print_r($errors, true));
    return new WP_Error('invalid_captcha', 'Invalid captcha', array('status' => 401));
  }

  $recipient = get_option('admin_email');

  $attachments = array();

  $site_title = get_bloginfo('name');

  $name = sanitize_text_field($body->{"sender_name"});
  $email = sanitize_email($body->{"sender_email"});
  $message = esc_textarea($body->{"email_message"});
  $message = nl2br("From: $name <$email> \n" . $message);
  $subject = esc_textarea($body->{"email_subject"});

  $subject = "$site_title contact: " . $subject;
  $headers[] = "From: $site_title <$recipient>";
  $headers[] = "Reply-To: $name <$email>";

  $mail_sent = wp_mail($recipient, $subject, $message, $headers, $attachments);
  if ($mail_sent) {
    // Delete the file
    if (isset($file_path)) {
      unlink($file_path);
    }
    return "Ok";
  } else {
    return new WP_Error('server_error', 'Error sending mail. Something went wrong. We don\'t know what.', array('status' => 500));
  }
}

function get_client_ip_server()
{
  $ipaddress = '';
  if ($_SERVER['HTTP_CLIENT_IP'])
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
  else if ($_SERVER['HTTP_X_FORWARDED_FOR'])
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
  else if ($_SERVER['HTTP_X_FORWARDED'])
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
  else if ($_SERVER['HTTP_FORWARDED_FOR'])
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
  else if ($_SERVER['HTTP_FORWARDED'])
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
  else if ($_SERVER['REMOTE_ADDR'])
    $ipaddress = $_SERVER['REMOTE_ADDR'];
  else
    $ipaddress = 'UNKNOWN';

  return $ipaddress;
}