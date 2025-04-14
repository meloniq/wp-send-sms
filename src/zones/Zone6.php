<?php
namespace Meloniq\WpSendSms\Zones;

class Zone6 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#Zone_6:_Southeast_Asia_and_Oceania
	 *
	 * @return array
	 */
	public static function get_country_codes() : array {
		$codes = array(
			'my' => array(
				'code'    => '60',
				'length'  => 9,
				'name'    => __( 'Malaysia', 'wp-send-sms' ),
			),
			'au' => array(
				'code'    => '61',
				'length'  => 9,
				'name'    => __( 'Australia', 'wp-send-sms' ),
			),
			'id' => array(
				'code'    => '62',
				'length'  => 10,
				'name'    => __( 'Indonesia', 'wp-send-sms' ),
			),
			'ph' => array(
				'code'    => '63',
				'length'  => 10,
				'name'    => __( 'Philippines', 'wp-send-sms' ),
			),
			'nz' => array(
				'code'    => '64',
				'length'  => 9,
				'name'    => __( 'New Zealand', 'wp-send-sms' ),
			),
			'sg' => array(
				'code'    => '65',
				'length'  => 8,
				'name'    => __( 'Singapore', 'wp-send-sms' ),
			),
			'th' => array(
				'code'    => '66',
				'length'  => 9,
				'name'    => __( 'Thailand', 'wp-send-sms' ),
			),
			'tl' => array(
				'code'    => '670',
				'length'  => 9,
				'name'    => __( 'Timor-Leste', 'wp-send-sms' ),
			),
			'au-ext' => array(
				'code'    => '672',
				'length'  => 9,
				'name'    => __( 'Australian External Territories', 'wp-send-sms' ),
			),
			'bn' => array(
				'code'    => '673',
				'length'  => 7,
				'name'    => __( 'Brunei', 'wp-send-sms' ),
			),
			'nr' => array(
				'code'    => '674',
				'length'  => 7,
				'name'    => __( 'Nauru', 'wp-send-sms' ),
			),
			'pg' => array(
				'code'    => '675',
				'length'  => 8,
				'name'    => __( 'Papua New Guinea', 'wp-send-sms' ),
			),
			'to' => array(
				'code'    => '676',
				'length'  => 7,
				'name'    => __( 'Tonga', 'wp-send-sms' ),
			),
			'sb' => array(
				'code'    => '677',
				'length'  => 7,
				'name'    => __( 'Solomon Islands', 'wp-send-sms' ),
			),
			'vu' => array(
				'code'    => '678',
				'length'  => 7,
				'name'    => __( 'Vanuatu', 'wp-send-sms' ),
			),
			'fj' => array(
				'code'    => '679',
				'length'  => 7,
				'name'    => __( 'Fiji', 'wp-send-sms' ),
			),
			'pw' => array(
				'code'    => '680',
				'length'  => 7,
				'name'    => __( 'Palau', 'wp-send-sms' ),
			),
			'wf' => array(
				'code'    => '681',
				'length'  => 7,
				'name'    => __( 'Wallis and Futuna', 'wp-send-sms' ),
			),
			'ck' => array(
				'code'    => '682',
				'length'  => 7,
				'name'    => __( 'Cook Islands', 'wp-send-sms' ),
			),
			'nu' => array(
				'code'    => '683',
				'length'  => 7,
				'name'    => __( 'Niue', 'wp-send-sms' ),
			),
			'ws' => array(
				'code'    => '685',
				'length'  => 7,
				'name'    => __( 'Samoa', 'wp-send-sms' ),
			),
			'ki' => array(
				'code'    => '686',
				'length'  => 7,
				'name'    => __( 'Kiribati', 'wp-send-sms' ),
			),
			'nc' => array(
				'code'    => '687',
				'length'  => 7,
				'name'    => __( 'New Caledonia', 'wp-send-sms' ),
			),
			'tv' => array(
				'code'    => '688',
				'length'  => 7,
				'name'    => __( 'Tuvalu', 'wp-send-sms' ),
			),
			'pf' => array(
				'code'    => '689',
				'length'  => 7,
				'name'    => __( 'French Polynesia', 'wp-send-sms' ),
			),
			'tk' => array(
				'code'    => '690',
				'length'  => 7,
				'name'    => __( 'Tokelau', 'wp-send-sms' ),
			),
			'fm' => array(
				'code'    => '691',
				'length'  => 7,
				'name'    => __( 'Micronesia', 'wp-send-sms' ),
			),
			'mh' => array(
				'code'    => '692',
				'length'  => 7,
				'name'    => __( 'Marshall Islands', 'wp-send-sms' ),
			),
		);

		return $codes;
	}

}
