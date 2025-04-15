<?php
namespace Meloniq\WpSendSms;

use Meloniq\WpSendSms\Providers\AbstractProvider;
use Meloniq\WpSendSms\Providers\AdvantaSms;
use Meloniq\WpSendSms\Providers\EasySendSms;
use Meloniq\WpSendSms\Providers\HttpSms;
use Meloniq\WpSendSms\Providers\TextBee;
use Meloniq\WpSendSms\Providers\TextSms;
use Meloniq\WpSendSms\Providers\Unimatrix;


class Settings {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'init_settings' ), 10 );

	}

	/**
	 * Initialize settings.
	 *
	 * @return void
	 */
	public function init_settings() : void {
		// Section: General Settings.
		add_settings_section(
			'wpss_section',
			__( 'General Settings', 'wp-send-sms' ),
			array( $this, 'render_section' ),
			'wpss_settings'
		);

		// Option: Select Provider.
		$this->register_field_provider();

		// Option: Select default country code.
		$this->register_field_country_code();

		// Provider settings.
		$this->init_settings_provider();
	}

	/**
	 * Initialize provider settings.
	 *
	 * @return void
	 */
	public function init_settings_provider() : void {
		$provider = $this->get_provider_instance();
		if ( empty( $provider ) ) {
			return;
		}

		// Section: Provider Settings.
		add_settings_section(
			'wpss_section_provider',
			__( 'Provider Settings', 'wp-send-sms' ),
			array( $this, 'render_section_provider' ),
			'wpss_settings'
		);

		$provider->register_settings();
	}

	/**
	 * Render section.
	 *
	 * @return void
	 */
	public function render_section() : void {
		esc_html_e( 'Settings for the SMS sending service.', 'wp-send-sms' );
	}

	/**
	 * Render section provider.
	 *
	 * @return void
	 */
	public function render_section_provider() : void {
		esc_html_e( 'Settings for the SMS provider.', 'wp-send-sms' );
	}

	/**
	 * Register settings field Select Provider.
	 *
	 * @return void
	 */
	public function register_field_provider() : void {
		$field_name    = 'wpss_provider';
		$section_name  = 'wpss_section';
		$settings_name = 'wpss_settings';

		// phpcs:disable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic
		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'Select Provider', 'wp-send-sms' ),
				'description'       => __( 'Select the SMS provider.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '',
				'show_in_rest'      => false,
			),
		);
		// phpcs:enable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic

		add_settings_field(
			$field_name,
			__( 'Select Provider', 'wp-send-sms' ),
			array( $this, 'render_field_provider' ),
			$settings_name,
			$section_name,
			array(
				'label_for' => $field_name,
			),
		);
	}

	/**
	 * Register settings field Select default country code.
	 *
	 * @return void
	 */
	public function register_field_country_code() : void {
		$field_name    = 'wpss_country_code';
		$section_name  = 'wpss_section';
		$settings_name = 'wpss_settings';

		// phpcs:disable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic
		register_setting(
			$settings_name,
			$field_name,
			array(
				'label'             => __( 'Select Country Code', 'wp-send-sms' ),
				'description'       => __( 'Select the default country code.', 'wp-send-sms' ),
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => '',
				'show_in_rest'      => false,
			),
		);
		// phpcs:enable PluginCheck.CodeAnalysis.SettingSanitization.register_settingDynamic

		add_settings_field(
			$field_name,
			__( 'Select Country Code', 'wp-send-sms' ),
			array( $this, 'render_field_country_code' ),
			$settings_name,
			$section_name,
			array(
				'label_for' => $field_name,
			),
		);
	}

	/**
	 * Render settings field Select Provider.
	 *
	 * @return void
	 */
	public function render_field_provider() : void {
		$field_name = 'wpss_provider';

		$provider  = get_option( $field_name, '' );
		$providers = $this->get_providers();
		?>
		<select name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>">
			<option value=""><?php esc_html_e( 'Select Provider', 'wp-send-sms' ); ?></option>
			<?php
			foreach ( $providers as $key => $instance ) {
				$selected = selected( $provider, $key, false );
				echo '<option value="' . esc_attr( $key ) . '" ' . $selected . '>' . esc_html( $instance->get_name() ) . '</option>';
			}
			?>
		</select>
		<p class="description"><?php esc_html_e( 'Select the SMS provider, save the settings and then configure the provider settings.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Render settings field Select default country code.
	 *
	 * @return void
	 */
	public function render_field_country_code() : void {
		$field_name = 'wpss_country_code';
		$country_code = get_option( $field_name, '' );
		$country_codes = CountryCodes::get_country_codes();
		?>
		<select name="<?php echo esc_attr( $field_name ); ?>" id="<?php echo esc_attr( $field_name ); ?>">
			<?php
			foreach ( $country_codes as $id => $details ) {
				$selected = selected( $country_code, $details['code'], false );
				echo '<option value="' . esc_attr( $details['code'] ) . '" ' . $selected . '>+' . esc_html( $details['code'] ) . ' (' . $details['name'] . ')</option>';
			}
			?>
		</select>
		<p class="description"><?php esc_html_e( 'Select the default country code.', 'wp-send-sms' ); ?></p>
		<?php
	}

	/**
	 * Get providers.
	 *
	 * @return array
	 */
	public function get_providers() : array {
		$providers = array(
			'AdvantaSms'  => new AdvantaSms(),
			'EasySendSms' => new EasySendSms(),
			'HttpSms'     => new HttpSms(),
			'TextBee'     => new TextBee(),
			'TextSms'     => new TextSms(),
			'Unimatrix'   => new Unimatrix(),
		);

		$providers = apply_filters( 'wpss_providers', $providers );

		return $providers;
	}

	/**
	 * Get provider instance.
	 *
	 * @return AbstractProvider|null
	 */
	public function get_provider_instance() : ?AbstractProvider {
		$provider = get_option( 'wpss_provider' );
		if ( empty( $provider ) ) {
			return null;
		}

		$providers = $this->get_providers();
		if ( ! isset( $providers[ $provider ] ) ) {
			error_log( 'Provider not found: ' . $provider );
			return null;
		}

		return $providers[ $provider ];
	}

}
