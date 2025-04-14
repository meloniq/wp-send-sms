<?php
namespace Meloniq\WpSendSms;

use Meloniq\WpSendSms\Zones\AbstractZone;
use Meloniq\WpSendSms\Zones\Zone1;
use Meloniq\WpSendSms\Zones\Zone2;
use Meloniq\WpSendSms\Zones\Zone3;
use Meloniq\WpSendSms\Zones\Zone4;
use Meloniq\WpSendSms\Zones\Zone5;
use Meloniq\WpSendSms\Zones\Zone6;
use Meloniq\WpSendSms\Zones\Zone7;
use Meloniq\WpSendSms\Zones\Zone8;
use Meloniq\WpSendSms\Zones\Zone9;

class CountryCodes {

	/**
	 * Country codes.
	 *
	 * @see https://en.wikipedia.org/wiki/List_of_telephone_country_codes#World_numbering_zones
	 *
	 * @return array
	 */
	public static function get_country_codes() {

		$codes = array_merge(
			Zone1::get_country_codes(), // North America
			Zone2::get_country_codes(), // Mostly Africa
			Zone3::get_country_codes(), // Europe
			Zone4::get_country_codes(), // Europe
			Zone5::get_country_codes(), // South and Central Americas
			Zone6::get_country_codes(), // Southeast Asia and Oceania
			Zone7::get_country_codes(), // Russia and neighboring regions
			Zone8::get_country_codes(), // East Asia, South Asia, and special services
			Zone9::get_country_codes(), // West, Central, and South Asia, and part of Eastern Europe
		);

		return $codes;
	}

}
