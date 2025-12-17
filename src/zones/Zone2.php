<?php
/**
 * Zone 2 class.
 *
 * @package Meloniq\WpSendSms\Zones
 */

namespace Meloniq\WpSendSms\Zones;

/**
 * Zone 2 class.
 */
class Zone2 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#Zone_2:_Mostly_Africa
	 *
	 * @return array
	 */
	public static function get_country_codes(): array {
		$codes = array(
			'eg'  => array(
				'code'   => '20',
				'length' => 9,
				'name'   => __( 'Egypt', 'wp-send-sms' ),
			),
			'ss'  => array(
				'code'   => '211',
				'length' => 9,
				'name'   => __( 'South Sudan', 'wp-send-sms' ),
			),
			'ma'  => array(
				'code'   => '212',
				'length' => 9,
				'name'   => __( 'Morocco', 'wp-send-sms' ),
			),
			'dz'  => array(
				'code'   => '213',
				'length' => 9,
				'name'   => __( 'Algeria', 'wp-send-sms' ),
			),
			'tn'  => array(
				'code'   => '216',
				'length' => 8,
				'name'   => __( 'Tunisia', 'wp-send-sms' ),
			),
			'ly'  => array(
				'code'   => '218',
				'length' => 9,
				'name'   => __( 'Libya', 'wp-send-sms' ),
			),
			'gm'  => array(
				'code'   => '220',
				'length' => 6,
				'name'   => __( 'Gambia', 'wp-send-sms' ),
			),
			'sn'  => array(
				'code'   => '221',
				'length' => 9,
				'name'   => __( 'Senegal', 'wp-send-sms' ),
			),
			'mr'  => array(
				'code'   => '222',
				'length' => 9,
				'name'   => __( 'Mauritania', 'wp-send-sms' ),
			),
			'ml'  => array(
				'code'   => '223',
				'length' => 9,
				'name'   => __( 'Mali', 'wp-send-sms' ),
			),
			'gu'  => array(
				'code'   => '224',
				'length' => 9,
				'name'   => __( 'Guinea', 'wp-send-sms' ),
			),
			'ci'  => array(
				'code'   => '225',
				'length' => 9,
				'name'   => __( 'Ivory Coast', 'wp-send-sms' ),
			),
			'bf'  => array(
				'code'   => '226',
				'length' => 9,
				'name'   => __( 'Burkina Faso', 'wp-send-sms' ),
			),
			'ne'  => array(
				'code'   => '227',
				'length' => 9,
				'name'   => __( 'Niger', 'wp-send-sms' ),
			),
			'tg'  => array(
				'code'   => '228',
				'length' => 8,
				'name'   => __( 'Togo', 'wp-send-sms' ),
			),
			'ben' => array(
				'code'   => '229',
				'length' => 8,
				'name'   => __( 'Benin', 'wp-send-sms' ),
			),
			'mu'  => array(
				'code'   => '230',
				'length' => 8,
				'name'   => __( 'Mauritius', 'wp-send-sms' ),
			),
			'lr'  => array(
				'code'   => '231',
				'length' => 7,
				'name'   => __( 'Liberia', 'wp-send-sms' ),
			),
			'sl'  => array(
				'code'   => '232',
				'length' => 7,
				'name'   => __( 'Sierra Leone', 'wp-send-sms' ),
			),
			'gh'  => array(
				'code'   => '233',
				'length' => 9,
				'name'   => __( 'Ghana', 'wp-send-sms' ),
			),
			'ng'  => array(
				'code'   => '234',
				'length' => 10,
				'name'   => __( 'Nigeria', 'wp-send-sms' ),
			),
			'ch'  => array(
				'code'   => '235',
				'length' => 8,
				'name'   => __( 'Chad', 'wp-send-sms' ),
			),
			'cf'  => array(
				'code'   => '236',
				'length' => 7,
				'name'   => __( 'Central African Republic', 'wp-send-sms' ),
			),
			'td'  => array(
				'code'   => '237',
				'length' => 9,
				'name'   => __( 'Cameroon', 'wp-send-sms' ),
			),
			'cg'  => array(
				'code'   => '238',
				'length' => 7,
				'name'   => __( 'Cape Verde', 'wp-send-sms' ),
			),
			'ao'  => array(
				'code'   => '239',
				'length' => 7,
				'name'   => __( 'São Tomé and Príncipe', 'wp-send-sms' ),
			),
			'gq'  => array(
				'code'   => '240',
				'length' => 7,
				'name'   => __( 'Equatorial Guinea', 'wp-send-sms' ),
			),
			'ga'  => array(
				'code'   => '241',
				'length' => 7,
				'name'   => __( 'Gabon', 'wp-send-sms' ),
			),
			'cg'  => array(
				'code'   => '242',
				'length' => 9,
				'name'   => __( 'Republic of the Congo', 'wp-send-sms' ),
			),
			'cd'  => array(
				'code'   => '243',
				'length' => 9,
				'name'   => __( 'Democratic Republic of the Congo', 'wp-send-sms' ),
			),
			'ao'  => array(
				'code'   => '244',
				'length' => 9,
				'name'   => __( 'Angola', 'wp-send-sms' ),
			),
			'gw'  => array(
				'code'   => '245',
				'length' => 7,
				'name'   => __( 'Guinea-Bissau', 'wp-send-sms' ),
			),
			'io'  => array(
				'code'   => '246',
				'length' => 7,
				'name'   => __( 'British Indian Ocean Territory', 'wp-send-sms' ),
			),
			'ac'  => array(
				'code'   => '247',
				'length' => 7,
				'name'   => __( 'Ascension Island', 'wp-send-sms' ),
			),
			'st'  => array(
				'code'   => '248',
				'length' => 7,
				'name'   => __( 'Seychelles', 'wp-send-sms' ),
			),
			'sd'  => array(
				'code'   => '249',
				'length' => 9,
				'name'   => __( 'Sudan', 'wp-send-sms' ),
			),
			'rw'  => array(
				'code'   => '250',
				'length' => 9,
				'name'   => __( 'Rwanda', 'wp-send-sms' ),
			),
			'et'  => array(
				'code'   => '251',
				'length' => 9,
				'name'   => __( 'Ethiopia', 'wp-send-sms' ),
			),
			'so'  => array(
				'code'   => '252',
				'length' => 9,
				'name'   => __( 'Somalia', 'wp-send-sms' ),
			),
			'dj'  => array(
				'code'   => '253',
				'length' => 7,
				'name'   => __( 'Djibouti', 'wp-send-sms' ),
			),
			'ke'  => array(
				'code'   => '254',
				'length' => 9,
				'name'   => __( 'Kenya', 'wp-send-sms' ),
			),
			'tz'  => array(
				'code'   => '255',
				'length' => 9,
				'name'   => __( 'Tanzania', 'wp-send-sms' ),
			),
			'ug'  => array(
				'code'   => '256',
				'length' => 9,
				'name'   => __( 'Uganda', 'wp-send-sms' ),
			),
			'bi'  => array(
				'code'   => '257',
				'length' => 7,
				'name'   => __( 'Burundi', 'wp-send-sms' ),
			),
			'moz' => array(
				'code'   => '258',
				'length' => 9,
				'name'   => __( 'Mozambique', 'wp-send-sms' ),
			),
			'zm'  => array(
				'code'   => '260',
				'length' => 9,
				'name'   => __( 'Zambia', 'wp-send-sms' ),
			),
			'mg'  => array(
				'code'   => '261',
				'length' => 9,
				'name'   => __( 'Madagascar', 'wp-send-sms' ),
			),
			're'  => array(
				'code'   => '262',
				'length' => 9,
				'name'   => __( 'Réunion', 'wp-send-sms' ),
			),
			'zw'  => array(
				'code'   => '263',
				'length' => 9,
				'name'   => __( 'Zimbabwe', 'wp-send-sms' ),
			),
			'na'  => array(
				'code'   => '264',
				'length' => 9,
				'name'   => __( 'Namibia', 'wp-send-sms' ),
			),
			'ao'  => array(
				'code'   => '265',
				'length' => 9,
				'name'   => __( 'Malawi', 'wp-send-sms' ),
			),
			'ls'  => array(
				'code'   => '266',
				'length' => 8,
				'name'   => __( 'Lesotho', 'wp-send-sms' ),
			),
			'bo'  => array(
				'code'   => '267',
				'length' => 7,
				'name'   => __( 'Botswana', 'wp-send-sms' ),
			),
			'sz'  => array(
				'code'   => '268',
				'length' => 7,
				'name'   => __( 'Eswatini', 'wp-send-sms' ),
			),
			'km'  => array(
				'code'   => '269',
				'length' => 7,
				'name'   => __( 'Comoros', 'wp-send-sms' ),
			),
			'za'  => array(
				'code'   => '27',
				'length' => 9,
				'name'   => __( 'South Africa', 'wp-send-sms' ),
			),
			'cv'  => array(
				'code'   => '290',
				'length' => 7,
				'name'   => __( 'Saint Helena', 'wp-send-sms' ),
			),
			'st'  => array(
				'code'   => '291',
				'length' => 7,
				'name'   => __( 'Eritrea', 'wp-send-sms' ),
			),
			'aw'  => array(
				'code'   => '297',
				'length' => 7,
				'name'   => __( 'Aruba', 'wp-send-sms' ),
			),
			'fo'  => array(
				'code'   => '298',
				'length' => 7,
				'name'   => __( 'Faroe Islands', 'wp-send-sms' ),
			),
			'gl'  => array(
				'code'   => '299',
				'length' => 7,
				'name'   => __( 'Greenland', 'wp-send-sms' ),
			),
		);

		return $codes;
	}
}
