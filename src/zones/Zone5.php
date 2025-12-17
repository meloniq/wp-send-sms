<?php
/**
 * Zone 5 class.
 *
 * @package Meloniq\WpSendSms\Zones
 */

namespace Meloniq\WpSendSms\Zones;

/**
 * Zone 5 class.
 */
class Zone5 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#Zone_5:_South_and_Central_Americas
	 *
	 * @return array
	 */
	public static function get_country_codes(): array {
		$codes = array(
			'fk' => array(
				'code'   => '500',
				'length' => 4,
				'name'   => __( 'Falkland Islands', 'wp-send-sms' ),
			),
			'bz' => array(
				'code'   => '501',
				'length' => 7,
				'name'   => __( 'Belize', 'wp-send-sms' ),
			),
			'gt' => array(
				'code'   => '502',
				'length' => 8,
				'name'   => __( 'Guatemala', 'wp-send-sms' ),
			),
			'sv' => array(
				'code'   => '503',
				'length' => 8,
				'name'   => __( 'El Salvador', 'wp-send-sms' ),
			),
			'hn' => array(
				'code'   => '504',
				'length' => 8,
				'name'   => __( 'Honduras', 'wp-send-sms' ),
			),
			'ni' => array(
				'code'   => '505',
				'length' => 8,
				'name'   => __( 'Nicaragua', 'wp-send-sms' ),
			),
			'cr' => array(
				'code'   => '506',
				'length' => 8,
				'name'   => __( 'Costa Rica', 'wp-send-sms' ),
			),
			'pa' => array(
				'code'   => '507',
				'length' => 7,
				'name'   => __( 'Panama', 'wp-send-sms' ),
			),
			'pm' => array(
				'code'   => '508',
				'length' => 7,
				'name'   => __( 'Saint Pierre and Miquelon', 'wp-send-sms' ),
			),
			'ht' => array(
				'code'   => '509',
				'length' => 8,
				'name'   => __( 'Haiti', 'wp-send-sms' ),
			),
			'pe' => array(
				'code'   => '51',
				'length' => 9,
				'name'   => __( 'Peru', 'wp-send-sms' ),
			),
			'mx' => array(
				'code'   => '52',
				'length' => 10,
				'name'   => __( 'Mexico', 'wp-send-sms' ),
			),
			'cu' => array(
				'code'   => '53',
				'length' => 8,
				'name'   => __( 'Cuba', 'wp-send-sms' ),
			),
			'ar' => array(
				'code'   => '54',
				'length' => 10,
				'name'   => __( 'Argentina', 'wp-send-sms' ),
			),
			'br' => array(
				'code'   => '55',
				'length' => 11,
				'name'   => __( 'Brazil', 'wp-send-sms' ),
			),
			'cl' => array(
				'code'   => '56',
				'length' => 9,
				'name'   => __( 'Chile', 'wp-send-sms' ),
			),
			'co' => array(
				'code'   => '57',
				'length' => 10,
				'name'   => __( 'Colombia', 'wp-send-sms' ),
			),
			've' => array(
				'code'   => '58',
				'length' => 10,
				'name'   => __( 'Venezuela', 'wp-send-sms' ),
			),
			'gp' => array(
				'code'   => '590',
				'length' => 10,
				'name'   => __( 'Guadeloupe', 'wp-send-sms' ),
			),
			'bo' => array(
				'code'   => '591',
				'length' => 8,
				'name'   => __( 'Bolivia', 'wp-send-sms' ),
			),
			'gy' => array(
				'code'   => '592',
				'length' => 7,
				'name'   => __( 'Guyana', 'wp-send-sms' ),
			),
			'ec' => array(
				'code'   => '593',
				'length' => 9,
				'name'   => __( 'Ecuador', 'wp-send-sms' ),
			),
			'gf' => array(
				'code'   => '594',
				'length' => 10,
				'name'   => __( 'French Guiana', 'wp-send-sms' ),
			),
			'py' => array(
				'code'   => '595',
				'length' => 9,
				'name'   => __( 'Paraguay', 'wp-send-sms' ),
			),
			'mq' => array(
				'code'   => '596',
				'length' => 10,
				'name'   => __( 'Martinique', 'wp-send-sms' ),
			),
			'sr' => array(
				'code'   => '597',
				'length' => 7,
				'name'   => __( 'Suriname', 'wp-send-sms' ),
			),
			'uy' => array(
				'code'   => '598',
				'length' => 8,
				'name'   => __( 'Uruguay', 'wp-send-sms' ),
			),
			'an' => array(
				'code'   => '599',
				'length' => 10,
				'name'   => __( 'Netherlands Antilles', 'wp-send-sms' ),
			),
		);

		return $codes;
	}
}
