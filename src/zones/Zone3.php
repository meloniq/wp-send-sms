<?php
namespace Meloniq\WpSendSms\Zones;

class Zone3 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#Zones_3_and_4:_Europe
	 *
	 * @return array
	 */
	public static function get_country_codes() {
		$codes = array(
			'gr' => array(
				'code'   => '30',
				'length' => 10,
				'name'   => __( 'Greece', 'wp-send-sms' ),
			),
			'nl' => array(
				'code'   => '31',
				'length' => 9,
				'name'   => __( 'Netherlands', 'wp-send-sms' ),
			),
			'be' => array(
				'code'   => '32',
				'length' => 9,
				'name'   => __( 'Belgium', 'wp-send-sms' ),
			),
			'fr' => array(
				'code'   => '33',
				'length' => 9,
				'name'   => __( 'France', 'wp-send-sms' ),
			),
			'es' => array(
				'code'   => '34',
				'length' => 9,
				'name'   => __( 'Spain', 'wp-send-sms' ),
			),
			'gi' => array(
				'code'   => '350',
				'length' => 8,
				'name'   => __( 'Gibraltar', 'wp-send-sms' ),
			),
			'pt' => array(
				'code'   => '351',
				'length' => 9,
				'name'   => __( 'Portugal', 'wp-send-sms' ),
			),
			'lu' => array(
				'code'   => '352',
				'length' => 9,
				'name'   => __( 'Luxembourg', 'wp-send-sms' ),
			),
			'ie' => array(
				'code'   => '353',
				'length' => 9,
				'name'   => __( 'Ireland', 'wp-send-sms' ),
			),
			'is' => array(
				'code'   => '354',
				'length' => 7,
				'name'   => __( 'Iceland', 'wp-send-sms' ),
			),
			'al' => array(
				'code'   => '355',
				'length' => 8,
				'name'   => __( 'Albania', 'wp-send-sms' ),
			),
			'mt' => array(
				'code'   => '356',
				'length' => 8,
				'name'   => __( 'Malta', 'wp-send-sms' ),
			),
			'cy' => array(
				'code'   => '357',
				'length' => 8,
				'name'   => __( 'Cyprus', 'wp-send-sms' ),
			),
			'fi' => array(
				'code'   => '358',
				'length' => 9,
				'name'   => __( 'Finland', 'wp-send-sms' ),
			),
			'bg' => array(
				'code'   => '359',
				'length' => 8,
				'name'   => __( 'Bulgaria', 'wp-send-sms' ),
			),
			'hu' => array(
				'code'   => '36',
				'length' => 9,
				'name'   => __( 'Hungary', 'wp-send-sms' ),
			),
			'lt' => array(
				'code'   => '370',
				'length' => 8,
				'name'   => __( 'Lithuania', 'wp-send-sms' ),
			),
			'lv' => array(
				'code'   => '371',
				'length' => 8,
				'name'   => __( 'Latvia', 'wp-send-sms' ),
			),
			'ee' => array(
				'code'   => '372',
				'length' => 7,
				'name'   => __( 'Estonia', 'wp-send-sms' ),
			),
			'md' => array(
				'code'   => '373',
				'length' => 8,
				'name'   => __( 'Moldova', 'wp-send-sms' ),
			),
			'am' => array(
				'code'   => '374',
				'length' => 8,
				'name'   => __( 'Armenia', 'wp-send-sms' ),
			),
			'by' => array(
				'code'   => '375',
				'length' => 9,
				'name'   => __( 'Belarus', 'wp-send-sms' ),
			),
			'ad' => array(
				'code'   => '376',
				'length' => 6,
				'name'   => __( 'Andorra', 'wp-send-sms' ),
			),
			'mc' => array(
				'code'   => '377',
				'length' => 6,
				'name'   => __( 'Monaco', 'wp-send-sms' ),
			),
			'sm' => array(
				'code'   => '378',
				'length' => 6,
				'name'   => __( 'San Marino', 'wp-send-sms' ),
			),
			'va' => array(
				'code'   => '379',
				'length' => 6,
				'name'   => __( 'Vatican City', 'wp-send-sms' ),
			),
			'ua' => array(
				'code'   => '380',
				'length' => 9,
				'name'   => __( 'Ukraine', 'wp-send-sms' ),
			),
			'rs' => array(
				'code'   => '381',
				'length' => 9,
				'name'   => __( 'Serbia', 'wp-send-sms' ),
			),
			'me' => array(
				'code'   => '382',
				'length' => 8,
				'name'   => __( 'Montenegro', 'wp-send-sms' ),
			),
			'ks' => array(
				'code'   => '383',
				'length' => 8,
				'name'   => __( 'Kosovo', 'wp-send-sms' ),
			),
			'hr' => array(
				'code'   => '385',
				'length' => 9,
				'name'   => __( 'Croatia', 'wp-send-sms' ),
			),
			'si' => array(
				'code'   => '386',
				'length' => 8,
				'name'   => __( 'Slovenia', 'wp-send-sms' ),
			),
			'ba' => array(
				'code'   => '387',
				'length' => 8,
				'name'   => __( 'Bosnia and Herzegovina', 'wp-send-sms' ),
			),
			'mk' => array(
				'code'   => '389',
				'length' => 8,
				'name'   => __( 'North Macedonia', 'wp-send-sms' ),
			),
			'it' => array(
				'code'   => '39',
				'length' => 10,
				'name'   => __( 'Italy', 'wp-send-sms' ),
			),
		);

		return $codes;
	}

}
