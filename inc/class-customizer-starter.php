<?php

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

class Customizer_Starter {
	/**
	 * Menu slug
	 *
	 * @var string
	 */
	protected $slug = 'customizer-starter';
	/**
	 * URL for assets
	 *
	 * @var string
	 */
	protected $assets_url;
	/**
	 * Customizer_Starter constructor.
	 *
	 * @param string $assets_url URL for assets
	 */
	public function __construct( $assets_url ) {
		$this->assets_url = $assets_url;
		add_action( 'admin_menu', array( $this, 'add_page' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_assets' ) );
	}
	/**
	 * Add CF Popup submenu page
	 *
	 * @since 0.0.3
	 *
	 * @uses "admin_menu"
	 */
	public function add_page() {
		add_menu_page(
			__( 'Customizer Starter Page', 'wp-customizer-starter' ),
			__( 'Customizer Starter Page', 'wp-customizer-starter' ),
			'manage_options',
			$this->slug,
			array( $this, 'render_admin' ),
			'dashicons-welcome-widgets-menus',
			12
		);
	}
	/**
	 * Register CSS and JS for page
	 *
	 * @uses "admin_enqueue_scripts" action
	 */
	public function register_assets() {
		wp_register_script( $this->slug, $this->assets_url . 'inc/js/customizer-settings.js', array( 'jquery' ) );
		wp_register_style( $this->slug, $this->assets_url . 'inc/css/customizer-starter.css' );
		wp_localize_script( $this->slug, 'CUSTMIZR', array(
			'strings' => array(
				'saved' => __( 'Settings Saved', 'wp-customizer-starter' ),
				'error' => __( 'Error', 'wp-customizer-starter' ),
			),
			'api'     => array(
				'url'   => esc_url_raw( rest_url( 'customizer-starter-api/v1/settings' ) ),
				'nonce' => wp_create_nonce( 'wp_rest' ),
			),
		) );
	}
	/**
	 * Enqueue CSS and JS for page
	 */
	public function enqueue_assets() {
		if ( ! wp_script_is( $this->slug, 'registered' ) ) {
			$this->register_assets();
		}
		wp_enqueue_script( $this->slug );
		wp_enqueue_style( $this->slug );
	}
	/**
	 * Render plugin admin page
	 */
	public function render_admin() {
		$this->enqueue_assets();
		echo '<div class="wrap">';
		echo '<h2>Put your form here!</h2>';
		$options = get_option( '_customizer_starter_settings' );

		if ( $options ) {
			echo '<pre>';
			print_r( $options );
			echo '</pre>';
		} else {
			echo '<h2>Nothing Set</h2>';
		}

		// Render the output.
		echo '<label>
			<span class="customize-control-title">Industry Label </span><input type="text" id="industry" name="_customizer_starter_settings[industry]" value="' . $options['industry'] . '" /></label>';

		echo '</div><!-- .wrap -->';
	}
}
