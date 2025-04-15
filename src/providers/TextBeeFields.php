<?php
namespace Meloniq\WpSendSms\Providers;

trait TextBeeFields {

	/**
	 * Register settings field API Key.
	 *
	 * @return void
	 */
	public function register_field_api_key() : void {
		$field_name    = 'wpss_textbee_api_key';
		$section_name  = 'wpss_section_provider';
		$settings_name = 'wpss_settings';

		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'API Key', 'wp-send-sms' ),
				'description'       => __( 'Enter the API key.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => false,
			)
		);

		add_settings_field(
			$field_name,
			__( 'API Key', 'wp-send-sms' ),
			array( $this, 'render_field_api_key' ),
			$settings_name,
			$section_name,
			array(
				'label_for' => $field_name,
			)
		);
	}

	/**
	 * Register settings field Device ID.
	 *
	 * @return void
	 */
	public function register_field_device_id() : void {
		$field_name    = 'wpss_textbee_device_id';
		$section_name  = 'wpss_section_provider';
		$settings_name = 'wpss_settings';

		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'Device ID', 'wp-send-sms' ),
				'description'       => __( 'Enter the device ID.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => false,
			)
		);

		add_settings_field(
			$field_name,
			__( 'Device ID', 'wp-send-sms' ),
			array( $this, 'render_field_device_id' ),
			$settings_name,
			$section_name,
			array(
				'label_for' => $field_name,
			)
		);
	}

	/**
	 * Register settings field Doc URL.
	 *
	 * @return void
	 */
	public function register_field_doc_url() : void {
		$field_name    = 'wpss_textbee_doc_url';
		$section_name  = 'wpss_section_provider';
		$settings_name = 'wpss_settings';

		add_settings_field(
			$field_name,
			__( 'Documentation', 'wp-send-sms' ),
			array( $this, 'render_field_doc_url' ),
			$settings_name,
			$section_name,
			array(
				'label_for' => $field_name,
			)
		);
	}

	/**
	 * Render settings field API Key.
	 *
	 * @return void
	 */
	public function render_field_api_key() : void {
		$field_name = 'wpss_textbee_api_key';
		$value      = $this->get_option( 'api_key' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the API key.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Device ID.
	 *
	 * @return void
	 */
	public function render_field_device_id() : void {
		$field_name = 'wpss_textbee_device_id';
		$value      = $this->get_option( 'device_id' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the device ID.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Doc URL.
	 *
	 * @return void
	 */
	public function render_field_doc_url() : void {
		$url = 'https://textbee.dev/dashboard';
		?>
		<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Dashboard', 'wp-send-sms' ); ?></a>
		<p class="description"><?php esc_html_e( 'Click the link to open your "Dashboard" page.', 'wp-send-sms' ); ?></p>
		<p class="description"><?php esc_html_e( 'You can find the API key in the "API Keys" section, and the Device ID in the "Registered Devices" section.', 'wp-send-sms' ); ?></p>
		<?php
	}

}
