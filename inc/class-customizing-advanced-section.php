<?php
new Customizing_Advanced_Section();

class Customizing_Advanced_Section {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
	}

	/**
	 * [wp_customizer_manager description]
	 *
	 * @param [type] $wp_manager [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $wp_manager ) {
		$this->advanced_sections( $wp_manager );
	}

	/**
	 * The advanced_sections function adds a new section
	 * to the Customizer to display the settings and
	 * controls that we build.
	 *
	 * @param  [type] $wp_manager [description]
	 * @return [type]             [description]
	 */
	private function advanced_sections( $wp_manager ) {
		// $wp_manager->add_panel( 'plustomizer_panel', array(
		// 'title'       => 'Plustomizer',
		// 'description' => 'This is a description of this Plustomizer panel',
		// 'priority'    => 10,
		// ) );
		$wp_manager->add_section(
			'advanced_controls_section', array(
				'title'          => 'Advanced Customizer Controls',
				'priority'       => 36,
				'panel'          => 'plustomizer_panel',
				'description' => 'This is a description of this text setting in the Advanced Customizer Controls section of the Plustomizer panel',
			)
		);

		/**
		 * Adding Date Picker
		 */
		include_once dirname( __FILE__ ) . '/controls/date/date-picker-custom-control.php';
		$wp_manager->add_setting(
			'date_picker_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Date_Picker_Custom_Control(
				$wp_manager, 'date_picker_setting', array(
					'title'   => 'Date Picker Setting',
					'label'   => 'Date Picker Setting',
					'section' => 'advanced_controls_section',
					'settings'   => 'date_picker_setting',
					'priority' => 1,
				)
			)
		);

		/**
		 * Adding a Layout Picker
		 */
		include_once dirname( __FILE__ ) . '/controls/layout/layout-picker-custom-control.php';
		$wp_manager->add_setting(
			'layout_picker_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Layout_Picker_Custom_Control(
				$wp_manager, 'layout_picker_setting', array(
					'label'      => 'Layout Picker Setting',
					'section'    => 'advanced_controls_section',
					'settings'   => 'layout_picker_setting',
					'priority'   => 2,
				)
			)
		);

		/**
		 * Adding a category dropdown control.
		 */
		include_once dirname( __FILE__ ) . '/controls/select/category-dropdown-custom-control.php';
		$wp_manager->add_setting(
			'category_dropdown_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Category_Dropdown_Custom_Control(
				$wp_manager, 'category_dropdown_setting', array(
					'label'      => 'Category Dropdown Setting',
					'section'    => 'advanced_controls_section',
					'settings'   => 'category_dropdown_setting',
					'priority'   => 3,
				)
			)
		);

		/**
		 * Adding a menu dropdown control
		 */
		include_once dirname( __FILE__ ) . '/controls/select/menu-dropdown-custom-control.php';
		$wp_manager->add_setting(
			'menu_dropdown_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Menu_Dropdown_Custom_Control(
				$wp_manager, 'menu_dropdown_setting', array(
					'label'      => 'Menu Dropdown Setting',
					'section'    => 'advanced_controls_section',
					'settings'   => 'menu_dropdown_setting',
					'priority'   => 4,
				)
			)
		);

		/**
		 * Adding a post dropdown control
		 */
		include_once dirname( __FILE__ ) . '/controls/select/post-dropdown-custom-control.php';
		$wp_manager->add_setting(
			'post_dropdown_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Post_Dropdown_Custom_Control(
				$wp_manager, 'post_dropdown_setting', array(
					'label'   => 'Post Dropdown Setting',
					'section' => 'advanced_controls_section',
					'settings'   => 'post_dropdown_setting',
					'priority' => 5,
				)
			)
		);

		/**
		 * Adding a post type dropdown control
		 */
		include_once dirname( __FILE__ ) . '/controls/select/post-type-dropdown-custom-control.php';
		$wp_manager->add_setting(
			'post_type_dropdown_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Post_Type_Dropdown_Custom_Control(
				$wp_manager, 'post_type_dropdown_setting', array(
					'label'    => 'Post Type Dropdown Setting',
					'section'  => 'advanced_controls_section',
					'settings' => 'post_type_dropdown_setting',
					'priority' => 6,
				)
			)
		);

		/**
		 * Adding a tags dropdown control
		 */
		include_once dirname( __FILE__ ) . '/controls/select/tags-dropdown-custom-control.php';
		$wp_manager->add_setting(
			'tags_dropdown_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Tags_Dropdown_Custom_Control(
				$wp_manager, 'tags_dropdown_setting', array(
					'label'    => 'Tags Dropdown Setting',
					'section'  => 'advanced_controls_section',
					'settings' => 'tags_dropdown_setting',
					'priority' => 7,
				)
			)
		);

		/**
		 * Adding a taxonomy dropdown control
		 */
		include_once dirname( __FILE__ ) . '/controls/select/taxonomy-dropdown-custom-control.php';
		$wp_manager->add_setting(
			'taxonomy_dropdown_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Taxonomy_Dropdown_Custom_Control(
				$wp_manager, 'taxonomy_dropdown_setting', array(
					'label'     => 'Taxonomy Dropdown Setting',
					'section'   => 'advanced_controls_section',
					'settings'  => 'taxonomy_dropdown_setting',
					'priority'  => 8,
				)
			)
		);

		/**
		 * Adding a user dropdown control
		 */
		include_once dirname( __FILE__ ) . '/controls/select/user-dropdown-custom-control.php';
		$wp_manager->add_setting(
			'user_dropdown_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new User_Dropdown_Custom_Control(
				$wp_manager, 'user_dropdown_setting', array(
					'label'   => 'User Dropdown Setting',
					'section' => 'advanced_controls_section',
					'settings'   => 'user_dropdown_setting',
					'priority' => 9,
				)
			)
		);

		/**
		 * Adding a textarea control
		 */
		include_once dirname( __FILE__ ) . '/controls/text/textarea-custom-control.php';
		$wp_manager->add_setting(
			'textarea_text_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Textarea_Custom_Control(
				$wp_manager, 'textarea_text_setting', array(
					'label'   => 'Textarea Text Setting',
					'section' => 'advanced_controls_section',
					'settings'   => 'textarea_text_setting',
					'priority' => 10,
				)
			)
		);

		/**
		 * Adding a text editor control
		 */
		include_once dirname( __FILE__ ) . '/controls/text/text-editor-custom-control.php';
		$wp_manager->add_setting(
			'text_editor_setting', array(
				'default'        => '',
			)
		);
		$wp_manager->add_control(
			new Text_Editor_Custom_Control(
				$wp_manager, 'text_editor_setting', array(
					'label'   => 'Text Editor Setting',
					'section' => 'advanced_controls_section',
					'settings'   => 'text_editor_setting',
					'priority' => 11,
				)
			)
		);

		/**
		 *  Adding a Google Font control
		 */
		// require_once dirname( __FILE__ ) . '/controls/select/google-font-dropdown-custom-control.php';
		// $wp_manager->add_setting( 'google_font_setting', array(
		// 'default'        => '',
		// ) );
		// $wp_manager->add_control( new Google_Font_Dropdown_Custom_Control( $wp_manager, 'google_font_setting', array(
		// 'label'   => 'Google Font Setting',
		// 'section' => 'advanced_controls_section',
		// 'settings'   => 'google_font_setting',
		// 'priority' => 12
		// ) ) );
	}
}
