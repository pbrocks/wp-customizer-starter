<?php

defined('ABSPATH') || die('File cannot be accessed directly');

if (! class_exists('WP_Customize_Control') ) {
    return null;
}

/**
 * A class to create a dropdown for all categories in your wordpress site
 */
class Category_Dropdown_Custom_Control extends WP_Customize_Control
{

    private $categories = false;

    public function __construct( $manager, $id, $args = array(), $options = array() ) 
    {
        $this->categories = get_categories($options);

        parent::__construct($manager, $id, $args);
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content() 
    {
        if (! empty($this->categories) ) {
            ?>
            <label>
        <span class="customize-category-select-control customize-control-title"><?php echo esc_html($this->label); ?></span>
        <select <?php $this->link(); ?>>
        <?php
        foreach ( $this->categories as $category ) {
            printf('<option value="%s" %s>%s</option>', $category->term_id, selected($this->value(), $category->term_id, false), $category->name);
        }
            ?>
             </select>
              </label>
                <?php
        }
    }
}
