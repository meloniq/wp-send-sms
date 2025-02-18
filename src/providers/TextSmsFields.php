<?php
namespace Meloniq\WpSendSms\Providers;

trait TextSmsFields {

	/**
	 * Register settings field API Key.
	 *
	 * @return void
	 */
	public function register_field_api_key() : void {
		$field_name    = 'wpss_textsms_api_key';
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
	 * Register settings field Partner ID.
	 *
	 * @return void
	 */
	public function register_field_partner_id() : void {
		$field_name    = 'wpss_textsms_partner_id';
		$section_name  = 'wpss_section_provider';
		$settings_name = 'wpss_settings';

		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'Partner ID', 'wp-send-sms' ),
				'description'       => __( 'Enter the Partner ID.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => false,
			)
		);

		add_settings_field(
			$field_name,
			__( 'Partner ID', 'wp-send-sms' ),
			array( $this, 'render_field_partner_id' ),
			$settings_name,
			$section_name,
			array(
				'label_for' => $field_name,
			)
		);
	}

	/**
	 * Register settings field Shortcode.
	 *
	 * @return void
	 */
	public function register_field_shortcode() : void {
		$field_name    = 'wpss_textsms_shortcode';
		$section_name  = 'wpss_section_provider';
		$settings_name = 'wpss_settings';

		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'Shortcode', 'wp-send-sms' ),
				'description'       => __( 'Enter the shortcode.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => false,
			)
		);

		add_settings_field(
			$field_name,
			__( 'Shortcode', 'wp-send-sms' ),
			array( $this, 'render_field_shortcode' ),
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
		$field_name = 'wpss_textsms_api_key';
		$value      = $this->get_option( 'api_key' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the API key.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Partner ID.
	 *
	 * @return void
	 */
	public function render_field_partner_id() : void {
		$field_name = 'wpss_textsms_partner_id';
		$value      = $this->get_option( 'partner_id' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the Partner ID.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Shortcode.
	 *
	 * @return void
	 */
	public function render_field_shortcode() : void {
		$field_name = 'wpss_textsms_shortcode';
		$value      = $this->get_option( 'shortcode' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the shortcode.', 'wp-send-sms' ); ?></p>
		<?php
	}

}
