<?php

defined('ABSPATH') || die('File cannot be accessed directly');

new Customizing_with_the_Customizer();

class Customizing_with_the_Customizer
{
    public function __construct()
    {
        add_action('customize_register', array( $this, 'wp_customizer_manager' ));
        add_action('customize_register', array( $this, 'include_advanced_section' ));
    }


    /**
     * [wp_customizer_manager description]
     *
     * @param  [type] $wp_manager [description]
     * @return [type]             [description]
     */
    public function wp_customizer_manager($wp_manager)
    {
        $this->simple_section($wp_manager);
        $this->complex_section($wp_manager);
    }

    /**
     * A section to show how you use the default customizer controls in WordPress
     *
     * @param Obj $wp_manager - WP Manager
     *
     * @return Void
     */
    private function simple_section($wp_manager)
    {
        $wp_manager->add_section(
            'simple_customizer_section', array(
            'title'          => 'Simple Customizer Controls',
            'priority'       => 35,
            )
        );

        /**
         * Textbox control
         */
        $wp_manager->add_setting(
            'textbox_setting', array(
            'default'        => 'Default Value',
            )
        );

        $wp_manager->add_control(
            'textbox_setting', array(
            'label'   => 'Text Setting',
            'section' => 'simple_customizer_section',
            'type'    => 'text',
            'priority' => 1,
            )
        );

        /**
         * Checkbox control
         */
        $wp_manager->add_setting(
            'checkbox_setting', array(
            'default'        => '1',
            )
        );

        $wp_manager->add_control(
            'checkbox_setting', array(
            'label'   => 'Checkbox Setting',
            'section' => 'simple_customizer_section',
            'type'    => 'checkbox',
            'priority' => 2,
            )
        );

        /**
         * Radio control
         */
        $wp_manager->add_setting(
            'radio_setting', array(
            'default'        => '1',
            )
        );

        $wp_manager->add_control(
            'radio_setting', array(
            'label'   => 'Radio Setting',
            'section' => 'simple_customizer_section',
            'type'    => 'radio',
            'choices' => array( '1', '2', '3', '4', '5' ),
            'priority' => 3,
            )
        );

        /**
         * Select control
         */
        $wp_manager->add_setting(
            'select_setting', array(
            'default'        => '1',
            )
        );

        $wp_manager->add_control(
            'select_setting', array(
            'label'   => 'Select Dropdown Setting',
            'section' => 'simple_customizer_section',
            'type'    => 'select',
            'choices' => array( '1', '2', '3', '4', '5' ),
            'priority' => 4,
            )
        );

        /**
         * Dropdown pages control
         */
        $wp_manager->add_setting(
            'dropdown_pages_setting', array(
            'default'        => '1',
            )
        );

        $wp_manager->add_control(
            'dropdown_pages_setting', array(
            'label'   => 'Dropdown Pages Setting',
            'section' => 'simple_customizer_section',
            'type'    => 'dropdown-pages',
            'priority' => 5,
            )
        );
    }

    /**
     * A section to show how you use the default customizer controls in WordPress
     *
     * @param Obj $wp_manager - WP Manager
     *
     * @return Void
     */
    private function complex_section($wp_manager)
    {
        $wp_manager->add_section(
            'complex_customizer_section', array(
            'title'          => 'Complex Customizer Controls',
            'priority'       => 35,
            )
        );

        /**
         * Color control
         */
        $wp_manager->add_setting(
            'color_setting', array(
            'default'        => '#dd9933',
            )
        );

        $wp_manager->add_control(
            new WP_Customize_Color_Control(
                $wp_manager, 'color_setting', array(
                'label'   => 'Color Setting',
                'section' => 'complex_customizer_section',
                'settings'   => 'color_setting',
                'priority' => 6,
                )
            )
        );

        /**
         * WP_Customize_Upload_Control
         */
        $wp_manager->add_setting(
            'upload_setting', array(
            'default'        => '',
            )
        );

        $wp_manager->add_control(
            new WP_Customize_Upload_Control(
                $wp_manager, 'upload_setting', array(
                'label'   => 'Upload Setting',
                'section' => 'complex_customizer_section',
                'settings'   => 'upload_setting',
                'priority' => 7,
                )
            )
        );

        /**
         * WP_Customize_Image_Control
         */
        $wp_manager->add_setting(
            'image_setting', array(
            'default'        => '',
            )
        );

        $wp_manager->add_control(
            new WP_Customize_Image_Control(
                $wp_manager, 'image_setting', array(
                'label'   => 'Image Setting',
                'section' => 'complex_customizer_section',
                'settings'   => 'image_setting',
                'priority' => 8,
                )
            )
        );

        /**
         * WP_Customize_Background_Image_Control
         */
        $wp_manager->add_setting(
            'background_image_setting', array(
            'default'        => '',
            )
        );

        $wp_manager->add_control(
            new WP_Customize_Image_Control(
                $wp_manager, 'background_image_setting', array(
                'label'   => 'Background Image Setting',
                'section' => 'complex_customizer_section',
                'settings'   => 'background_image_setting',
                'priority' => 9,
                )
            )
        );

        /**
         * WP_Customize_Background_Image_Control
         */
        $wp_manager->add_setting(
            'background_image_setting', array(
            'default'        => '',
            )
        );

        $wp_manager->add_control(
            new WP_Customize_Background_Image_Control(
                $wp_manager, 'background_image_setting', array(
                'label'   => 'Background Image Setting',
                'section' => 'complex_customizer_section',
                'settings'   => 'background_image_setting',
                'priority' => 9,
                )
            )
        );
    }

    /**
     * A section to show how you use the default customizer controls in WordPress
     *
     * @param Obj $wp_manager - WP Manager
     *
     * @return Void
     */
    public function include_advanced_section()
    {
        // include('class-customizing-advanced-sections.php');
    }
}
