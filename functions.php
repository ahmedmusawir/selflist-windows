<?php
/**
 * Theme Setup Functions
 */
require get_template_directory() . '/_functions/theme-setup.php';

/**
 * Widget Setup Functions
 */
require get_template_directory() . '/_functions/widget-setup.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/_functions/scripts-setup.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
 require get_template_directory() . '/inc/jetpack.php';
}

/*======================================
=            MOOSE INCLUDES            =
======================================*/

/**
 * Bootstrap 4 Nav Walker
 */
// require get_template_directory() . '/_functions/bootstrap-navwalker.php';
// require get_template_directory() . '/_functions/moose-navwalker.php';
/**
 * Helper Functions
 */
require get_template_directory() . '/_functions/helpers-setup.php';

/**
 *
 * React App Setup
 *
 */
// require get_template_directory() . '/_functions/react-setup.php';

/**
 *
 * Adding Breadcrums
 *
 */

// require get_template_directory() . '/_functions/breadcrum-function.php';

/**
 *
 * CUSTOMIZING THE LOGIN SCREEN
 *
 */

require get_template_directory() . '/_functions/selflist/wp-admin/wp-logon-screen.php';

/**
 * SELFLIST CUSTOM FUNCTIONS
 */
// TEST SECTION ... REMEMBER TO COMMENT OUT WHEN DONE

// require get_theme_file_path('/_functions/selflist/ajax/test-ajax.php');
// require get_theme_file_path('/_functions/selflist/selflist-create-categories.php');
// require get_theme_file_path('/_functions/selflist/ajax/test-flag-ajax.php');

// CUSTOM REST ROUTE FOR LISTING 1ST PROTOTYPE
// require get_theme_file_path('/_functions/selflist/selflist-search-route.php');

// SELFLIST CUSTOM POST TYPE 1ST PROTOTYPE
// require get_theme_file_path('/_functions/selflist/selflist-listing-cpt.php');

// SELFLIST CUSTOM USER ROLES & PERMISSIONS
// require get_theme_file_path('/_functions/selflist/selflist-user-roles.php');

// SELFLIST SUB CATEGORIES LISTING FUNCTION
require get_theme_file_path('/_functions/selflist/selflist-get-category-list.php');

//Getting Main Categories with Sub Cats to JSON - selflist-get-subcats-json.php IS A DEPENDENCY
require get_theme_file_path('/_functions/selflist/selflist-get-category-json.php');
//Getting Sub Categories
require get_theme_file_path('/_functions/selflist/selflist-get-subcats-json.php');

// SELFLIST SUB CATEGORIES LISTING FUNCTION
require get_theme_file_path('/_functions/selflist/selflist-post-acf-to-rest.php');
// SELFLIST SET CUSTOM POST TITLE WITH ID
// require get_theme_file_path('/_functions/selflist/selflist-post-title.php');

// SELFTLIST CREATE CATEGORIES
require get_theme_file_path('/_functions/selflist/ajax/main-cat-insert-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/primo-cat-insert-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/secondo-cat-insert-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/terzo-cat-insert-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/list-preview-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/list-payment-and-publish-ajax.php');
require get_theme_file_path('/_functions/selflist/rest/category-to-rest.php');

// SELFLIST CUSTOM TAXONOMY & CATEGORIES
require get_theme_file_path('/_functions/selflist/taxonomy/selflist-create-taxonomy.php');
require get_theme_file_path('/_functions/selflist/taxonomy/selflist-cat-list-w-links.php');
require get_theme_file_path('/_functions/selflist/taxonomy/selflist-cat-list-wo-links.php');
// SELFLIST WITH WOOCOM
require get_theme_file_path('/_functions/selflist/woocom/style-checkout-w-bootstrap.php');
require get_theme_file_path('/_functions/selflist/woocom/add-points-to-member.php');
require get_theme_file_path('/_functions/selflist/woocom/general-helpers.php');
// SELFLIST WITH GRAVITY FORMS
require get_theme_file_path('/_functions/selflist/gravity/add-signup-customer-points.php');
require get_theme_file_path('/_functions/selflist/gravity/hmu-multi-email-send.php');

