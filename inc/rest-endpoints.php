<?php

add_action('rest_api_init', function () {
  register_rest_route('endo-cymru/v1', '/contact', array(
    'methods' => 'POST',
    'args' => array(), // Some of the validation below might well want to happen here. But is hasn't for the minute ¯\_(ツ)assets/¯
    'callback' => 'post_contact',
    'permission_callback' => true
  ));
});