<?php
namespace Meloniq\WpSendSms\Providers;

class Unimatrix extends AbstractProvider {

	use UnimatrixFields;

	/**
	 * Register settings.
	 *
	 * @return void
	 */
	public function register_settings() : void {
		// Option: API Key.
		$this->register_field_api_key();
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
		$api_key = $this->get_option( 'api_key' );

		$request = wp_remote_post(
			'https://api.unimtx.com/?action=sms.message.send&accessKeyId=' . $api_key,
			array(
				'body' => wp_json_encode(
					array(
						'to'   => $to,
						'text' => $message,
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

		if ( ! isset( $data['code'] ) ) {
			return array(
				'success' => false,
				'error'   => 'Invalid response.',
			);
		}

		if ( '0' !== $data['code'] ) {
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
		return 'Unimatrix';
	}

	/**
	 * Get provider ID.
	 *
	 * @return string
	 */
	public function get_id() : string {
		return 'unimatrix';
	}

}

/*
Service: https://www.unimtx.com/sms/ke - 0.074 USD per SMS

curl -X POST 'https://api.unimtx.com/?action=sms.message.send&accessKeyId=YOUR_ACCESS_KEY_ID' \
-H 'Content-Type: application/json' \
-d '{
  "to": "+12068800xxx",
  "text": "Your verification code is 204806."
}'

200
{
  "code": "0",
  "message": "Success",
  "data": {
    "recipients": 1,
    "messageCount": 1,
    "totalAmount": "0.018900",
    "messages": [
      {
        "id": "c9159d19f394833327e43c8e7285a6b3",
        "to": "+12068800123",
        "iso": "US",
        "cc": "1",
        "parts": 1,
        "price": "0.018900"
      }
    ]
  }
}

400
{
  "code": "105400",
  "message": "InsufficientFunds"
}
*/


