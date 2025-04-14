<?php
namespace Meloniq\WpSendSms;

class Utils {

	/**
	 * Remove non-ASCII characters from a string.
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public static function remove_non_ascii( string $string ) : string {
		return preg_replace( '/[^\x20-\x7E]/', '', $string );
	}

	/**
	 * Split long messages into multiple SMS.
	 * Each SMS can contain up to 160 characters.
	 *
	 * @param string $message
	 * @param int $max_length
	 *
	 * @return array
	 */
	public static function split_message( string $message, int $max_length = 160 ) : array {
		$messages = [];
		$length   = strlen( $message );
		$part_max_length = $max_length - 12; // prefix "..."; suffix "... 1/12"

		if ( $length <= $max_length ) {
			$messages[] = $message;
		} else {
			// Split the message into parts.
			// TODO: Prevent splitting words.
			$parts = str_split( $message, $part_max_length );
			$part_count = count( $parts );
			$part_number = 1;

			foreach ( $parts as $part ) {
				// Add the prefix to the part.
				if ( $part_number > 1 ) {
					$part = '...' . $part;
				}
				// Add the suffix to the part.
				$part .= '... ' . $part_number . '/' . $part_count;

				$messages[] = $part;
				$part_number++;
			}
		}

		return $messages;
	}

	/**
	 * Phone number standardization.
	 * Add the country code if it is missing.
	 * Remove the leading zero if it is present.
	 *
	 * @param string $phone_number
	 *
	 * @return bool
	 */
	public static function standardize_phone_number( string $phone_number ) : string {
		// Remove all non-numeric characters from the phone number.
		$phone_number = preg_replace( '/[^0-9]/', '', $phone_number );

		// The phone number must have at least 9 digits.
		// The phone number must have at most 15 digits.
		if ( strlen( $phone_number ) < 9 || strlen( $phone_number ) > 15 ) {
			return '';
		}

		if ( substr( $phone_number, 0, 2 ) === '00' ) {
			$phone_number = substr( $phone_number, 2 );
		}

		return $phone_number;
	}

	/**
	 * Get the instance of the provider.
	 *
	 * @return AbstractProvider|null
	 */
	public static function get_provider_instance() : ?AbstractProvider {
		$provider = get_option( 'wpss_provider' );
		if ( empty( $provider ) ) {
			return null;
		}

		switch ( $provider ) {
			case 'advantasms':
				return new Providers\AdvantaSms();
			case 'easysendsms':
				return new Providers\EasySendSms();
			case 'httpsms':
				return new Providers\HttpSms();
			case 'textbee':
				return new Providers\TextBee();
			case 'textsms':
				return new Providers\TextSms();
			case 'unimatrix':
				return new Providers\Unimatrix();
			default:
				return null;
		}
	}

}
