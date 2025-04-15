<?php
namespace Meloniq\WpSendSms\Providers;

trait UnimatrixFields {

	/**
	 * Register settings field API Key.
	 *
	 * @return void
	 */
	public function register_field_api_key() : void {
		$field_name    = 'wpss_unimatrix_api_key';
		$section_name  = 'wpss_section_provider';
		$settings_name = 'wpss_settings';

		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'AccessKey ID', 'wp-send-sms' ),
				'description'       => __( 'Enter the AccessKey ID.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => false,
			)
		);

		add_settings_field(
			$field_name,
			__( 'AccessKey ID', 'wp-send-sms' ),
			array( $this, 'render_field_api_key' ),
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
		$field_name    = 'wpss_unimatrix_doc_url';
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
		$field_name = 'wpss_unimatrix_api_key';
		$value      = $this->get_option( 'api_key' );

		?>
		<input type="text" name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
		<p class="description"><?php esc_html_e( 'Enter the AccessKey ID.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Doc URL.
	 *
	 * @return void
	 */
	public function render_field_doc_url() : void {
		$url = 'https://console.unimtx.com/credentials';
		?>
		<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Credentials', 'wp-send-sms' ); ?></a>
		<p class="description"><?php esc_html_e( 'Click the link to open your "Credentials" page.', 'wp-send-sms' ); ?></p>
		<p class="description"><?php esc_html_e( 'You can find there the AccessKey ID.', 'wp-send-sms' ); ?></p>
		<?php
	}

}
