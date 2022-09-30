<?php
/**
 * THIS ADDS INITIAL 10 FREE POINTS DURING MEMBER SIGNUP USING GRAVITY REG FORM
 */

function add_signup_customer_points($user_id, $feed, $entry, $user_pass)
{

 $new_customer_point  = 1000;
 $new_customer_points = $entry['5'];

 // SETTING INITIAL MEMBER POINTS
 // Will return false if the previous value is the same as $new_value.
 $points_updated = update_user_meta($user_id, 'selflist_points', $new_customer_points);
// $points_updated = update_user_meta($user_id, 'selflist_points', $new_customer_point);

 // $points_updated = update_user_meta( $user_id, 'selflist_points', 10 );

 GFCommon::log_debug(__METHOD__ . '(): entry => ' . print_r($entry, true));
 GFCommon::log_debug(__METHOD__ . '(): MOOSE POINTS => ' . print_r($new_customer_points, true));
 GFCommon::log_debug(__METHOD__ . '(): MOOSE POINTS UPDATED => ' . print_r($points_updated, true));

// ----------------------------------------------
 //  COLLECTING USER DATA FROM COOKIE
 // ----------------------------------------------

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

//  UPDATING CURRENTLY SIGNED UP MEMEBERS PROFILE DATA
 $phone_updated     = update_user_meta($user_id, 'your_profile_phone', $phone);
 $site_updated      = update_user_meta($user_id, 'your_profile_site', $site);
 $facebook_updated  = update_user_meta($user_id, 'your_profile_facebook', $facebook);
 $yelp_updated      = update_user_meta($user_id, 'your_profile_yelp', $yelp);
 $instagram_updated = update_user_meta($user_id, 'your_profile_instagram', $instagram);
 $linkedin_updated  = update_user_meta($user_id, 'your_profile_linkedin', $linkedin);
 $twitter_updated   = update_user_meta($user_id, 'your_profile_twitter', $twitter);
 $youtube_updated   = update_user_meta($user_id, 'your_profile_youtube', $youtube);

 // DELETING USER_DATA COOKIE
 $cookie_name = 'USER_DATA';
 unset($_COOKIE[$cookie_name]);
 setcookie($cookie_name, '', time() - 3600, '/');

 GFCommon::log_debug(__METHOD__ . '(): USER PHONE => ' . print_r($phone, true));

}

add_action('gform_user_registered', 'add_signup_customer_points', 10, 4);
