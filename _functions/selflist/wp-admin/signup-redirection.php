<?php
// FOLLOWING WORKS FOR ONLY USER SIGNUP OR REGISTRATION
// For the login redirection see: _functions/selflist/wp-admin/user-logins.php

function auto_login_new_user($user_id)
{
 // CHECKING FOR COOKIE
 $cookie_name = 'origin_page';

 if (isset($_COOKIE[$cookie_name])) {
  $redirect_target = $_COOKIE[$cookie_name];
  // REMOVING COOKIE
  unset($_COOKIE[$cookie_name]);
  setcookie($cookie_name, '', time() - 3600, '/'); // empty value and old timestamp
 }

// MAKING AUTO LOGIN
 wp_set_current_user($user_id);
 wp_set_auth_cookie($user_id);
 // ALL SUBSCRIBERS REDIRECTION BY COOKIE
 if ($redirect_target == 'fake-list-page') {
  // IF COMING FROM FAKE LIST PAGE REDIRECTING TO THE REAL LIST PAGE
  wp_redirect("/list-insert/");
 } else {
  // IF COMING FROM ANY OTHER PAGE REDIRECTING TO THE MEMBER PROFILE PAGE
  wp_redirect("/list-customer-home/");
 }
 exit();
}

add_action('user_register', 'auto_login_new_user');