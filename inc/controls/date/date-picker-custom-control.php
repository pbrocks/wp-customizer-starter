<?php

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class to create a custom date picker
 */
class Date_Picker_Custom_Control extends WP_Customize_Control {

	/**
	 * Enqueue the styles and scripts
	 */
	public function enqueue() {
		wp_enqueue_style( 'jquery-ui-datepicker' );
	}

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {

		?>
			<label>
			  <span class="customize-date-picker-control"><?php echo esc_html( $this->label ); ?></span>
			  <input type="date" id="<?php echo esc_html( $this->id ); ?>" name="<?php echo esc_html( $this->id ); ?>" value="<?php echo esc_html( $this->value() ); ?>" class="datepicker" />
			</label>
		<?php
	}
}