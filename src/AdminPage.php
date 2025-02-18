<?php
namespace Meloniq\WpSendSms;

class AdminPage {

	/**
	 * Constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_menu_page' ), 10 );

	}

	/**
	 * Add menu page.
	 *
	 * @return void
	 */
	public function add_menu_page() : void {
		add_submenu_page(
			'options-general.php',
			__( 'WP Send SMS', 'wp-send-sms' ),
			__( 'WP Send SMS', 'wp-send-sms' ),
			'manage_options',
			'wp-send-sms',
			array( $this, 'render_page' )
		);
	}

	/**
	 * Render page.
	 *
	 * @return void
	 */
	public function render_page() : void {
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'WP Send SMS', 'wp-send-sms' ); ?></h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'wpss_settings' );
				do_settings_sections( 'wpss_settings' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

}
