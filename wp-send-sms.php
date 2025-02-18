<?php
/*
 * Plugin Name:       WP Send SMS
 * Plugin URI:        https://blog.meloniq.net/wp-send-sms/
 *
 * Description:       WP Send SMS allows WordPress users to send SMS messages using various external service providers.
 * Tags:              sms, short message, mobile
 *
 * Requires at least: 4.9
 * Requires PHP:      7.4
 * Version:           1.0
 *
 * Author:            MELONIQ.NET
 * Author URI:        https://meloniq.net/
 *
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain:       wp-send-sms
 */

namespace Meloniq\WpSendSms;

// If this file is accessed directly, then abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WPSS_TD', 'wp-send-sms' );
define( 'WPSS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPSS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

// Integtation
require_once trailingslashit( dirname( __FILE__ ) ) . 'integration.php';

// Include the autoloader so we can dynamically include the rest of the classes.
require_once trailingslashit( dirname( __FILE__ ) ) . 'vendor/autoload.php';


/**
 * Setup plugin data.
 *
 * @return void
 */
function setup() {
	global $wpss_instance;

	// Only in admin area.
	if ( is_admin() ) {
		$wpss_instance['admin-page'] = new AdminPage();
		$wpss_instance['settings']   = new Settings();
	}

}
add_action( 'after_setup_theme', 'Meloniq\WpSendSms\setup' );


