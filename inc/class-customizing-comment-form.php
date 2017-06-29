<?php
new Customizing_Comment_Form();

class Customizing_Comment_Form {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'wp_customizer_manager' ) );
		add_filter( 'comment_form_defaults', array( $this, 'adjust_comment_form_defaults' ), 20 );
		// add_action( 'wp_head', array( $this, 'inline_css' ) );
	}

	/**
	 * [wp_customizer_manager description]
	 *
	 * @param  [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $customizer_additions ) {
		$this->comment_form( $customizer_additions );
		// $this->comment_form_second( $customizer_additions );
	}

	/**
	 * The comment_form function adds a new section
	 * to the Customizer to display the settings and
	 * controls that we build.
	 *
	 * @param  [type] $customizer_additions [description]
	 * @return [type]             [description]
	 */
	private function comment_form_second( $customizer_additions ) {
		require_once dirname( __FILE__ ) . '/controls/checkbox/toggle-control.php';
		include_once dirname( __FILE__ ) . '/controls/text/textarea-custom-control.php';

		$customizer_additions->add_section(
			'comment_form_section_2', array(
				'title'          => 'Comment Form Controls 2',
				'priority'       => 36,
				'panel'       => 'comment_form_panel',
				)
		);

		$customizer_additions->add_setting( 'alter_comments_2',
			array(
				'default'        => false,
				'transport'      => 'postMessage',
		) );

		/**
		 * Adding a Checkbox Toggle
		 */
		$customizer_additions->add_control( new Customizer_Toggle_Control( $customizer_additions,
			'alter_comments_2', array(
				'label'       => 'Alter Comment Form Fields 2',
				'description' => 'Placeholder for further customization of the Comment Form. Nothing on this panel will affect the site other than saving settings.',
				'section'     => 'comment_form_section_2',
				'type'        => 'ios',
				'priority'    => 1,
			)
		) );

		/**
		 * Textbox control
		 */
		$customizer_additions->add_setting(
			'leave_reply_2', array(
				'default'        => 'Reply Title 2',
			)
		);

		$customizer_additions->add_control(
			'leave_reply_2', array(
				'section'     => 'comment_form_section_2',
				'type'        => 'text',
				'label'       => 'Reply Title',
				'description' => 'TODO = if above toggle = false, input fields below = disabled',
				'priority' => 1,
			)
		);
		/**
		 * Textbox control
		 */
		$customizer_additions->add_setting(
			'comment_form_title_2', array(
				'default'        => 'Comment Form Title 2',
				'transport'      => 'refresh',
			)
		);

		$customizer_additions->add_control(
			'comment_form_title_2', array(
				'section'     => 'comment_form_section_2',
				'type'        => 'text',
				'label'       => 'Comment Form Title',
				'description' => 'This is a description of this text setting in the Simple Customizer Controls section of the panel',
				'priority' => 1,
			)
		);
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
		require_once dirname( __FILE__ ) . '/controls/checkbox/toggle-control.php';
		include_once dirname( __FILE__ ) . '/controls/text/textarea-custom-control.php';

		$customizer_additions->add_panel(
			'comment_form_panel', array(
				'title'          => 'Alter Comment Form',
				'priority'       => 36,
				)
		);

		$customizer_additions->add_section(
			'comment_form_section', array(
				'title'          => 'Comment Form Basic Labels',
				'priority'       => 36,
				'panel'       => 'comment_form_panel',
				)
		);

		$customizer_additions->add_setting( 'alter_comments',
			array(
				'default'        => 'false',
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
				'description' => 'TODO = if above toggle = false, input fields below = disabled',
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
		 * Adding a textarea control
		 */
		$customizer_additions->add_setting(
			'comment_notes_before', array(
				'default'        => 'This text can be changed to anything you need to communicate like a short user agreement. "By using these comments you are agreeing to abide by our use terms."',
			)
		);

		$customizer_additions->add_control(
			new Textarea_Custom_Control(
				$customizer_additions, 'comment_notes_before', array(
				'section'  => 'comment_form_section',
				'type'     => 'text',
				'label'       => 'Comment Notes Before Textarea',
				'description' => 'An area where you can add a description of expected behavior regarding the Comment Form.',
				'priority' => 1,
				)
			)
		);

		/**
		 * Adding a textarea control
		 */
		$customizer_additions->add_setting(
			'comment_notes_after', array(
				'default'        => 'Comment Notes After Text',
			)
		);
		$customizer_additions->add_control(
			new Textarea_Custom_Control(
				$customizer_additions, 'comment_notes_after', array(
					'label'   => 'Comment Notes After Textarea',
					'description'   => 'Comment Notes After Textarea Text Setting',
					'section' => 'comment_form_section',
					'settings'   => 'comment_notes_after',
					'priority' => 1,
				)
			)
		);

		/**
		 * Textbox control
		 */
		$customizer_additions->add_setting(
			'label_submit', array(
				'default'        => 'Add a Comment Label',
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
			$defaults['title_reply'] = ( get_theme_mod( 'leave_reply' ) ? get_theme_mod( 'leave_reply' ) : '<span style="color:salmon;">Add a Comment below</span>' );
			$defaults['label_submit'] = ( get_theme_mod( 'label_submit' ) ? get_theme_mod( 'label_submit' ) : 'Click to Add' );
			$defaults['submit_button'] = ( get_theme_mod( 'label_submit' ) ? '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />' : '<input name="%1$s" type="submit" id="%2$s" class="%3$s" style="background-color:salmon;" value="%4$s" />' );
			$defaults['comment_notes_before'] = '<p class="comment-notes">' . ( get_theme_mod( 'comment_notes_before' ) ? get_theme_mod( 'comment_notes_before' ) : '<span style="color:salmon;">comment_notes_before = (string) HTML element for a message displayed before the comment fields if the user is not logged in. Default = "Your email address will not be published."</span>' ) . '</p>';
			$defaults['comment_notes_after'] = '<p class="comment-notes">' . ( get_theme_mod( 'comment_notes_after' ) ? get_theme_mod( 'comment_notes_after' ) : '<span style="color:salmon;">comment_notes_after = (string) HTML element for a message displayed after the textarea field.
</span>' ) . '</p>';
			$defaults['comment_field'] = __( '<p class="comment-form-comment"><label for="comment"> * ' . ( get_theme_mod( 'comment_form_title' ) ? get_theme_mod( 'comment_form_title' ) : '<span style="color:salmon;">Input Comment here</span>' ) . '</label><textarea id="comment" name="comment" cols="45" rows="7" aria-required="true"></textarea></p>' );

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

	function inline_css() {
	?>
	<style type="text/css">
		#submit.salmon {
			background-color: rgb( 250, 128, 114 );
		}
	</style>

	<?php
	}
}
