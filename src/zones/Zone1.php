<?php
namespace Meloniq\WpSendSms\Zones;

class Zone1 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_North_American_Numbering_Plan_area_codes#Area_codes_by_country,_state,_province,_and_regions
	 *
	 * @return array
	 */
	public static function get_country_codes() : array {

		$codes = array(
			'us' => array(
				'code'   => '1',
				'subcodes' => array(
					'340', // Virgin Islands
					'670', // Northern Mariana Islands
					'671', // Guam
					'684', // American Samoa
					'787', // Puerto Rico
					'939', // Puerto Rico
				),
				'length' => 10,
				'name'   => __( 'United States', 'wp-send-sms' ),
			),
			'ca' => array(
				'code'   => '1',
				'subcodes' => array(),
				'length' => 10, // Canada has 10 digits + the country code
				'name'   => __( 'Canada', 'wp-send-sms' ),
			),
			'caribean' => array(
				'code'   => '1',
				'subcodes' => array(
					'242', // Bahamas
					'246', // Barbados
					'264', // Anguilla
					'268', // Antigua and Barbuda
					'284', // British Virgin Islands
					'345', // Cayman Islands
					'441', // Bermuda
					'473', // Grenada
					'649', // Turks and Caicos Islands
					'658', // Jamaica
					'876', // Jamaica
					'664', // Montserrat
					'721', // Sint Maarten
					'758', // Saint Lucia
					'767', // Dominica
					'784', // Saint Vincent and the Grenadines
					'809', // Dominican Republic
					'829', // Dominican Republic
					'849', // Dominican Republic
					'868', // Trinidad and Tobago
					'869', // Saint Kitts and Nevis
				),
				'length' => 10,
				'name'   => __( 'Caribbean', 'wp-send-sms' ),
			),
		);

		return $codes;
	}

}
