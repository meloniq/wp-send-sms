<?php
namespace Meloniq\WpSendSms;

class TestSmsPage {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu_page' ), 10 );
		add_action( 'admin_init', array( $this, 'init_settings' ), 10 );

	}

	/**
	 * Add menu page.
	 *
	 * @return void
	 */
	public function add_menu_page() : void {
		add_submenu_page(
			'tools.php',
			__( 'Test SMS', 'wp-send-sms' ),
			__( 'Test SMS', 'wp-send-sms' ),
			'manage_options',
			'test-sms',
			array( $this, 'render_page' )
		);
	}

	/**
	 * Render page.
	 *
	 * @return void
	 */
	public function render_page() : void {
		$result = '';
		if ( isset( $_POST['option_page'] ) && $_POST['option_page'] === 'wpss_test_sms' ) {
			$response = $this->send_test_sms();
			if ( $response['success'] ) {
				$result = '<div class="notice notice-success"><p>' . esc_html( $response['message'] ) . '</p></div>';
			} else {
				$result = '<div class="notice notice-error"><p>' . esc_html( $response['message'] ) . '</p></div>';
			}
			echo $result;
		}
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Test SMS', 'wp-send-sms' ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'wpss_test_sms' );
				do_settings_sections( 'wpss_test_sms' );

				$this->render_field_country_code();
				$this->render_field_phone_number();
				$this->render_field_message();

				submit_button();
				?>
			</form>
			<div id="wpss-test-sms-result"></div>
		</div>
		<?php
	}

	/**
	 * Initialize settings.
	 *
	 * @return void
	 */
	public function init_settings() : void {
		// Section: General Settings.
		add_settings_section(
			'wpss_test_sms_section',
			__( 'Send Test SMS', 'wp-send-sms' ),
			array( $this, 'render_section' ),
			'wpss_test_sms'
		);

	}

	/**
	 * Render section.
	 *
	 * @return void
	 */
	public function render_section() : void {
		esc_html_e( 'Use this form to send a test SMS message.', 'wp-send-sms' );
	}

	/**
	 * Send test SMS.
	 *
	 * @return array
	 */
	public function send_test_sms() : array {
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

		return $response;
	}

	/**
	 * Render field country code.
	 *
	 * @return void
	 */
	public function render_field_country_code() : void {
		$field_name = 'wpss_test_sms_country_code';
		$country_codes = CountryCodes::get_country_codes();
		$options = wp_list_pluck( $country_codes, 'code' );
		$options = array_unique( $options );
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
	 * Render field phone number.
	 *
	 * @return void
	 */
	public function render_field_phone_number() : void {
		$field_name = 'wpss_test_sms_phone_number';
		// input only numbers
		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="" pattern="[0-9]*" inputmode="numeric" />
		<p class="description"><?php esc_html_e( 'Enter the phone number.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render field message.
	 *
	 * @return void
	 */
	public function render_field_message() : void {
		$field_name = 'wpss_test_sms_message';
		$provider  = get_option( 'wpss_provider', '' );
		$sample_message = sprintf( __( 'This is a test message from WP Send SMS plugin using the %s provider.', 'wp-send-sms' ), esc_html( $provider ) );
		?>
		<textarea name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" rows="5" cols="50">
			<?php echo esc_html( $sample_message ); ?>
		</textarea>
		<p class="description"><?php esc_html_e( 'Enter the message to send.', 'wp-send-sms' ); ?></p>
		<?php
	}
}
