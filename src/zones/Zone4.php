<?php
namespace Meloniq\WpSendSms\Zones;

class Zone4 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#Zones_3_and_4:_Europe
	 *
	 * @return array
	 */
	public static function get_country_codes() {
		$codes = array(
			'cz' => array(
				'code'   => '420',
				'length' => 9,
				'name'   => __( 'Czech Republic', 'wp-send-sms' ),
			),
			'sk' => array(
				'code'   => '421',
				'length' => 9,
				'name'   => __( 'Slovakia', 'wp-send-sms' ),
			),
			'li' => array(
				'code'   => '423',
				'length' => 7,
				'name'   => __( 'Liechtenstein', 'wp-send-sms' ),
			),
			'at' => array(
				'code'   => '43',
				'length' => 10,
				'name'   => __( 'Austria', 'wp-send-sms' ),
			),
			'gb' => array(
				'code'   => '44',
				'length' => 10,
				'name'   => __( 'United Kingdom', 'wp-send-sms' ),
			),
			'dk' => array(
				'code'   => '45',
				'length' => 8,
				'name'   => __( 'Denmark', 'wp-send-sms' ),
			),
			'se' => array(
				'code'   => '46',
				'length' => 10,
				'name'   => __( 'Sweden', 'wp-send-sms' ),
			),
			'no' => array(
				'code'   => '47',
				'length' => 8,
				'name'   => __( 'Norway', 'wp-send-sms' ),
			),
			'pl' => array(
				'code'   => '48',
				'length' => 9,
				'name'   => __( 'Poland', 'wp-send-sms' ),
			),
			'de' => array(
				'code'   => '49',
				'length' => 11,
				'name'   => __( 'Germany', 'wp-send-sms' ),
			),
		);

		return $codes;
	}

}
