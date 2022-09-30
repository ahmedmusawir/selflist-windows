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

 $post_args = $_POST['newPostData'];

// SETTING CATEGORY IDS ARRAY
 $cat_ids = [
  $post_args['mainCatId'],
  $post_args['primoCatId'],
  $post_args['secondoCatId'],
  $post_args['terzoCatId']
 ];

// SETTING TAXONOMY IDS ARRAY
 $tax_ids = [
  intval($post_args['stateId']),
  intval($post_args['cityId'])
 ];
// $state_id = intval($post_args['stateId']);
 // $city_id = intval($post_args['cityId']);

// PREPARING POST ARGS
 $args = [
  'post_title'    => $post_args['title'],
  'post_content'  => sanitize_text_field($post_args['content']),
  'post_status'   => $post_args['status'],
  'post_category' => $cat_ids,
  'meta_input'    => [
   'your_name'      => sanitize_text_field($post_args['name']),
   'your_phone'     => sanitize_text_field($post_args['phone']),
   'your_email'     => sanitize_text_field($post_args['email']),
   'your_site'      => sanitize_text_field($post_args['site']),
   'your_facebook'  => sanitize_text_field($post_args['facebook']),
   'your_yelp'      => sanitize_text_field($post_args['yelp']),
   'your_instagram' => sanitize_text_field($post_args['instagram']),
   'your_linkedin'  => sanitize_text_field($post_args['linkedin']),
   'your_twitter'   => sanitize_text_field($post_args['twitter']),
   'your_youtube'   => sanitize_text_field($post_args['youtube'])
  ]
 ];

//  $cookie_name  = "origin_page";
 //  $cookie_value = $origin_page;
 //  setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day

 $cookie_name_1  = "FAKE_LIST_CAT_DATA";
 $cookie_value_1 = $args;
//  $cookie_value_1 = base64_encode('ABC');
 // $cookie_value_1 = base64_encode($args);

//  $cookie_value_1 = json_encode($args);
 setcookie($cookie_name_1, serialize($cookie_value_1), time() + (86400 * 1), "/"); // 86400 = 1 day
 //  setcookie($cookie_name_1, $cookie_value_1, time() + (86400 * 1), "/"); // 86400 = 1 day

//  $cookie_data = unserialize($_COOKIE[$cookie_name_1]);
 // $cookie_data = unserialize($_COOKIE[$cookie_name_1], ["allowed_classes" => false]);

//  $cookie_name_2  = "FAKE_LIST_SITUS_DATA";
 //  $cookie_value_2 = $tax_ids;
 //  setcookie($cookie_name_2, $cookie_value_2, time() + (86400 * 1), "/"); // 86400 = 1 day

//  $cookie_name_3  = "FAKE_LIST_USER_DATA";
 //  $cookie_value_3 = $args;
 //  setcookie($cookie_name_3, $cookie_value_3, time() + (86400 * 1), "/"); // 86400 = 1 day

 if (!is_wp_error($post_id)) {
  wp_send_json_success(array($cat_ids, $tax_ids, $args, $cookie_data), 200);
  // wp_send_json_success(array('post_id' => $post_id, 'tax_return' => $state_city_return), 200);
 } else {
  wp_send_json_error($post_id->get_error_message());
 }

 // MUST FOR WP AJAX
 wp_die();

}
