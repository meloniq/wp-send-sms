<?php
namespace Meloniq\WpSendSms;

trait UnimatrixFields {

	/**
	 * Register settings field API Key.
	 *
	 * @return void
	 */
	public function register_field_api_key() : void {
		$field_name    = 'wpss_unimatrix_api_key';
		$section_name  = 'wpss_section';
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
	 * Render settings field API Key.
	 *
	 * @return void
	 */
	public function render_field_api_key() : void {
		$field_name = 'wpss_unimatrix_api_key';
		$value      = $this->get_option( 'api_key' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the API key.', 'wp-send-sms' ); ?></p>
		<?php
	}

}
