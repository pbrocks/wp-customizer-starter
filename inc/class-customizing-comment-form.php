<?php
new Customizing_Comment_Form();

class Customizing_Comment_Form {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
		add_filter( 'comment_form_defaults', array( $this, 'adjust_comment_form_defaults' ), 20 );
	}

	/**
	 * [wp_customizer_manager description]
	 *
	 * @param  [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $customizer_additions ) {
		$this->comment_form( $customizer_additions );
	}

	/**
	 * The comment_form function adds a new section
	 * to the Customizer to display the settings and
	 * controls that we build.
	 *
	 * @param  [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	private function comment_form( $customizer_additions ) {
		require_once dirname( __FILE__ ) . '/controls/checkbox-toggle/toggle-control.php';
		$customizer_additions->add_section(
			'comment_form_section', array(
				'title'          => 'Comment Form Controls',
				'priority'       => 36,
				)
		);

		$customizer_additions->add_setting( 'alter_comments',
			array(
				'default'        => '0',
				'transport'      => 'postMessage',
		) );

		/**
		 * Adding a Checkbox Toggle
		 */
		$customizer_additions->add_control( new Customizer_Toggle_Control( $customizer_additions,
			'alter_comments', array(
				'label'       => 'Alter Comment Form Fields',
				'description' => 'Turn this switch on to change the text fields used in the Comment Form.',
				'section'     => 'comment_form_section',
				'type'        => 'ios',
				'priority'    => 1,
			)
		) );

		/**
		 * Textbox control
		 */
		$customizer_additions->add_setting(
			'leave_reply', array(
				'default'        => 'Reply Title',
			)
		);

		$customizer_additions->add_control(
			'leave_reply', array(
				'section'     => 'comment_form_section',
				'type'        => 'text',
				'label'       => 'Reply Title',
				'description' => 'This is a description of this text setting in the Simple Customizer Controls section of the panel',
				'priority' => 1,
			)
		);
		/**
		 * Textbox control
		 */
		$customizer_additions->add_setting(
			'comment_form_title', array(
				'default'        => 'Comment Form Title',
				'transport'      => 'refresh',
			)
		);

		$customizer_additions->add_control(
			'comment_form_title', array(
				'section'     => 'comment_form_section',
				'type'        => 'text',
				'label'       => 'Comment Form Title',
				'description' => 'This is a description of this text setting in the Simple Customizer Controls section of the panel',
				'priority' => 1,
			)
		);
		/**
		 * Textbox control
		 */
		$customizer_additions->add_setting(
			'label_submit', array(
				'default'        => 'Add a Comment Text',
			)
		);

		$customizer_additions->add_control(
			'label_submit', array(
				'section'  => 'comment_form_section',
				'type'     => 'text',
				'label'       => 'Comment Submit Button Text',
				'description' => 'This is a description of this text setting in the Simple Customizer Controls section of the panel',
				'priority' => 1,
			)
		);
	}

	/**
	 * [adjust_comment_form_defaults description]
	 *
	 * @param  [type] $defaults [description]
	 * @return [type]           [description]
	 */
	function adjust_comment_form_defaults( $defaults ) {
		if ( true === get_theme_mod( 'alter_comments' ) ) {
			$defaults['title_reply'] = ( get_theme_mod( 'leave_reply' ) ? get_theme_mod( 'leave_reply' ) : 'Add a Comment below' );
			$defaults['label_submit'] = ( get_theme_mod( 'label_submit' ) ? get_theme_mod( 'label_submit' ) : 'Click to Add' );
			// $defaults['name_submit'] = __( 'Name Submit' );
			$defaults['comment_field'] = __( '<p class="comment-form-comment"><label for="comment"> * ' . ( get_theme_mod( 'comment_form_title' ) ? get_theme_mod( 'comment_form_title' ) : 'Input Comment here' ) . '</label><textarea id="comment" name="comment" cols="45" rows="7" aria-required="true"></textarea></p>' );

			return $defaults;
		}
	}

	/**
	 * [shortcode_in_widgets description]
	 *
	 * @return [type] [description]
	 */
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
