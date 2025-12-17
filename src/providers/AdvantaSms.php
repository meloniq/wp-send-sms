<?php
/**
 * AdvantaSms SMS Provider.
 *
 * @package Meloniq\WpSendSms\Providers
 */

namespace Meloniq\WpSendSms\Providers;

/**
 * AdvantaSms SMS Provider.
 */
class AdvantaSms extends AbstractProvider {

	use AdvantaSmsFields;

	/**
	 * Register settings.
	 *
	 * @return void
	 */
	public function register_settings(): void {
		// Option: API Key.
		$this->register_field_api_key();
		// Option: Partner ID.
		$this->register_field_partner_id();
		// Option: Shortcode.
		$this->register_field_shortcode();
	}

	/**
	 * Send SMS.
	 *
	 * @param string $to      Recipient phone number.
	 * @param string $message Message to send.
	 *
	 * @return array
	 */
	public function send( string $to, string $message ): array {
		$api_key    = $this->get_option( 'api_key' );
		$partner_id = $this->get_option( 'partner_id' );
		$shortcode  = $this->get_option( 'shortcode' );

		$request = wp_remote_post(
			'https://quicksms.advantasms.com/api/services/sendsms/',
			array(
				'body'    => wp_json_encode(
					array(
						'apikey'    => $api_key,
						'partnerID' => $partner_id,
						'message'   => $message,
						'shortcode' => $shortcode,
						'mobile'    => $to,
					)
				),
				'headers' => array(
					'Content-Type' => 'application/json',
				),
			)
		);

		if ( is_wp_error( $request ) ) {
			return array(
				'success' => false,
				'error'   => $request->get_error_message(),
			);
		}

		$body = wp_remote_retrieve_body( $request );
		$data = json_decode( $body, true );

		if ( ! isset( $data['responses'] ) ) {
			return array(
				'success' => false,
				'error'   => 'Invalid response.',
			);
		}

		$response = $data['responses'][0];

		if ( 200 !== $response['respose-code'] ) {
			return array(
				'success' => false,
				'error'   => $response['response-description'],
			);
		}

		return array(
			'success'    => true,
			'message_id' => $response['messageid'],
		);
	}

	/**
	 * Get provider name.
	 *
	 * @return string
	 */
	public function get_name(): string {
		return 'AdvantaSMS';
	}

	/**
	 * Get provider ID.
	 *
	 * @return string
	 */
	public function get_id(): string {
		return 'advantasms';
	}
}

/*
Documentation: https://advantasms.com/bulksms-api

Request Endpoint: https://quicksms.advantasms.com/api/services/sendsms/
Request Method: POST

Sample Request Body:
{
	"apikey":"123456789",
	"partnerID":"123",
	"message":"this is a test message",
	"shortcode":"SENDERID",
	"mobile":"254712345678"
}

Sample Response:
{
	"responses": [
		{
			"respose-code": 200,
			"response-description": "Success",
			"mobile": 254712345678,
			"messageid": 8290842,
			"networkid": "1"
		}
	]
}
*/
