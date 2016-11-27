<?php
/**
 * Sets up the plugin option page.
 *
 * @package    Blank_Plugin
 * @subpackage Admin
 * @author     Cherry Team
 * @license    GPL-3.0+
 * @copyright  2012-2016, Cherry Team
 */

// If class `Blank_Plugin_Options_Page` doesn't exists yet.
if ( ! class_exists( 'Blank_Plugin_Options_Page' ) ) {

	/**
	 * Blank_Plugin_Options_Page class.
	 */
	class Blank_Plugin_Options_Page extends Blank_Plugin_Options {

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
			$this->builder = blank_plugin()->get_core()->init_module( 'cherry-interface-builder', array() );

			parent::__construct();
			$this->render_page();
		}

		/**
		 * Render plugin options page.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function render_page() {
			$this->builder->register_section(
				$this->section
			);
			$this->builder->register_form(
				$this->form
			);

			$this->builder->register_settings(
				$this->ui_elements
			);
			$this->builder->register_control(
				$this->ui_elements_options
			);

			$this->builder->register_settings(
				$this->bi_elements
			);
			$this->builder->register_component(
				$this->accordion
			);
			$this->builder->register_settings(
				$this->accordion_settings
			);
			$this->builder->register_control(
				$this->accordion_options
			);

			$this->builder->register_component(
				$this->toggle
			);
			$this->builder->register_settings(
				$this->toggle_settings
			);
			$this->builder->register_control(
				$this->toggle_options
			);

			$this->builder->register_component(
				$this->tab_vertical
			);
			$this->builder->register_settings(
				$this->tab_vertical_settings
			);
			$this->builder->register_control(
				$this->tab_vertical_options
			);

			$this->builder->register_component(
				$this->tab_horizontal
			);
			$this->builder->register_settings(
				$this->tab_horizontal_settings
			);
			$this->builder->register_control(
				$this->tab_horizontal_options
			);

			$this->builder->register_settings(
				$this->submit_buttons
			);
			$this->builder->register_control(
				$this->options_button
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
