<?php

defined('ABSPATH') || die('File cannot be accessed directly');

new Customizing_with_the_Customizer();

class Customizing_with_the_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		// add_action( 'customize_preview_init', array( $this, 'plustomizer_live_preview' ) );

	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'plustomizer', plugins_url( '/css/plustomizer.css', __FILE__ ) );
	}

	/**
	 * Used by hook: 'customize_preview_init'
	 * 
	 * @see add_action('customize_preview_init',$func)
	 */
	function plustomizer_live_preview() {
		wp_enqueue_script( 'plustomizer-preview', plugins_url( '/js/plustomizer-preview.js', __FILE__ ), array( 'jquery','customize-preview' ), '', true );
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
		$wp_manager->add_panel( 'plustomizer_panel', array(
			'title'       => 'Plustomizer Panel',
			'label'       => 'Plustomizer Panel',
			'description' => 'This is a description of this Plustomizer panel',
			'priority'    => 10,
		) );
	}
}
