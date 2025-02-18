<?php
namespace Meloniq\WpSendSms;

class HttpSms extends AbstractProvider {

	use HttpSmsFields;

	/**
	 * Register settings.
	 *
	 * @return void
	 */
	protected function register_settings() : void {
		// Option: API Key.
		$this->register_field_api_key();
		// Option: From.
		$this->register_field_from();
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
		$from    = $this->get_option( 'from' );

		$request = wp_remote_post(
			'https://api.httpsms.com/v1/messages/send',
			array(
				'body' => wp_json_encode(
					array(
						'content'   => $message,
						'encrypted' => false,
						'from'      => $from,
						'to'        => $to,
					)
				),
				'headers' => array(
					'x-api-Key'    => 'ApiKeyAuth ' . $api_key,
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
		return 'httpSMS';
	}

	/**
	 * Get provider ID.
	 *
	 * @return string
	 */
	public function get_id() : string {
		return 'httpsms';
	}

}

/*
Service: https://httpsms.com/
Documentation: https://docs.httpsms.com/

Request Endpoint: https://api.httpsms.com/v1/messages/send
Request Method: POST

encrypted - Encrypted is used to determine if the content is end-to-end encrypted. Make sure to set the encryption key on the httpSMS mobile app
request_id - RequestID is an optional parameter used to track a request from the client's perspective
send_at - SendAt is an optional parameter used to schedule a message for sending at a later time

curl -L \
  -X POST \
  -H 'x-api-Key: ApiKeyAuth <apiKey>' \
  -H 'Content-Type: application/json' \
  'https://api.httpsms.com/v1/messages/send' \
  -d '{
  "content":"This is a sample text message",
  "encrypted":false,
  "from":"+18005550199",
  "request_id":"153554b5-ae44-44a0-8f4f-7bbac5657ad4",
  "send_at":"2022-06-05T14:26:09.527976+03:00",
  "to":"+18005550100"
  }'

200
{
  "data": {
    "can_be_polled": false,
    "contact": "+18005550100",
    "content": "This is a sample text message",
    "created_at": "2022-06-05T14:26:02.302718+03:00",
    "delivered_at": "2022-06-05T14:26:09.527976+03:00",
    "encrypted": false,
    "expired_at": "2022-06-05T14:26:09.527976+03:00",
    "failed_at": "2022-06-05T14:26:09.527976+03:00",
    "failure_reason": "UNKNOWN",
    "id": "32343a19-da5e-4b1b-a767-3298a73703cb",
    "last_attempted_at": "2022-06-05T14:26:09.527976+03:00",
    "max_send_attempts": 1,
    "order_timestamp": "2022-06-05T14:26:09.527976+03:00",
    "owner": "+18005550199",
    "received_at": "2022-06-05T14:26:09.527976+03:00",
    "request_id": "153554b5-ae44-44a0-8f4f-7bbac5657ad4",
    "request_received_at": "2022-06-05T14:26:01.520828+03:00",
    "scheduled_at": "2022-06-05T14:26:09.527976+03:00",
    "scheduled_send_time": "2022-06-05T14:26:09.527976+03:00",
    "send_attempt_count": 0,
    "send_time": 133414,
    "sent_at": "2022-06-05T14:26:09.527976+03:00",
    "sim": "DEFAULT",
    "status": "pending",
    "type": "mobile-terminated",
    "updated_at": "2022-06-05T14:26:10.303278+03:00",
    "user_id": "WB7DRDWrJZRGbYrv2CKGkqbzvqdC"
  },
  "message": "item created successfully",
  "status": "success"
}

400
{
  "data": "The request body is not a valid JSON string",
  "message": "The request isn't properly formed",
  "status": "error"
}

401
{
  "data": "Make sure your API key is set in the [X-API-Key] header in the request",
  "message": "You are not authorized to carry out this request.",
  "status": "error"
}

422
{
  "data": {
    "ANY_ADDITIONAL_PROPERTY": [
      "text"
    ]
  },
  "message": "validation errors while sending message",
  "status": "error"
}

500
{
  "message": "We ran into an internal error while handling the request.",
  "status": "error"
}

*/
