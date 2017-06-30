<?php
new Customizing_Advanced_Section();

class Customizing_Advanced_Section {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
	}

	/**
	 * [wp_customizer_manager description]
	 *
	 * @param [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $customizer_additions ) {
		$this->advanced_section( $customizer_additions );
	}

	/**
	 * The advanced_section function adds a new section
	 * to the Customizer to display the settings and
	 * controls that we build.
	 *
	 * @param  [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	private function advanced_section( $customizer_additions ) {
		// $customizer_additions->add_panel( 'plustomizer_panel', array(
		// 'title'       => 'Plustomizer',
		// 'description' => 'This is a description of this Plustomizer panel',
		// 'priority'    => 10,
		// ) ); https://developer.wordpress.org/reference/functions/comment_form/
		$customizer_additions->add_section(
			'advanced_controls_section', array(
				'title'          => 'Advanced Controls',
				'priority'       => 16,
				'panel'          => 'plustomizer_panel',
				'description' => 'This is a description of this text setting in the Advanced Customizer Controls section of the Plustomizer panel in <h4>' . __FILE__ . '</h4>',
			)
		);

		$customizer_additions->add_setting( 'show_something', array(
			'default'        => 'false',
		) );

		/**
		 * Adding a Checkbox Toggle
		 */
		if ( ! class_exists( 'Customizer_Toggle_Control' ) ) {
			require_once dirname( __FILE__ ) . '/controls/checkbox/toggle-control.php';
		}

		$customizer_additions->add_control( new Customizer_Toggle_Control( $customizer_additions,
			'show_something', array(
				'label'   => 'Show Something',
				'description'   => 'Show Something => slide to turn on setting. Toggle is equivalent to a checkbox.',
				'section' => 'advanced_controls_section',
				'type'    => 'ios',
				'priority' => 1,
			)
		) );

		/**
		 * Adding Date Picker
		 */
		if ( ! class_exists( 'Date_Picker_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/date/date-picker-custom-control.php';
		}

		$customizer_additions->add_setting(
			'date_picker_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Date_Picker_Custom_Control(
				$customizer_additions, 'date_picker_setting', array(
					'title'   => 'Date P1ker Setting',
					'label'   => 'Date Peliker Setting => ' . $theme_mod,
					'description'   => 'Date Peliker Set in Date Peliker Setting',
					'section' => 'advanced_controls_section',
					'settings'   => 'date_picker_setting',
					'priority' => 2,
				)
			)
		);

		/**
		 * Adding a Layout Picker
		 */
		if ( ! class_exists( 'Layout_Picker_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/layout/layout-picker-custom-control.php';
		}
		$customizer_additions->add_setting(
			'layout_picker_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Layout_Picker_Custom_Control(
				$customizer_additions, 'layout_picker_setting', array(
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
		if ( ! class_exists( 'Category_Dropdown_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/select/category-dropdown-custom-control.php';
		}
		$customizer_additions->add_setting(
			'category_dropdown_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Category_Dropdown_Custom_Control(
				$customizer_additions, 'category_dropdown_setting', array(
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
		if ( ! class_exists( 'Menu_Dropdown_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/select/menu-dropdown-custom-control.php';
		}
		$customizer_additions->add_setting(
			'menu_dropdown_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Menu_Dropdown_Custom_Control(
				$customizer_additions, 'menu_dropdown_setting', array(
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
		if ( ! class_exists( 'Post_Dropdown_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/select/post-dropdown-custom-control.php';
		}
		$customizer_additions->add_setting(
			'post_dropdown_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Post_Dropdown_Custom_Control(
				$customizer_additions, 'post_dropdown_setting', array(
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
		if ( ! class_exists( 'Post_Type_Dropdown_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/select/post-type-dropdown-custom-control.php';
		}
		$customizer_additions->add_setting(
			'post_type_dropdown_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Post_Type_Dropdown_Custom_Control(
				$customizer_additions, 'post_type_dropdown_setting', array(
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
		if ( ! class_exists( 'Tags_Dropdown_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/select/tags-dropdown-custom-control.php';
		}
		$customizer_additions->add_setting(
			'tags_dropdown_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Tags_Dropdown_Custom_Control(
				$customizer_additions, 'tags_dropdown_setting', array(
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
		if ( ! class_exists( 'Taxonomy_Dropdown_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/select/taxonomy-dropdown-custom-control.php';
		}
		$customizer_additions->add_setting(
			'taxonomy_dropdown_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Taxonomy_Dropdown_Custom_Control(
				$customizer_additions, 'taxonomy_dropdown_setting', array(
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
		if ( ! class_exists( 'User_Dropdown_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/select/user-dropdown-custom-control.php';
		}
		$customizer_additions->add_setting(
			'user_dropdown_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new User_Dropdown_Custom_Control(
				$customizer_additions, 'user_dropdown_setting', array(
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
		if ( ! class_exists( 'Textarea_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/text/textarea-custom-control.php';
		}
		$customizer_additions->add_setting(
			'textarea_text_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Textarea_Custom_Control(
				$customizer_additions, 'textarea_text_setting', array(
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
		if ( ! class_exists( 'Text_Editor_Custom_Control' ) ) {
			include_once dirname( __FILE__ ) . '/controls/text/text-editor-custom-control.php';
		}
		$customizer_additions->add_setting(
			'text_editor_setting', array(
				'default'        => '',
			)
		);
		$customizer_additions->add_control(
			new Text_Editor_Custom_Control(
				$customizer_additions, 'text_editor_setting', array(
					'label'   => 'Text Editor Setting',
					'section' => 'advanced_controls_section',
					'settings'   => 'text_editor_setting',
					'priority' => 11,
				)
			)
		);

	}

}
