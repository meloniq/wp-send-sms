<?php
/**
 * Test SMS Page class.
 *
 * @package Meloniq\WpSendSms
 */

namespace Meloniq\WpSendSms;

/**
 * Test SMS Page class.
 */
class TestSmsPage {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu_page' ), 10 );
		add_action( 'admin_init', array( $this, 'init_settings' ), 10 );
		add_action( 'admin_notices', array( $this, 'notices' ), 10 );

		$this->send_test_sms();
	}

	/**
	 * Add menu page.
	 *
	 * @return void
	 */
	public function add_menu_page(): void {
		add_submenu_page(
			'tools.php',
			__( 'Test SMS', 'wp-send-sms' ),
			__( 'Test SMS', 'wp-send-sms' ),
			'manage_options',
			'wp-send-sms-test',
			array( $this, 'render_page' )
		);
	}

	/**
	 * Render page.
	 *
	 * @return void
	 */
	public function render_page(): void {
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Test SMS', 'wp-send-sms' ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'wpss_test_sms' );
				do_settings_sections( 'wpss_test_sms' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Display notices.
	 *
	 * @return void
	 */
	public function notices(): void {
		$response = get_transient( 'wpss_test_sms_response' );
		if ( is_array( $response ) ) {
			$type = $response['success'] ? 'success' : 'error';
			wp_admin_notice( $response['message'], array( 'type' => $type ) );
			delete_transient( 'wpss_test_sms_response' );
		}

		$last_error = get_transient( 'wpss_send_sms_last_error' );
		if ( is_array( $last_error ) && ! empty( $last_error['message'] ) ) {
			wp_admin_notice( $last_error['message'], array( 'type' => 'error' ) );
			delete_transient( 'wpss_send_sms_last_error' );
		}
	}

	/**
	 * Initialize settings.
	 *
	 * @return void
	 */
	public function init_settings(): void {
		// Section: General Settings.
		add_settings_section(
			'wpss_test_sms_section',
			__( 'Send Test SMS', 'wp-send-sms' ),
			array( $this, 'render_section' ),
			'wpss_test_sms'
		);

		// Option: Country Code.
		$this->register_field_country_code();
		// Option: Phone Number.
		$this->register_field_phone_number();
		// Option: Message.
		$this->register_field_message();
	}

	/**
	 * Render section.
	 *
	 * @return void
	 */
	public function render_section(): void {
		esc_html_e( 'Use this form to send a test SMS message.', 'wp-send-sms' );
	}

	/**
	 * Send test SMS.
	 *
	 * @return void
	 */
	public function send_test_sms(): void {
		if ( ! isset( $_POST['option_page'] ) || $_POST['option_page'] !== 'wpss_test_sms' ) {
			return;
		}

		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'wpss_test_sms-options' ) ) {
			return;
		}

		$phone_number = isset( $_POST['wpss_test_sms_phone_number'] ) ? sanitize_text_field( $_POST['wpss_test_sms_phone_number'] ) : '';
		$message      = isset( $_POST['wpss_test_sms_message'] ) ? sanitize_text_field( $_POST['wpss_test_sms_message'] ) : '';
		$country_code = isset( $_POST['wpss_test_sms_country_code'] ) ? sanitize_text_field( $_POST['wpss_test_sms_country_code'] ) : '';

		$result = wp_send_sms( $phone_number, $message, $country_code );
		if ( ! $result ) {
			$response = array(
				'success' => false,
				'message' => __( 'Failed to send test SMS.', 'wp-send-sms' ),
			);
		} else {
			$response = array(
				'success' => true,
				'message' => __( 'Test SMS sent successfully.', 'wp-send-sms' ),
			);
		}

		set_transient( 'wpss_test_sms_response', $response, 60 );
	}

	/**
	 * Register field country code.
	 *
	 * @return void
	 */
	public function register_field_country_code(): void {
		$field_name    = 'wpss_test_sms_country_code';
		$section_name  = 'wpss_test_sms_section';
		$settings_name = 'wpss_test_sms';

		// phpcs:disable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic
		register_setting(
			$settings_name,
			$field_name,
			array(
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '',
			)
		);
		// phpcs:enable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic

		add_settings_field(
			$field_name,
			__( 'Country Code', 'wp-send-sms' ),
			array( $this, 'render_field_country_code' ),
			$settings_name,
			$section_name,
		);
	}

	/**
	 * Render field country code.
	 *
	 * @return void
	 */
	public function render_field_country_code(): void {
		$field_name    = 'wpss_test_sms_country_code';
		$country_codes = CountryCodes::get_country_codes();
		$options       = wp_list_pluck( $country_codes, 'code' );
		$options       = array_unique( $options );
		?>
		<select name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>">
			<?php
			foreach ( $options as $key => $value ) {
				echo '<option value="' . esc_attr( $value ) . '">+' . esc_html( $value ) . '</option>';
			}
			?>
		</select>
		<p class="description"><?php esc_html_e( 'Select the country code.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Register field phone number.
	 *
	 * @return void
	 */
	public function register_field_phone_number(): void {
		$field_name    = 'wpss_test_sms_phone_number';
		$section_name  = 'wpss_test_sms_section';
		$settings_name = 'wpss_test_sms';

		// phpcs:disable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic
		register_setting(
			$settings_name,
			$field_name,
			array(
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '',
			)
		);
		// phpcs:enable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic

		add_settings_field(
			$field_name,
			__( 'Phone Number', 'wp-send-sms' ),
			array( $this, 'render_field_phone_number' ),
			$settings_name,
			$section_name,
		);
	}

	/**
	 * Render field phone number.
	 *
	 * @return void
	 */
	public function render_field_phone_number(): void {
		$field_name = 'wpss_test_sms_phone_number';
		// input only numbers
		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="" pattern="[0-9]*" inputmode="numeric" />
		<p class="description"><?php esc_html_e( 'Enter the phone number.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Register field message.
	 *
	 * @return void
	 */
	public function register_field_message(): void {
		$field_name    = 'wpss_test_sms_message';
		$section_name  = 'wpss_test_sms_section';
		$settings_name = 'wpss_test_sms';

		// phpcs:disable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic
		register_setting(
			$settings_name,
			$field_name,
			array(
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_textarea_field',
				'default'           => '',
			)
		);
		// phpcs:enable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic

		add_settings_field(
			$field_name,
			__( 'Message', 'wp-send-sms' ),
			array( $this, 'render_field_message' ),
			$settings_name,
			$section_name,
		);
	}

	/**
	 * Render field message.
	 *
	 * @return void
	 */
	public function render_field_message(): void {
		$field_name     = 'wpss_test_sms_message';
		$provider       = get_option( 'wpss_provider', '' );
		$sample_message = sprintf( __( 'This is a test message from WP Send SMS plugin using the %s provider.', 'wp-send-sms' ), esc_html( $provider ) );
		?>
		<textarea name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" rows="5" cols="50"><?php echo esc_html( $sample_message ); ?></textarea>
		<p class="description"><?php esc_html_e( 'Enter the message to send.', 'wp-send-sms' ); ?></p>
		<?php
	}
}
