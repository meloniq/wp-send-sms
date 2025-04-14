<?php
namespace Meloniq\WpSendSms\Zones;

class Zone8 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#Zone_8:_East_Asia,_South_Asia,_and_special_services
	 *
	 * @return array
	 */
	public static function get_country_codes() : array {
		$codes = array(
			'jp' => array(
				'code'    => '81',
				'length'  => 10,
				'name'    => __( 'Japan', 'wp-send-sms' ),
			),
			'kr' => array(
				'code'    => '82',
				'length'  => 10,
				'name'    => __( 'South Korea', 'wp-send-sms' ),
			),
			'vn' => array(
				'code'    => '84',
				'length'  => 10,
				'name'    => __( 'Vietnam', 'wp-send-sms' ),
			),
			'kp' => array(
				'code'    => '850',
				'length'  => 9,
				'name'    => __( 'North Korea', 'wp-send-sms' ),
			),
			'hk' => array(
				'code'    => '852',
				'length'  => 8,
				'name'    => __( 'Hong Kong', 'wp-send-sms' ),
			),
			'mo' => array(
				'code'    => '853',
				'length'  => 8,
				'name'    => __( 'Macau', 'wp-send-sms' ),
			),
			'kh' => array(
				'code'    => '855',
				'length'  => 9,
				'name'    => __( 'Cambodia', 'wp-send-sms' ),
			),
			'la' => array(
				'code'    => '856',
				'length'  => 9,
				'name'    => __( 'Laos', 'wp-send-sms' ),
			),
			'cn' => array(
				'code'    => '86',
				'length'  => 11,
				'name'    => __( 'China', 'wp-send-sms' ),
			),
			'bd' => array(
				'code'    => '880',
				'length'  => 10,
				'name'    => __( 'Bangladesh', 'wp-send-sms' ),
			),
			'tw' => array(
				'code'    => '886',
				'length'  => 10,
				'name'    => __( 'Taiwan', 'wp-send-sms' ),
			),
		);

		return $codes;
	}

}
