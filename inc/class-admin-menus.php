<?php
defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

new Admin_Menus();

class Admin_Menus {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'dev_menu' ) );

		add_filter( 'comment_form_default_fields', array( $this, 'filter_comment_form_default_fields' ), 10, 1 );
		// add_action( 'admin_menu', array( $this, 'move_spacer1_admin_menu_item' ) );
		// add_action( 'admin_menu', array( $this, 'move_options_page_admin_menu' ) );
		// add_action( 'admin_menu', array( $this, 'change_pages_label_to_something_else' ) );
		// add_action( 'admin_menu', array( $this, 'change_posts_label_to_updates' ) );
		// add_action( 'admin_menu', array( $this, 'remove_some_admin_menus' ), 990 );
	}

	public function dev_menu() {
		// if ( current_user_can( 'manage_network' ) ) { // for multisite
		// if ( current_user_can( 'manage_options' ) ) {
			add_menu_page( 'Dev Admin', 'Dev Admin', 'manage_options', 'dev-admin-menu.php',  array( $this, 'dev_menu_page' ), 'dashicons-tickets', 13 );
			add_submenu_page( 'dev-admin-menu.php', 'Dev Arrays', 'Arrays', 'manage_options', 'dev-arrays.php',  array( $this, 'dev_arrays_page' ) );
			add_submenu_page( 'dev-admin-menu.php', 'Dev Submenu', 'Menus/Submenus', 'manage_options', 'dev-submenu.php',  array( $this, 'dev_submenu_page' ) );
			add_submenu_page( 'edit-comments.php', 'Comment Submenu', 'Comment Submenu', 'manage_options', 'comment-submenu.php',  array( $this, 'comment_submenu_page' ) );
		// }
	}

	public function comment_submenu_page() {
		echo '<div class="wrap"><h1>' . basename( __FUNCTION__ ) . '</h1>';
			echo '<h2>Comment Submenu Admin</h2>';

			echo '<p>get_stylesheet_directory => ' . get_stylesheet_directory();
			echo '<p>get_stylesheet_directory_uri => ' . get_stylesheet_directory_uri();
			echo '<p>get_stylesheet_uri => ' . get_stylesheet_uri();

			echo '<pre>';
			echo 'You can find this file in  <br>';
			echo esc_url( plugins_url( '/', __FILE__ ) );
			echo '<br>';
			echo '</pre>';
			$mods = get_theme_mods();
			$filds = apply_filters( 'comment_form_defaults', $fields );
			echo '<pre> comment_form_defaults ';
			print_r( $filds );
			echo '</pre>';
			echo '</div><!-- .wrap -->';
	}

	// define the comment_form_default_fields callback
	public function filter_comment_form_default_fields( $fields ) {
		// make filter magic happen here...
		return $fields;
	}

	public function move_spacer1_admin_menu_item( $menu_order ) {
		global $menu;

		$spacer_admin_menu = $menu[4];

		if ( ! empty( $spacer_admin_menu ) ) {

			// Add 'woocommerce' to bottom of menu
			 $menu[15] = $spacer_admin_menu;

			// Remove initial 'woocommerce' appearance
			unset( $menu[4] );
		}
		return $menu_order;
	}

	public function move_options_page_admin_menu( $menu_order ) {
		global $menu;

		$infra_admin_menu = $menu[81];

		if ( ! empty( $infra_admin_menu ) ) {

			// Add 'woocommerce' to bottom of menu
			 $menu[37] = $infra_admin_menu;

			// Remove initial 'woocommerce' appearance
			unset( $menu[81] );
		}
		return $menu_order;
	}


	public function change_pages_label_to_something_else() {
		global $menu;

		$menu[20][0] = 'Home Panels';
	}

	public function change_s_label_to_something_else() {
		global $menu;

		$menu[20][0] = 'Home ';
	}

	public function change_posts_label_to_updates() {
		global $menu;

		$menu[5][0] = 'Current Updates';

	}


	public function remove_some_admin_menus() {
		global $menu, $submenu;
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'edit.php' );
		remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
		remove_submenu_page( 'themes.php', 'theme-editor.php' );
	}


	public function dev_arrays_page() {
		echo '<h1>' . basename( __FUNCTION__ ) . '</h1>';
		echo '<pre>';
		echo 'You can find this file in  <br>';
		echo plugins_url( '/', __FILE__ );
		$cpts = get_post_types();
		print_r( $cpts );
		$cpt = get_post_type_object( 'new_relic_use_cases' );
		$cpt = apply_filters( 'comment_form_default_fields' );

		print_r( $cpt );

		echo '<br>';
		echo '</pre>';
		$use_cases = new WP_Query( array(
			'post_type' => 'use_cases',
		) );
		echo '<pre> Use Cases';
		print_r( $use_cases );
		echo '</pre>';
		echo '<pre>';
			print_r( get_field( 'use_cases' ) );
		echo '</pre>';
		die;
	}

	public function dev_submenu_page() {
		global $menu;
		echo '<h1>' . basename( __FUNCTION__ ) . '</h1>';
		echo '<pre>';
		echo 'You can find this file in  <br>';
		echo plugins_url( '/', __FILE__ );
		print_r( $menu );
		echo '<br>';
		echo '<br>ACF path =>' . plugin_dir_path( __FILE__ ) . 'acf-json<br>';
		echo '</pre>';

	}

	public function dev_menu_page() {
		echo '<h1>' . basename( __FUNCTION__ ) . '</h1>';
			echo '<h1>Dev Admin Menu</h1>';
			echo '<pre>';

			echo '<p>get_stylesheet_directory => ' . get_stylesheet_directory();
			echo '<p>get_stylesheet_directory_uri => ' . get_stylesheet_directory_uri();
			echo '<p>get_stylesheet_uri => ' . get_stylesheet_uri();

			echo 'You can find this file in  <br>';
			echo esc_url( plugins_url( '/', __FILE__ ) );
			echo '<br>';
			echo '</pre>';

			$mods = get_theme_mods();
			echo '<pre>';
			var_dump( $mods );
			echo '</pre>';
	}
}
