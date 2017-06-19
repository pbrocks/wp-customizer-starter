<?php

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

new Customizing_with_the_Customizer();

class Customizing_with_the_Customizer {

	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		// add_action( 'customize_preview_init', array( $this, 'plustomizer_live_preview' ) );
	}

	public function enqueue_scripts() {
		if ( true === $this->return_theme_mod( 'plustomizer_css' ) ) {
			wp_enqueue_style( 'plustomizer', plugins_url( '/css/plustomizer.css', __FILE__ ) );
		}
	}

	/**
	 * Used by hook: 'customize_preview_init'
	 *
	 * @see add_action('customize_preview_init',$func)
	 */
	public function plustomizer_live_preview() {
		wp_enqueue_script( 'plustomizer-preview', plugins_url( '/js/plustomizer-preview.js', __FILE__ ), array( 'jquery', 'plustomizer-preview' ), '', true );
	}

	/**
	 * [wp_customizer_manager description]
	 *
	 * @param  [type] $wp_manager [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $wp_manager ) {
		$this->panel_creation( $wp_manager );
	}

	/**
	 * A section to show how you use the default customizer controls in WordPress
	 *
	 * @param Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function panel_creation( $wp_manager ) {
		$wp_manager->add_panel(
			'plustomizer_panel', array(
			'title'       => 'Plustomizer Panel',
			'label'       => 'Plustomizer Panel',
			'description' => 'This is a description of this Plustomizer panel',
			'priority'    => 10,
			)
		);

		$wp_manager->add_section(
			'plustomizer_section', array(
			'title'          => 'Plustomizer Section',
			'label'          => 'Plustomizer Panel',
			'description'    => 'Description of the Plustomizer Section of the Plustomizer panel',
			'priority'       => 35,
			'panel'          => 'plustomizer_panel',
			)
		);

		/**
		 * Checkbox control
		 */
		$wp_manager->add_setting(
			'plustomizer_css', array(
				'default'        => '1',
				)
		);

		$wp_manager->add_control(
			'plustomizer_css', array(
				'label'   => 'Checkbox CSS',
				'section' => 'plustomizer_section',
				'type'    => 'checkbox',
				'description' => 'Description of this Checkbox setting, which equals ' . get_theme_mod( 'plustomizer_css' ) . ' in the Plustomizer Section section of the Plustomizer panel',
				'priority' => 2,
				)
		);

		/**
		 * Textbox control
		 */
		$wp_manager->add_setting(
			'text_setting1', array(
				'default'        => 'Default Value',
			)
		);

		$wp_manager->add_control(
			'text_setting1', array(
				'section'  => 'plustomizer_section',
				'type'     => 'text',
				'label'       => 'Plustomizer Text Setting',
				'description' => $this->return_theme_mod( 'plustomizer_css' ) . ' = This is a description of this text setting in the Simple Customizer Controls section of the Plustomizer panel',
				'priority' => 1,
			)
		);
	}
	/**
	 *
	 */
	function return_theme_mod( $mod ) {
		$return_mod = get_theme_mod( $mod );
		return $return_mod;
	}
}
