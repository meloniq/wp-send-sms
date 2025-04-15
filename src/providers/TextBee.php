<?php
namespace Meloniq\WpSendSms\Providers;

class TextBee extends AbstractProvider {

	use TextBeeFields;

	/**
	 * Register settings.
	 *
	 * @return void
	 */
	public function register_settings() : void {
		// Option: API Key.
		$this->register_field_api_key();
		// Option: Device ID.
		$this->register_field_device_id();
		// Doc URL to the API.
		$this->register_field_doc_url();
	}

	/**
	 * Send SMS.
	 *
	 * @param string $to      Recipient phone number.
	 * @param string $message Message to send.
	 *
	 * @return array
	 */
	public function send( string $to, string $message ) : array {
		$api_key    = $this->get_option( 'api_key' );
		$device_id  = $this->get_option( 'device_id' );

		$request = wp_remote_post(
			'https://api.textbee.dev/api/v1/gateway/devices/' . $device_id . '/send-sms',
			array(
				'body' => wp_json_encode(
					array(
						'recipients' => array( $to ),
						'message'    => $message,
					)
				),
				'headers' => array(
					'x-api-key'    => $api_key,
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

		if ( ! isset( $data['status'] ) ) {
			return array(
				'success' => false,
				'error'   => 'Invalid response.',
			);
		}

		if ( 'success' !== $data['status'] ) {
			return array(
				'success' => false,
				'error'   => $data['message'],
			);
		}

		return array(
			'success' => true,
		);
	}

	/**
	 * Get provider name.
	 *
	 * @return string
	 */
	public function get_name() : string {
		return 'TextBee';
	}

	/**
	 * Get provider ID.
	 *
	 * @return string
	 */
	public function get_id() : string {
		return 'textbee';
	}

}

/*
Service: https://textbee.dev/
Documentation: https://github.com/vernu/textbee/tree/main

Request Endpoint: https://api.textbee.dev/api/v1/gateway/devices/YOUR_DEVICE_ID/send-sms
Request Method: POST

Curl command to send an SMS message via the REST API:

curl -X POST "https://api.textbee.dev/api/v1/gateway/devices/YOUR_DEVICE_ID/send-sms" \
  -H 'x-api-key: YOUR_API_KEY' \
  -H 'Content-Type: application/json' \
  -d '{
    "recipients": [ "+251912345678" ],
    "message": "Hello World!"
  }'
*/
