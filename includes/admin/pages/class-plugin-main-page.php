<?php
/**
 * Sets up the plugin page.
 *
 * @package    Blank_Plugin
 * @subpackage Admin
 * @author     Cherry Team
 * @license    GPL-3.0+
 * @copyright  2002-2016, Cherry Team
 */

// If class `Blank_Plugin_Main_Page` doesn't exists yet.
if ( ! class_exists( 'Blank_Plugin_Main_Page' ) ) {

	/**
	 * Blank_Plugin_Main_Page class.
	 */
	class Blank_Plugin_Main_Page {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var object
		 */
		private static $instance = null;

		/**
		 * Instance of the class Cherry_Interface_Builder.
		 *
		 * @since 1.0.0
		 * @var object
		 */
		private $builder = null;

		/**
		 * Class constructor.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function __construct() {
			$this->builder = blank_plugin()->get_core()->modules['cherry-interface-builder'];
			$this->render_page();
		}

		/**
		 * Render plugin main page.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function render_page() {
			$this->builder->register_section(
				array(
					'main_page' => array(
						'type'	=> 'section',
						'title'	=> __( '<span class="dashicons dashicons-admin-home"></span> Blank Plugin', 'blank-plugin' ),
					),
				)
			);

			$this->builder->register_html(
				array(
					'html' => array(
						'parent' => 'main_page',
						'html'   => '<div id="main-page-content">' . esc_html__( 'The blank plugin with Cherry Frameworka. On the basis of the workpiece can be created quickly and easily any plugins for WordPress.', 'blank-plugin' ) . '</div>',
					),
				)
			);

			$this->builder->render();
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
