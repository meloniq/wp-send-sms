<?php

/**
 * Action hook to integrate with the plugin.
 *
 * @param string $phone_number The phone number to send the SMS to.
 * @param string $message The message to send.
 *
 * do_action( 'wp_send_sms_action', $phone_number, $message );
 */
add_action( 'wp_send_sms_action', 'wp_send_sms', 10, 2 );


/**
 * Send an SMS message using the WP Send SMS plugin.
 *
 * @param string $phone_number The phone number to send the SMS to.
 * @param string $message The message to send.
 *
 * @return bool
 */
function wp_send_sms( $phone_number, $message ) {
	$provider = get_option( 'wpss_provider' );
	if ( empty( $provider ) ) {
		return false;
	}

	if ( ! class_exists( $provider ) ) {
		return false;
	}

	// todo: validate phone number and message

	$provider = new $provider();
	$result   = $provider->send( $phone_number, $message );

	return $result['success'];
}
