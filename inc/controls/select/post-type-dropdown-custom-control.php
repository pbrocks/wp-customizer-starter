<?php

defined('ABSPATH') || die('File cannot be accessed directly');

if (! class_exists('WP_Customize_Control') ) {
    return null;
}
/**
 * Class to create a custom post type control
 */
class Post_Type_Dropdown_Custom_Control extends WP_Customize_Control
{

    private $post_types = false;

    public function __construct( $manager, $id, $args = array(), $options = array() ) 
    {
        $postargs = wp_parse_args(
            $options, array(
            'public' => true,
            ) 
        );
        $this->post_types = get_post_types($postargs, 'object');

        parent::__construct($manager, $id, $args);
    }

    /**
     * Render the content on the theme customizer page
     */
    public function render_content() 
    {
        if (empty($this->post_types) ) {
            return false;
        }

        ?>
         <label>
       <span class="customize-post-type-dropdown customize-control-title"><?php echo esc_html($this->label); ?></span>
       <select name="<?php echo esc_html($this->id); ?>" id="<?php echo esc_html($this->id); ?>">
        <?php
        foreach ( $this->post_types as $k => $post_type ) {
            printf('<option value="%s" %s>%s</option>', $k, selected($this->value(), $k, false), $post_type->labels->name);
        }
        ?>
       </select>
         </label>
        <?php
    }
}
