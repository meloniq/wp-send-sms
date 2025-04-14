<?php
namespace Meloniq\WpSendSms\Zones;

class Zone7 extends AbstractZone {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#Zone_7:_Russia_and_neighboring_regions
	 *
	 * @return array
	 */
	public static function get_country_codes() : array {
		$codes = array(
			'ru' => array(
				'code'     => '7',
				'subcodes' => array(
					'1',
					'2',
					'3',
					'4',
					'5',
					'8',
					'9',
					'840',
					'940',
					'850',
					'929',
				),
				'length'  => 10,
				'name'     => __( 'Russia', 'wp-send-sms' ),
			),
			'kz' => array(
				'code'    => '7',
				'subcodes' => array(
					'0',
					'6',
					'7',
				),
				'length'  => 10,
				'name'    => __( 'Kazakhstan', 'wp-send-sms' ),
			),
		);

		return $codes;
	}

}
