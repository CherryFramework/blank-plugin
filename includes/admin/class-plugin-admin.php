<?php
/**
 * Sets up the admin functionality for the plugin.
 *
 * @package    Blank_Plugin
 * @subpackage Admin
 * @author     Cherry Team
 * @license    GPL-3.0+
 * @copyright  2002-2016, Cherry Team
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die();
}

// If class `Blank_Plugin_Admin` doesn't exists yet.
if ( ! class_exists( 'Blank_Plugin_Admin' ) ) {

	/**
	 * Blank_Plugin_Admin class.
	 */
	class Blank_Plugin_Admin {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**
		 * Class constructor.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function __construct() {

			// Include libraries from the `includes/admin`
			$this->includes();

			// Load the admin menu.
			add_action( 'admin_menu', array( $this, 'menu' ) );

			// Load admin style sheet.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );

			// Load admin JavaScript.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Include libraries from the `includes/admin`.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function includes() {}

		/**
		 * Register the admin menu.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function menu() {}

		/**
		 * Register and enqueue admin style sheet.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function enqueue_styles() {
			wp_enqueue_style(
				'blank-plugin-admin',
				esc_url( BLANK_PLUGIN_DIR . 'assets/admin/sass/min/blank-plugin-admin.min.css' ),
				array(),
				BLANK_PLUGIN_VERSION,
				'all'
			);
		}

		/**
		 * Register and enqueue admin style sheet.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function enqueue_scripts() {
			wp_register_script(
				'blank-plugin-admin',
				esc_url( BLANK_PLUGIN_DIR . 'assets/admin/js/min/blank-plugin-admin.min.js' ),
				array( 'cherry-js-core' ),
				BLANK_PLUGIN_VERSION,
				true
			);
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}

}

if ( ! function_exists( 'blank_plugin_admin' ) ) {

	/**
	 * Returns instanse of the plugin class.
	 *
	 * @since  1.0.0
	 * @return object
	 */
	function blank_plugin_admin() {
		return Blank_Plugin_Admin::get_instance();
	}
}

blank_plugin_admin();
