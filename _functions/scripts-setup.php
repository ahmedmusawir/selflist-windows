<?php

/**
 * Enqueue scripts and styles.
 */
function cyberize_scripts()
{
 //CYBERIZE FRAMEWORK 1.0 STYLES UNIFIED & MINIFIED
 // wp_enqueue_style('cyberize-framework-1-main-style', get_template_directory_uri() . '/assets/dist/css/main.min.css', '', time());
 wp_enqueue_style('cyberize-framework-1-main-style', get_template_directory_uri() . '/assets/dist/css/main.min.css', '', 15.1);

 //CYBERIZE FRAMEWORK 1.0 STYLE.CSS - USED FOR POST PRODUCTION UPDATES ONLY
 wp_enqueue_style('cyberize-framework-1-style', get_stylesheet_uri(), '', 3.0);

 //CYBERIZE FRAMEWORK 1.0 JAVASCRIPTS UNIFIED AND MINIFIED
 wp_enqueue_script('selflist-main-js', get_template_directory_uri() . '/assets/dist/js/script.min.js', array('jquery'), time(), true);

 //COLLECTING CURRENT LOGGEDIN USER DATA FOR CHAT ENGINE
 $current_user = wp_get_current_user();
 //  echo '<pre>';
 //  print_r($current_user);
 //  print_r('Subscriber: ' . in_array('subscriber', $current_user->roles) . '<br>');
 //  print_r('Admin: ' . in_array('administrator', $current_user->roles));
 //  echo '</pre>';

 // CHECKING IF CURRENT USER IS A SUBSCRIBER ONLY
 if (in_array('subscriber', $current_user->roles)) {

  $current_user_email     = $current_user->user_email;
  $current_user_firstname = $current_user->user_firstname;
  $current_user_lastname  = $current_user->user_lastname;
 }

 wp_localize_script('selflist-main-js', 'selflistData', array(
  'root_url'               => get_site_url(),
  'ajax_url'               => admin_url('admin-ajax.php'),
  'nonce'                  => wp_create_nonce('wp_rest'),
  'currentWPUserEmail'     => $current_user_email,
  'currentWPUserFirstName' => $current_user_firstname,
  'currentWPUserLastName'  => $current_user_lastname
 ));

 if (is_singular() && comments_open() && get_option('thread_comments')) {
  wp_enqueue_script('comment-reply');
 }

 // ================= MOOSE TESTING =============
 //CYBERIZE FRAMEWORK 1.0 HMU UNIFIED AND MINIFIED
 // wp_enqueue_script('selflist-HMU-js', get_template_directory_uri() . '/assets/dist/js/HmuLinkMaker.min.js', array('jquery'), time(), true);

 // ================= END MOOSE TESTING =============

}

add_action('wp_enqueue_scripts', 'cyberize_scripts');