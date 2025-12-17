=== WP Send SMS ===
Contributors: meloniq
Tags: sms, short message, mobile
Tested up to: 6.9
Stable tag: 1.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WP Send SMS allows WordPress users to send SMS messages using various external service providers.

== Description ==

WP Send SMS allows WordPress users to send SMS messages using various external service providers.

This plugin supports multiple SMS gateways, each with its own configuration settings, such as API keys and credentials.
It provides utilities to help ensure messages are formatted correctly, including phone number validation, splitting long text into multiple short messages, and stripping non-ASCII characters.

The plugin offers a simple-to-use function `wp_send_sms()` and an action hook for sending SMS messages, making it easy to integrate with other WordPress features and plugins.

Whether you're sending notifications, reminders, or alerts, WP Send SMS offers a reliable and customizable solution.


= Features: =

* **Multiple SMS Service Providers**: Supports integration with various external SMS services.
* **Service-Specific Configuration**: Easily configure each SMS service with API keys and other settings via a simple admin page.
* **Phone Number Validation**: Ensure phone numbers are correctly formatted and valid before sending SMS.


= Text Message Utilities: =
* **Split long messages** into multiple SMS parts if needed.
* **Prepare and validate** message content to comply with SMS character limits.
* **Remove non-ASCII** characters to prevent encoding issues.
* **Flexible Sending Function**: Use the `wp_send_sms()` function to send messages programmatically from your themes, plugins, or custom scripts.
* **Action Hook**: `wp_send_sms_action` to hook into the SMS sending process for advanced customizations.
* **Easy Integration**: Seamlessly integrates with your existing WordPress setup.
* **Lightweight and Customizable**: Add additional SMS providers or customize behavior with simple filters and actions.


= Installation: =

* Upload the plugin to your WordPress site.
* Activate the plugin through the 'Plugins' menu in WordPress.
* Configure your SMS provider(s) under Settings > WP Send SMS.
* Use `wp_send_sms()` to send messages, or call the `wp_send_sms_action` action hook to send SMS programmatically.


= Usage Example: =

To send an SMS, use the `wp_send_sms()` function in your WordPress theme or plugin:
```php
wp_send_sms( $phone_number, $message, $country_code );
```

To send an SMS, use the `wp_send_sms_action` action hook in your WordPress theme or plugin:
```php
do_action( 'wp_send_sms_action', $phone_number, $message, $country_code );
```


== Changelog ==

= 1.0 =
* Initial release.
