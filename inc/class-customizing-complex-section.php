<?php

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

new Customizing_Complex_Section();

class Customizing_Complex_Section {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
	}


	/**
	 * [wp_customizer_manager description]
	 *
	 * @param  [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $customizer_additions ) {
		$this->complex_section( $customizer_additions );
	}


	/**
	 * A section to show how you use the default customizer controls in WordPress
	 *
	 * @param Obj $customizer_additions - WP Manager
	 *
	 * @return Void
	 */
	private function complex_section( $customizer_additions ) {
		$customizer_additions->add_section(
			'complex_customizer_section', array(
				'title'          => 'Complex Controls',
				'priority'       => 35,
				'panel'          => 'plustomizer_panel',
				'description' => 'This is a description of this text setting in the Complex Customizer Controls section of the Plustomizer panel',
			)
		);

		/**
		 * Color control
		 */
		$customizer_additions->add_setting(
			'color_setting', array(
				'default'        => '#dd9933',
			)
		);

		$customizer_additions->add_control(
			new WP_Customize_Color_Control(
				$customizer_additions, 'color_setting', array(
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
		$customizer_additions->add_setting(
			'upload_setting', array(
				'default'        => '',
			)
		);

		$customizer_additions->add_control(
			new WP_Customize_Upload_Control(
				$customizer_additions, 'upload_setting', array(
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
		$customizer_additions->add_setting(
			'image_setting', array(
				'default'        => '',
			)
		);

		$customizer_additions->add_control(
			new WP_Customize_Image_Control(
				$customizer_additions, 'image_setting', array(
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
		$customizer_additions->add_setting(
			'background_image_setting', array(
				'default'        => '',
			)
		);

		$customizer_additions->add_control(
			new WP_Customize_Image_Control(
				$customizer_additions, 'background_image_setting', array(
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
		$customizer_additions->add_setting(
			'background_image_setting', array(
				'default'        => '',
			)
		);

		$customizer_additions->add_control(
			new WP_Customize_Background_Image_Control(
				$customizer_additions, 'background_image_setting', array(
					'label'   => 'Background Image Setting',
					'section' => 'complex_customizer_section',
					'settings'   => 'background_image_setting',
					'priority' => 9,
				)
			)
		);
	}

}