// THIS UPDATES THE CATEGORY JSON FILE MANUALLY
// require get_theme_file_path('/_functions/selflist/taxonomy/selflist-auto-update-cat-json.php');

// DISPLAY STATES & CITIES & COUNTRY IN CATEGORY.PHP PAGE TOP MENU
require get_theme_file_path('/_functions/selflist/city_state/get_city_state.php');
require get_theme_file_path('/_functions/selflist/city_state/make_state_country_dropdown.php');
require get_theme_file_path('/_functions/selflist/rest/city-state-to-rest.php');
require get_theme_file_path('/_functions/selflist/ajax/city-state-filter-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/city-insert-ajax.php');

// MAIN LIST INSERT: HAD TO BE RE-WRITTEN DUE TO TAX_INPUT NOT WORKING. USING PHP NOW INSTEAD OF REST
require get_theme_file_path('/_functions/selflist/ajax/list-insert-ajax.php');

// DELSIT AJAX
require get_theme_file_path('/_functions/selflist/ajax/delist-status-update-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/relist-data-update-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/delete-list-permanently-ajax.php');

// MEMBER PROFILE DATA INSERT AJAX
require get_theme_file_path('/_functions/selflist/ajax/profile-data-insert-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/profile_pass_update_ajax.php');

// FLAG RELATED
require get_theme_file_path('/_functions/selflist/cpt/flag-post-type.php');
require get_theme_file_path('/_functions/selflist/cpt/blog-post-type.php');
require get_theme_file_path('/_functions/selflist/ajax/list-flag-ajax.php');

// SETTING UP CRON
// require get_theme_file_path('/_functions/selflist/wp-cron/wp-cron-test.php');
require get_theme_file_path('/_functions/selflist/wp-cron/selflist-auto-point-add-monthly.php');
// WP ADMIN LEFT MENU RELATED
require get_theme_file_path('/_functions/selflist/wp-admin/menu-change-post-to-list.php');
// WP ADMIN NOTIFICATION AFTER POST PUBLISH
require get_theme_file_path('/_functions/selflist/wp-admin/send-notification-at-list-publish.php');
// WP COMMENT NON LOGGED IN NOTICE
require get_theme_file_path('/_functions/selflist/wp-admin/comments-message-update.php');
// WP ADMIN USER LOGIN REDIRECTS (ADMIN BAR, LOGIN/LOGOUT BTN, REDIRECTION ETC.)
require get_theme_file_path('/_functions/selflist/wp-admin/user-logins.php');
// WP ADMIN USER MANUAL LOGOUT OR EXIT BUTTON
require get_theme_file_path('/_functions/selflist/wp-admin/manual-login-logout.php');

// PAGE REDICTION AND COOKIE MAKING AJAX ETC.
require get_theme_file_path('/_functions/selflist/ajax/make-cookie-and-redirect-ajax.php');
require get_theme_file_path('/_functions/selflist/ajax/make-cookie-and-redirect-ajax-test.php');

// AUTO LOGIN: NO LONGER USING THE AUTO LOGIN PLUGIN
// require get_theme_file_path('/_functions/selflist/wp-admin/signup-redirection.php');

// ============================ TESTING ===================================

// function run_JS_on_logout()
// {
//  function wpdocs_theme_name_scripts()
//  {

//   //CYBERIZE FRAMEWORK 1.0 HMU UNIFIED AND MINIFIED
//   wp_enqueue_script('MooseTest-js', get_template_directory_uri() . '/assets/dist/js/MooseTest.js', array('jquery'), time(), true);
//  }

//  add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');

// }

// add_action('wp_logout', 'run_JS_on_logout');

// ============================ TESTING ===================================