<?php
/**
 * INSERT MULTI LEVEL ALL CATEGORIES WITH AJAX
 */

// FOR NON LOGGED IN USERS
add_action('wp_ajax_nopriv_make_cookie_and_redirect_ajax_test', 'make_cookie_and_redirect_ajax_test');
// FOR LOGGED IN USERS
add_action('wp_ajax_make_cookie_and_redirect_ajax_test', 'make_cookie_and_redirect_ajax_test');

function make_cookie_and_redirect_ajax_test()
{
 $origin_page = $_POST['newPostData'];

 $cookie_name  = "origin_page";
 $cookie_value = $origin_page;
 setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day

// USER DATA ARRAY
 $user_data = [];

// ENTERING CURRENTLY SIGNED UP USER'S PERSONAL DATA INTO WP DB
 foreach ($_COOKIE['USER_DATA'] as $name => $value) {
  // ADDING COOKIE DATA TO AN ARRAY
  $user_data[$name] = $value;
  // echo "$name : $value <br />";
 }

 $phone     = $user_data['user_phone'];
 $site      = $user_data['user_site'];
 $facebook  = $user_data['user_facebook'];
 $yelp      = $user_data['user_yelp'];
 $instagram = $user_data['user_instagram'];
 $linkedin  = $user_data['user_linkedin'];
 $twitter   = $user_data['user_twitter'];
 $youtube   = $user_data['user_youtube'];

//  echo '<pre>';
 //  print_r($user_data);
 //  echo '</pre>';

 wp_send_json_success([$phone, $site, $facebook, $yelp, $instagram, $linkedin, $twitter, $youtube], 200);
// wp_send_json_success([$user_data, $phone, $site, $facebook], 200);

 // MUST FOR WP AJAX
 wp_die();

}