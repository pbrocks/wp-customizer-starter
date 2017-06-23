<?php
new Some_WP_Filters();

class Some_WP_Filters {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
		add_action( 'init', array( $this, 'shortcode_in_widgets' ) );
	}

	/**
	 * [wp_customizer_manager description]
	 *
	 * @param  [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $customizer_additions ) {
		$this->wp_filters( $customizer_additions );
	}

	/**
	 * The wp_filters function adds a new section
	 * to the Customizer to display the settings and
	 * controls that we build.
	 *
	 * @param  [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	private function wp_filters( $customizer_additions ) {
		/**
		 * Include custom Toggle Control
		 */
		require_once dirname( __FILE__ ) . '/controls/checkbox-toggle/toggle-control.php';
		$customizer_additions->add_section(
			'wp_filters_section', array(
				'title'          => 'Control Filters',
				'priority'       => 26,
				)
		);

		$customizer_additions->add_setting( 'some_setting', array(
			'default'        => '0',
		) );

		/**
		 * Adding a Checkbox Toggle
		 */
		$customizer_additions->add_control( new Customizer_Toggle_Control( $customizer_additions,
			'some_setting', array(
				'label'   => 'Filter Comments',
				'description'   => 'description = Alter Comments advance d_control s_sec tion advan ced_controls_section',
				'section' => 'wp_filters_section',
				'type'    => 'ios',
				'priority' => 1,
			)
		) );

		$customizer_additions->add_setting( 'shortcode_in_widgets', array(
			'default'        => '0',
		) );

		$customizer_additions->add_control( new Customizer_Toggle_Control( $customizer_additions,
			'shortcode_in_widgets', array(
				'label'   => 'Shortcode in Widgets',
				'description'   => 'Turn this toggle on to use shortcodes in your Widgets.',
				'section' => 'wp_filters_section',
				'type'    => 'ios',
				'priority' => 1,
			)
		) );

		if ( true === get_theme_mod( 'some_setting' ) ) {
			$theme_mod = 'get_theme_mod = 1';
			/**
			 * Textbox control
			 */
			$customizer_additions->add_setting(
				'wp_filters_title', array(
					'default'        => 'Default Value',
				)
			);

			$customizer_additions->add_control(
				'wp_filters_title', array(
					'section'  => 'wp_filters_section',
					'type'     => 'text',
					'label'       => 'Text Setting',
					'description' => 'This is a description of this text setting in the Simple Customizer Controls section of the panel',
					'priority' => 1,
				)
			);
		}
	}

	public function shortcode_in_widgets() {
		if ( true === get_theme_mod( 'shortcode_in_widgets' ) ) {
			add_filter( 'widget_text', 'do_shortcode' );
		}
	}

	function footer_copyright() {
	?>
		<b>(c) <?php echo date( 'Y' ); ?></b>
		| <a href="<?php bloginfo( 'url' ); ?>">
		<?php bloginfo( 'name' ); ?></a>
		| <?php bloginfo( 'description' );
	}
}
