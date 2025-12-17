<?php
/**
 * Integration with WP Send SMS plugin.
 *
 * @package Meloniq\WpSendSms\Integration
 */

/**
 * Action hook to integrate with the plugin.
 *
 * @param string $phone_number The phone number to send the SMS to.
 * @param string $message      The message to send.
 * @param string $country_code The country code to use for the phone number.
 *
 * do_action( 'wp_send_sms_action', $phone_number, $message, $country_code );
 */
add_action( 'wp_send_sms_action', 'wp_send_sms', 10, 3 );


/**
 * Send an SMS message using the WP Send SMS plugin.
 *
 * @param string $phone_number The phone number to send the SMS to.
 * @param string $message      The message to send.
 * @param string $country_code The country code to use for the phone number.
 *
 * @return bool
 */
function wp_send_sms( $phone_number, $message, $country_code = '' ) {
	$provider_name = get_option( 'wpss_provider' );
	if ( empty( $provider_name ) ) {
		return false;
	}

	$provider_class = "Meloniq\WpSendSms\Providers\\$provider_name";
	if ( ! class_exists( $provider_class ) ) {
		return false;
	}

	// Get the default country code if not provided.
	if ( empty( $country_code ) ) {
		$country_code = get_option( 'wpss_country_code' );
	}

	// Validate the country code.
	$country_code_details = Meloniq\WpSendSms\CountryCodes::get_country_code_details( $country_code );
	if ( empty( $country_code_details ) ) {
		return false;
	}

	// Format the phone number.
	$phone_number = Meloniq\WpSendSms\Utils::standardize_phone_number( $phone_number, $country_code );
	if ( empty( $phone_number ) ) {
		return false;
	}

	// Check if the phone number is valid for the given country code.
	$phone_number_length = strlen( $phone_number );
	if ( $phone_number_length !== $country_code_details['length'] ) {
		return false;
	}

	// Add the country code to the phone number.
	$phone_number = $country_code . $phone_number;

	// todo: validate message.

	$provider = new $provider_class();
	$result   = $provider->send( $phone_number, $message );

	if ( ! $result['success'] && ! empty( $result['error'] ) ) {
		set_transient(
			'wpss_send_sms_last_error',
			array(
				'success' => false,
				'message' => $result['error'],
			),
			60
		);
	}

	return $result['success'];
}
