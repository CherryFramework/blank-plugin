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
		 * @var object
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

			// Load admin stylesheets.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );

			// Load admin JavaScripts.
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}

		/**
		 * Include libraries from the `includes/admin`.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function includes() {

			// Include plugin pages.
			require_once( trailingslashit( BLANK_PLUGIN_DIR ) . 'includes/admin/pages/class-plugin-main-page.php' );
			require_once( trailingslashit( BLANK_PLUGIN_DIR ) . 'includes/admin/pages/class-plugin-options-page.php' );
		}

		/**
		 * Register the admin menu.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function menu() {
			add_menu_page(
				esc_html__( 'Blank Plugin', 'blank-plugin' ),
				esc_html__( 'Blank Plugin', 'blank-plugin' ),
				'edit_theme_options',
				'blank-plugin',
				array( 'Blank_Plugin_Main_Page', 'get_instance' ),
				'',
				58
			);

			add_submenu_page(
				'blank-plugin',
				esc_html__( 'Options Example', 'blank-plugin' ),
				esc_html__( 'Options Example', 'blank-plugin' ),
				'edit_theme_options',
				'blank-plugin-options-page',
				array( 'Blank_Plugin_Options_Page', 'get_instance' )
			);
		}

		/**
		 * Enqueue admin stylesheets.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  string $hook The current admin page.
		 * @return void
		 */
		public function enqueue_styles( $hook ) {
			wp_enqueue_style( 'blank-plugin-admin', esc_url( BLANK_PLUGIN_URI . 'assets/admin/css/min/blank-plugin-admin.min.css' ), array(), BLANK_PLUGIN_VERSION, 'all' );
		}

		/**
		 * Enqueue admin JavaScripts.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  string $hook The current admin page.
		 * @return void
		 */
		public function enqueue_scripts( $hook ) {
			wp_enqueue_script(
				'blank-plugin-admin',
				esc_url( BLANK_PLUGIN_URI . 'assets/admin/js/min/blank-plugin-admin.min.js' ),
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
