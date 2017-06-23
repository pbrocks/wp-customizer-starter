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
	 * @param  [type] $wp_manager [description]
	 * @return [type]             [description]
	 */
	public function wp_customizer_manager( $wp_manager ) {
		$this->comment_form( $wp_manager );
	}

	/**
	 * The comment_form function adds a new section
	 * to the Customizer to display the settings and
	 * controls that we build.
	 *
	 * @param  [type] $wp_manager [description]
	 * @return [type]             [description]
	 */
	private function comment_form( $wp_manager ) {
		require_once dirname( __FILE__ ) . '/controls/checkbox-toggle/toggle-control.php';
		$wp_manager->add_section(
			'comment_form_section', array(
				'title'          => 'Comment Form Controls',
				'priority'       => 36,
				)
		);

		$wp_manager->add_setting( 'alter_comments',
			array(
				'default'        => '0',
				'transport'      => 'postMessage',
		) );

		/**
		 * Adding a Checkbox Toggle
		 */
		$wp_manager->add_control( new Customizer_Toggle_Control( $wp_manager,
			'alter_comments', array(
				'label'       => 'Alter Comments',
				'description' => 'description = Alter Comments advance d_control s_sec tion advan ced_controls_section',
				'section'     => 'comment_form_section',
				'type'        => 'ios',
				'priority'    => 1,
			)
		) );

		// $wp_manager->add_setting( 'alter_comments5', array(
		// 'default'        => '0',
		// ) );
		// $wp_manager->add_control( new Customizer_Toggle_Control( $wp_manager,
		// 'alter_comments5', array(
		// 'label'   => 'Alte5r Comments',
		// 'description'   => 'description = Alter Comments advance d_control s_sec tion advan ced_controls_section',
		// 'section' => 'comment_form_section',
		// 'type'    => 'ios',
		// 'priority' => 1,
		// )
		// ) );
		if ( true === get_theme_mod( 'alter_comments' ) ) {
			// $theme_mod = 'get_theme_mod = 1';
			/**
			 * Textbox control
			 */
			$wp_manager->add_setting(
				'leave_reply', array(
					'default'        => 'Reply Title',
				)
			);

			$wp_manager->add_control(
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
			$wp_manager->add_setting(
				'comment_form_title', array(
					'default'        => 'Comment Form Title',
					'transport'      => 'refresh',
				)
			);

			$wp_manager->add_control(
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
			$wp_manager->add_setting(
				'comment_form_title9', array(
					'default'        => 'Default Value',
				)
			);

			$wp_manager->add_control(
				'comment_form_title9', array(
					'section'  => 'comment_form_section',
					'type'     => 'text',
					'label'       => 'Text Setting',
					'description' => 'This is a description of this text setting in the Simple Customizer Controls section of the panel',
					'priority' => 1,
				)
			);
		}// End if().

	}

	function adjust_comment_form_defaults( $defaults ) {
		$defaults['title_reply'] = get_theme_mod( 'leave_reply' );
		$defaults['label_submit'] = __( 'Click to Add' );
		$defaults['name_submit'] = __( 'Name Submit' );
		$defaults['comment_field'] = __( '<p class="comment-form-comment"><label for="comment"> * ' . ( get_theme_mod( 'comment_form_title' ) ? get_theme_mod( 'comment_form_title' ) : 'Comment' ) . '</label><textarea id="comment" name="comment" cols="45" rows="7" aria-required="true"></textarea></p>' );
			  // $fields =  array(
		// $defaults['author'] = __( '<p class="comment-form-author">' . '<label for="author">' . __( 'Naiime' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		// '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>' );
		// $defaults['email'] = __( '<p class="comment-form-email"><label for="email">' . __( 'Emuuail' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
		// '<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>' );
		// $defaults['url'] = __( '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
		// '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>' );
		return $defaults;
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
