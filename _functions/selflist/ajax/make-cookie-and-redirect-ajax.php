<?php
/**
 * INSERT MULTI LEVEL ALL CATEGORIES WITH AJAX
 */

// FOR NON LOGGED IN USERS
add_action('wp_ajax_nopriv_make_cookie_and_redirect_ajax', 'make_cookie_and_redirect_ajax');
// FOR LOGGED IN USERS
add_action('wp_ajax_make_cookie_and_redirect_ajax', 'make_cookie_and_redirect_ajax');

function make_cookie_and_redirect_ajax()
{
 $origin_page = $_POST['newPostData'];

 $cookie_name  = "origin_page";
 $cookie_value = $origin_page;
 setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day

 // MUST FOR WP AJAX
 wp_die();

}