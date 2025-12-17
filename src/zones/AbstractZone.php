<?php
/**
 * Abstract class for zones.
 *
 * @package Meloniq\WpSendSms\Zones
 */

namespace Meloniq\WpSendSms\Zones;

/**
 * Abstract class for zones.
 */
abstract class AbstractZone {

	/**
	 * Country codes.
	 *
	 * @return array
	 */
	abstract public static function get_country_codes(): array;
}
