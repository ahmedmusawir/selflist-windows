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

 $cookie_name_1 = "FAKE_LIST_CAT_DATA";
//  $cookie_data   = json_decode($_COOKIE[$cookie_name_1]);
 $cookie_data = base64_decode($_COOKIE[$cookie_name_1]);
// $cookie_data = unserialize($_COOKIE[$cookie_name_1], ["allowed_classes" => false]);

 echo '<pre>';
 print_r($cookie_data);
 echo '</pre>';

//  if (!is_wp_error($post_id)) {
 //   wp_send_json_success($cookie_data, 200);
 //   // wp_send_json_success(array('post_id' => $post_id, 'tax_return' => $state_city_return), 200);
 //  } else {
 //   wp_send_json_error($post_id->get_error_message());
 //  }

 // MUST FOR WP AJAX
 wp_die();

}
