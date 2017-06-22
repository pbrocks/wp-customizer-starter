<?php

defined('ABSPATH') || die('File cannot be accessed directly');

new Customizing_Simple_Section();

class Customizing_Simple_Section {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
	}


	/**
	 * [wp_customizer_manager description]
	 *
	 * @param  [type] $wp_manager [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $wp_manager ) {
		$this->simple_section( $wp_manager );
	}

	/**
	 * A section to show how you use the default customizer controls in WordPress
	 *
	 * @param Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function simple_section( $wp_manager ) {
		$wp_manager->add_section(
			'simple_customizer_section', array(
				'title'          => 'Simple Controls',
				'label'          => 'Plustomizer Panel',
				'description'    => 'Description of the Simple Customizer Controls of the Plustomizer panel',
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
				'section'  => 'simple_customizer_section',
				'type'     => 'text',
				'label'       => 'Plustomizer Text Setting',
				'description' => 'This is a description of this text setting in the Simple Customizer Controls section of the Plustomizer panel',
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
				'title'   => 'Checkbox Setting',
				'section' => 'simple_customizer_section',
				'type'    => 'checkbox',
				'description' => 'Description of this Checkbox setting in the Simple Customizer Controls section of the Plustomizer panel',				'priority' => 2,
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
				'section'     => 'simple_customizer_section',
				'type'        => 'radio',
				'label'       => 'Radio Setting',
				'description' => 'Description of this radio setting in the Simple Customizer Controls section of the Plustomizer panel',
				'choices'     => array( '1', '2', '3' ),
				'priority'    => 3,
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
				'section' => 'simple_customizer_section',
				'type'    => 'select',
				'label'   => 'Select Dropdown Setting',
				'description' => 'Description of this dropdown select setting in the Simple Customizer Controls section of the Plustomizer panel',
				'choices' => array( '1', '2', '3', '4', '5' ),
				'priority' => 4,
			)
		);

		/**
		 * Dropdown pages control
		 */
		$wp_manager->add_setting(
			'dropdown_pages_setting', array(
				'default'     => '1',
			)
		);

		$wp_manager->add_control(
			'dropdown_pages_setting', array(
				'section'     => 'simple_customizer_section',
				'type'        => 'dropdown-pages',
				'label'       => 'Dropdown Pages Setting',
				'description' => 'Description of this dropdown setting in the Simple Customizer Controls section of the Plustomizer panel',
				'priority'    => 5,
			)
		);
	}

}
