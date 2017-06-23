<?php
/**
 * Customize for textarea, extend the WP customizer
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class Textarea_Custom_Control extends WP_Customize_Control {


	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since  10/16/2012
	 * @return void
	 */
	public function render_content() {
		?>
		<label>
		 <span class="customize-control-title customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="customize-control-description" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>
		 <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
		<?php echo esc_textarea( $this->value() ); ?>
		 </textarea>
		</label>
		<?php
	}

}
