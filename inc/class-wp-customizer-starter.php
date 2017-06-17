<?php

defined('ABSPATH') || die('File cannot be accessed directly');

new Customizing_with_the_Customizer();

class Customizing_with_the_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
        // add_action('customize_register', array( $this, 'include_advanced_section' ) );
	}


	/**
	 * [wp_customizer_manager description]
	 *
	 * @param  [type] $wp_manager [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $wp_manager ) {
		// $this->simple_section( $wp_manager );
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
			'title'       => 'Plustomizer',
			'description' => 'This is a description of this Plustomizer panel',
			'priority'    => 10,
		) );

		$wp_manager->add_section(
			'simple_customizer_section', array(
				'title'          => 'Simple Customizer Controls',
				'priority'       => 35,
				'panel'          =>  'plustomizer_panel',
			)
		);

		/**
		 * Textbox control
		 */
		$wp_manager->add_setting(
			'textbox_setting', array(
				'default'        => 'Default Value',
			)
		);

		$wp_manager->add_control(
			'textbox_setting', array(
				'label'    => 'Text Setting',
				'section'  => 'simple_customizer_section',
				'type'     => 'text',
				'priority' => 1,
			)
		);

		/**
		 * Checkbox control
		 */
		$wp_manager->add_setting(
			'checkbox_setting', array(
				'default'        => '1',
			)
		);

		$wp_manager->add_control(
			'checkbox_setting', array(
				'label'   => 'Checkbox Setting',
				'section' => 'simple_customizer_section',
				'type'    => 'checkbox',
				'priority' => 2,
			)
		);

		/**
		 * Radio control
		 */
		$wp_manager->add_setting(
			'radio_setting', array(
				'default'        => '1',
			)
		);

		$wp_manager->add_control(
			'radio_setting', array(
				'label'   => 'Radio Setting',
				'section' => 'simple_customizer_section',
				'type'    => 'radio',
				'choices' => array( '1', '2', '3', '4', '5' ),
				'priority' => 3,
			)
		);

		/**
		 * Select control
		 */
		$wp_manager->add_setting(
			'select_setting', array(
				'default'        => '1',
			)
		);

		$wp_manager->add_control(
			'select_setting', array(
				'label'   => 'Select Dropdown Setting',
				'section' => 'simple_customizer_section',
				'type'    => 'select',
				'choices' => array( '1', '2', '3', '4', '5' ),
				'priority' => 4,
			)
		);

		/**
		 * Dropdown pages control
		 */
		$wp_manager->add_setting(
			'dropdown_pages_setting', array(
				'default'        => '1',
			)
		);

		$wp_manager->add_control(
			'dropdown_pages_setting', array(
				'label'   => 'Dropdown Pages Setting',
				'section' => 'simple_customizer_section',
				'type'    => 'dropdown-pages',
				'priority' => 5,
			)
		);
	}

}
