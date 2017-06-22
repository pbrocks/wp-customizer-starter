<?php

defined('ABSPATH') || die('File cannot be accessed directly');

if (! class_exists('WP_Customize_Control') ) {
    return null;
}

/**
 * Class to create a custom layout control
 */
class Layout_Picker_Custom_Control extends WP_Customize_Control {

    /**
       * Render the content on the theme customizer page
       */
    public function render_content() 
    {
        $image_directory = '../layout/img/';
        // $image_directory_inc = '/inc/customizer-controls/layout/img/';
        $final_image_directory = '';
        $final_image_directory = plugin_dir_url(__FILE__) . $image_directory;

        // if ( is_dir( get_stylesheet_directory() . $image_directory ) ) {
        // $final_image_directory = get_stylesheet_directory_uri() . $image_directory;
        // }
        // if ( is_dir( get_stylesheet_directory() . $image_directory_inc ) ) {
        // $final_image_directory = get_stylesheet_directory_uri() . $image_directory_inc;
        // }
        ?>
         <label>
        <span class="customize-layout-control customize-control-title"><?php echo esc_html($this->label); ?></span>
        <ul>
       <li><img src="<?php echo esc_url($final_image_directory); ?>1col.png" alt="Full Width" /><input type="radio" name="<?php echo esc_html($this->id); ?>" id="<?php echo esc_html($this->id); ?>[full_width]" value="1" /></li>
       <li><img src="<?php echo esc_url($final_image_directory); ?>2cl.png" alt="Left Sidebar" /><input type="radio" name="<?php echo esc_html($this->id); ?>" id="<?php echo esc_html($this->id); ?>[left_sidebar]" value="1" /></li>
       <li><img src="<?php echo esc_url($final_image_directory); ?>2cr.png" alt="Right Sidebar" /><input type="radio" name="<?php echo esc_html($this->id); ?>" id="<?php echo esc_html($this->id); ?>[right_sidebar]" value="1" /></li>
        </ul>
         </label>
            <?php
    }
}
