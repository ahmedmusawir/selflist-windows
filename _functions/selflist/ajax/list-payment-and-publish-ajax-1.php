<?php
/**
 * LIST PAYMENT & PUBLISH AJAX
 */

// SETTING UP WP CRON
add_action('UNLIST_event', 'unlist_listing_now', 10, 1);

function unlist_listing_now($post_id)
{
    // Updating List status to Pending after it hits expiration
    $args = array(
        'post_type' => 'post',
        'ID' => $post_id,
        'post_status' => 'pending',
    );

    $post_update_status = wp_update_post($args);

    // UPDATE THE CAT DATA JSON FILE [This updates the List Count number]
    // This function is from: _functions/selflist/selflist-get-category-json.php
    get_selflist_main_cats_to_json();
}

// add_action('wp_ajax_nopriv_list_payment_and_publish_ajax', 'list_payment_and_publish_ajax');
add_action('wp_ajax_list_payment_and_publish_ajax', 'list_payment_and_publish_ajax');

function list_payment_and_publish_ajax()
{

    $post_id = $_POST['currentPostId'];
    $payment_points = $_POST['newPaymentPoints'];
    $publish_days = $_POST['newPaymentPoints'];
    $current_user_id = get_current_user_id();
    $current_available_user_points = get_field('selflist_points', 'user_' . $current_user_id);
    // USER POINTS AFTER PAYMENT
    $post_payment_user_points = $current_available_user_points - $payment_points;

    // UPDATE USER POINTS
    // Will return false if the previous value is the same as $new_value.
    $points_updated = update_user_meta($current_user_id, 'selflist_points', $post_payment_user_points);

    // UPDATE LIST STATUS FROM PENDING TO PUBLISH
    if ($points_updated === true) {
        $args = array(
            'post_type' => 'post',
            'ID' => $post_id,
            'post_status' => 'publish',
        );

        $post_update_status = wp_update_post($args);

        // SETTING PAYMENT POINTS AS MINUTES
        $number_of_days = $publish_days;

        // SETTING LISTING EXPIRITION TIME WITH WP CRON [Based on number of days or points]
        wp_schedule_single_event(time() + $number_of_days * 60 * 60, 'UNLIST_event', [$post_id]);
        // wp_schedule_single_event(time() + $number_of_days * 60 * 60 * 24, 'UNLIST_event', [$post_id]);
        // wp_schedule_single_event( $timestamp:integer, $hook:string, $args:array )
    }

    // NEW CAT SET ARRAY
    $list_payment_data_array = array(
        'post_id' => $post_id,
        'payment_points' => $payment_points,
        'publish_days' => $payment_points,
        'current_user_id' => $current_user_id,
        'current_user_points' => $current_available_user_points,
        'post_payment_points' => $post_payment_user_points,
        'points_update_success' => $points_updated,
        'post_update_status' => $post_update_status,
    );

    // UPDATE THE CAT DATA JSON FILE [This updates the List Count number]
    // This function is from: _functions/selflist/selflist-get-category-json.php
    get_selflist_main_cats_to_json();

    // SENDING JSON OBJECT
    wp_send_json($list_payment_data_array);

    wp_die();

}