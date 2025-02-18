<?php
namespace Meloniq\WpSendSms;

class EasySendSms extends AbstractProvider {

	use EasySendSmsFields;

	/**
	 * Register settings.
	 *
	 * @return void
	 */
	protected function register_settings() : void {
		// Option: API Key.
		$this->register_field_api_key();
		// Option: Sender Name.
		$this->register_field_sender_name();
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
		$sender_name = $this->get_option( 'sender_name' );

		$request = wp_remote_post(
			'https://restapi.easysendsms.app/v1/rest/sms/send',
			array(
				'body' => wp_json_encode(
					array(
						'from' => $sender_name,
						'to'   => $to,
						'text' => $message,
						'type' => '0',
					)
				),
				'headers' => array(
					'apikey'       => $api_key,
					'Content-Type' => 'application/json',
					'Accept'       => 'application/json',
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

		if ( 'OK' !== $data['status'] ) {
			return array(
				'success' => false,
				'error'   => $data['description'],
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
		return 'EasySendSMS';
	}

	/**
	 * Get provider ID.
	 *
	 * @return string
	 */
	public function get_id() : string {
		return 'easysendsms';
	}

}

/*
Service: https://www.easysendsms.com/economics-routes - 0.09 USD per SMS
Documentation: https://github.com/EasySendSMS/REST-API-v1
Dashboard: https://my.easysendsms.app/index

curl -X POST \
-H "apikey: YOUR_API_KEY" \
-H "Content-Type: application/json" \
-H "Accept: application/json" \
-d '{
    "from": "YourSenderName",
    "to": "12345678900,19876543210",
    "text": "Hello, this is a test message!",
    "type": "0"
}' \
"https://restapi.easysendsms.app/v1/rest/sms/send"

200
{
    "status": "OK",
    "scheduled": "Now",
    "messageIds": [
        "OK: 69991a73-a560-429f-9c5a-3251dc1522bb"
    ]
}

400
{
    "error": 4012,
    "description": "Invalid mobile number."
}

Code	Description	HTTP Status
4001	One or more required parameters are missing.	400
4002	No API key found in request.	401
4003	Invalid API Key.	401
4004	Invalid IP address.	403
4005	Inactive API Key.	403
4006	Inactive Account.	403
4007	Demo Account Expired.	403
4008	Internal error (do NOT re-submit the same request again).	500
4009	Service not available (do NOT re-submit the same request again).	503
4010	Invalid type parameter.	400
4011	Invalid message.	400
4012	Invalid mobile number.	400
4013	Too many recipients.	400
4014	Invalid sender name.	400
4015	Insufficient credits.	402
4016	Country / network not available.	400
4017	Invalid scheduled datetime format or scheduled time is in the past.	400
405	Method not allowed.	405
415	Unsupported Media Type.	415
*/
