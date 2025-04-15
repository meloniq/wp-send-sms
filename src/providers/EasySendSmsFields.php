<?php
namespace Meloniq\WpSendSms\Providers;

trait EasySendSmsFields {

	/**
	 * Register settings field API Key.
	 *
	 * @return void
	 */
	public function register_field_api_key() : void {
		$field_name    = 'wpss_easysendsms_api_key';
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
	 * Register settings field Sender Name.
	 *
	 * @return void
	 */
	public function register_field_sender_name() : void {
		$field_name    = 'wpss_easysendsms_sender_name';
		$section_name  = 'wpss_section_provider';
		$settings_name = 'wpss_settings';

		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'Sender Name', 'wp-send-sms' ),
				'description'       => __( 'Enter the sender name.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => false,
			)
		);

		add_settings_field(
			$field_name,
			__( 'Sender Name', 'wp-send-sms' ),
			array( $this, 'render_field_sender_name' ),
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
		$field_name    = 'wpss_easysendsms_doc_url';
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
		$field_name = 'wpss_easysendsms_api_key';
		$value      = $this->get_option( 'api_key' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the API key.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Sender Name.
	 *
	 * @return void
	 */
	public function render_field_sender_name() : void {
		$field_name = 'wpss_easysendsms_sender_name';
		$value      = $this->get_option( 'sender_name' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Sender Name that the message will appear from. Max Length of 15 if numeric. Max Length of 11 if alphanumeric.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Doc URL.
	 *
	 * @return void
	 */
	public function render_field_doc_url() : void {
		$url = 'https://my.easysendsms.app/settings';
		?>
		<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Account Settings', 'wp-send-sms' ); ?></a>
		<p class="description"><?php esc_html_e( 'Click the link to open the "Account Settings -> Rest Api" page.', 'wp-send-sms' ); ?></p>
		<p class="description"><?php esc_html_e( 'You can find the API key in the "API Key" field.', 'wp-send-sms' ); ?></p>
		<?php
	}

}
