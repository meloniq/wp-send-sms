<?php
namespace Meloniq\WpSendSms\Zones;

abstract class AbstractZone {

	/**
	 * Country codes.
	 *
	 * @return array
	 */
	abstract public static function get_country_codes() : array;

}
