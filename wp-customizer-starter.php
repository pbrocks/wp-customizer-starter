<?php
/**
 * Plugin Name: WP Customizer Starter
 * Plugin URI: https://github.com/pbrocks/wp-customizer-starter
 *
 * Description: Jump start your interaction with the WordPress customizer.
 * Author: pbrocks
 * Author URI: https://github.com/pbrocks
 * Version: 1.0.3
 * License: GPLv2
 * Text Domain: wp-customizer-starter
 *
 * @link  http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 * disabled( $disabled, $current = true, $echo = true )
 */

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

require( 'inc/class-wp-customizer-starter.php' );
require( 'inc/class-customizing-simple-section.php' );
require( 'inc/class-customizing-comment-form.php' );
require( 'inc/class-customizing-complex-section.php' );
require( 'inc/class-customizing-advanced-section.php' );
require( 'inc/class-some-wp-filters.php' );
