<?php
namespace Meloniq\WpSendSms\Zones;

class Zone9 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#Zone_9:_West,_Central,_and_South_Asia,_and_part_of_Eastern_Europe
	 *
	 * @return array
	 */
	public static function get_country_codes() : array {
		$codes = array(
			'tr' => array(
				'code'    => '90',
				'length'  => 10,
				'name'    => __( 'Turkey', 'wp-send-sms' ),
			),
			'in' => array(
				'code'    => '91',
				'length'  => 10,
				'name'    => __( 'India', 'wp-send-sms' ),
			),
			'pk' => array(
				'code'    => '92',
				'length'  => 10,
				'name'    => __( 'Pakistan', 'wp-send-sms' ),
			),
			'af' => array(
				'code'    => '93',
				'length'  => 9,
				'name'    => __( 'Afghanistan', 'wp-send-sms' ),
			),
			'lk' => array(
				'code'    => '94',
				'length'  => 10,
				'name'    => __( 'Sri Lanka', 'wp-send-sms' ),
			),
			'mm' => array(
				'code'    => '95',
				'length'  => 9,
				'name'    => __( 'Myanmar', 'wp-send-sms' ),
			),
			'mv' => array(
				'code'    => '960',
				'length'  => 7,
				'name'    => __( 'Maldives', 'wp-send-sms' ),
			),
			'lb' => array(
				'code'    => '961',
				'length'  => 8,
				'name'    => __( 'Lebanon', 'wp-send-sms' ),
			),
			'jo' => array(
				'code'    => '962',
				'length'  => 8,
				'name'    => __( 'Jordan', 'wp-send-sms' ),
			),
			'sy' => array(
				'code'    => '963',
				'length'  => 9,
				'name'    => __( 'Syria', 'wp-send-sms' ),
			),
			'iq' => array(
				'code'    => '964',
				'length'  => 9,
				'name'    => __( 'Iraq', 'wp-send-sms' ),
			),
			'kw' => array(
				'code'    => '965',
				'length'  => 8,
				'name'    => __( 'Kuwait', 'wp-send-sms' ),
			),
			'sa' => array(
				'code'    => '966',
				'length'  => 9,
				'name'    => __( 'Saudi Arabia', 'wp-send-sms' ),
			),
			'ye' => array(
				'code'    => '967',
				'length'  => 9,
				'name'    => __( 'Yemen', 'wp-send-sms' ),
			),
			'om' => array(
				'code'    => '968',
				'length'  => 8,
				'name'    => __( 'Oman', 'wp-send-sms' ),
			),
			'ps' => array(
				'code'    => '970',
				'length'  => 9,
				'name'    => __( 'Palestine', 'wp-send-sms' ),
			),
			'ae' => array(
				'code'    => '971',
				'length'  => 9,
				'name'    => __( 'United Arab Emirates', 'wp-send-sms' ),
			),
			'il' => array(
				'code'    => '972',
				'length'  => 9,
				'name'    => __( 'Israel', 'wp-send-sms' ),
			),
			'bh' => array(
				'code'    => '973',
				'length'  => 8,
				'name'    => __( 'Bahrain', 'wp-send-sms' ),
			),
			'qa' => array(
				'code'    => '974',
				'length'  => 8,
				'name'    => __( 'Qatar', 'wp-send-sms' ),
			),
			'bt' => array(
				'code'    => '975',
				'length'  => 8,
				'name'    => __( 'Bhutan', 'wp-send-sms' ),
			),
			'mn' => array(
				'code'    => '976',
				'length'  => 8,
				'name'    => __( 'Mongolia', 'wp-send-sms' ),
			),
			'np' => array(
				'code'    => '977',
				'length'  => 10,
				'name'    => __( 'Nepal', 'wp-send-sms' ),
			),
			'ir' => array(
				'code'    => '98',
				'length'  => 10,
				'name'    => __( 'Iran', 'wp-send-sms' ),
			),
			'tj' => array(
				'code'    => '992',
				'length'  => 9,
				'name'    => __( 'Tajikistan', 'wp-send-sms' ),
			),
			'tm' => array(
				'code'    => '993',
				'length'  => 8,
				'name'    => __( 'Turkmenistan', 'wp-send-sms' ),
			),
			'az' => array(
				'code'    => '994',
				'length'  => 9,
				'name'    => __( 'Azerbaijan', 'wp-send-sms' ),
			),
			'ge' => array(
				'code'    => '995',
				'length'  => 9,
				'name'    => __( 'Georgia', 'wp-send-sms' ),
			),
			'kg' => array(
				'code'    => '996',
				'length'  => 9,
				'name'    => __( 'Kyrgyzstan', 'wp-send-sms' ),
			),
			'uz' => array(
				'code'    => '998',
				'length'  => 9,
				'name'    => __( 'Uzbekistan', 'wp-send-sms' ),
			),
		);

		return $codes;
	}

}
