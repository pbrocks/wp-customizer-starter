<?php
new Customizing_Complex_Section();

class Customizing_Complex_Section {
	public function __construct() {
		add_action('customize_register', array( $this, 'wp_customizer_manager' ));
	}


	/**
	 * [wp_customizer_manager description]
	 *
	 * @param  [type] $wp_manager [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $wp_manager ) {
		$this->complex_section( $wp_manager );
	}


	/**
	 * A section to show how you use the default customizer controls in WordPress
	 *
	 * @param Obj $wp_manager - WP Manager
	 *
	 * @return Void
	 */
	private function complex_section( $wp_manager ) {
		$wp_manager->add_section(
			'complex_customizer_section', array(
				'title'          => 'Complex Controls',
				'priority'       => 35,
				'panel'          =>  'plustomizer_panel',
				'description' => 'This is a description of this text setting in the Complex Customizer Controls section of the Plustomizer panel',
			)
		);

		/**
		 * Color control
		 */
		$wp_manager->add_setting(
			'color_setting', array(
				'default'        => '#dd9933',
			)
		);

		$wp_manager->add_control(
			new WP_Customize_Color_Control(
				$wp_manager, 'color_setting', array(
					'label'   => 'Color Setting',
					'section' => 'complex_customizer_section',
					'settings'   => 'color_setting',
					'priority' => 6,
				)
			)
		);

		/**
		 * WP_Customize_Upload_Control
		 */
		$wp_manager->add_setting(
			'upload_setting', array(
				'default'        => '',
			)
		);

		$wp_manager->add_control(
			new WP_Customize_Upload_Control(
				$wp_manager, 'upload_setting', array(
					'label'   => 'Upload Setting',
					'section' => 'complex_customizer_section',
					'settings'   => 'upload_setting',
					'priority' => 7,
				)
			)
		);

		/**
		 * WP_Customize_Image_Control
		 */
		$wp_manager->add_setting(
			'image_setting', array(
				'default'        => '',
			)
		);

		$wp_manager->add_control(
			new WP_Customize_Image_Control(
				$wp_manager, 'image_setting', array(
					'label'   => 'Image Setting',
					'section' => 'complex_customizer_section',
					'settings'   => 'image_setting',
					'priority' => 8,
				)
			)
		);

		/**
		 * WP_Customize_Background_Image_Control
		 */
		$wp_manager->add_setting(
			'background_image_setting', array(
				'default'        => '',
			)
		);

		$wp_manager->add_control(
			new WP_Customize_Image_Control(
				$wp_manager, 'background_image_setting', array(
					'label'   => 'Background Image Setting',
					'section' => 'complex_customizer_section',
					'settings'   => 'background_image_setting',
					'priority' => 9,
				)
			)
		);

		/**
		 * WP_Customize_Background_Image_Control
		 */
		$wp_manager->add_setting(
			'background_image_setting', array(
				'default'        => '',
			)
		);

		$wp_manager->add_control(
			new WP_Customize_Background_Image_Control(
				$wp_manager, 'background_image_setting', array(
					'label'   => 'Background Image Setting',
					'section' => 'complex_customizer_section',
					'settings'   => 'background_image_setting',
					'priority' => 9,
				)
			)
		);
	}

}
