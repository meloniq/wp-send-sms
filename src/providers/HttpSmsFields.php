<?php
namespace Meloniq\WpSendSms\Providers;

trait HttpSmsFields {

	/**
	 * Register settings field API Key.
	 *
	 * @return void
	 */
	public function register_field_api_key() : void {
		$field_name    = 'wpss_httpsms_api_key';
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
	 * Register settings field From.
	 *
	 * @return void
	 */
	public function register_field_from() : void {
		$field_name    = 'wpss_httpsms_from';
		$section_name  = 'wpss_section_provider';
		$settings_name = 'wpss_settings';

		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'From', 'wp-send-sms' ),
				'description'       => __( 'Enter the sender name.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => false,
			)
		);

		add_settings_field(
			$field_name,
			__( 'From', 'wp-send-sms' ),
			array( $this, 'render_field_from' ),
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
		$field_name    = 'wpss_httpsms_doc_url';
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
		$field_name = 'wpss_httpsms_api_key';
		$value      = $this->get_option( 'api_key' );

		?>
		<input type="text" id="<?php echo esc_attr( $field_name ); ?>" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the API key.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field From.
	 *
	 * @return void
	 */
	public function render_field_from() : void {
		$field_name = 'wpss_httpsms_from';
		$value      = $this->get_option( 'from' );

		?>
		<input type="text" id="<?php echo esc_attr( $field_name ); ?>" name="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the sender name.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Doc URL.
	 *
	 * @return void
	 */
	public function render_field_doc_url() : void {
		$url = 'https://httpsms.com/settings';
		?>
		<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Account Settings', 'wp-send-sms' ); ?></a>
		<p class="description"><?php esc_html_e( 'Click the link to open the "Account Settings" page.', 'wp-send-sms' ); ?></p>
		<p class="description"><?php esc_html_e( 'You can find there the API key and registered phone numbers.', 'wp-send-sms' ); ?></p>
		<?php
	}

}
