<?php
/**
 * Registered plugins shortcodes.
 *
 * @package    Blank_Plugin
 * @subpackage Admin
 * @author     Cherry Team
 * @license    GPL-3.0+
 * @copyright  2012-2016, Cherry Team
 */

// If class `Blank_Plugin_Register_Shortcodes` doesn't exists yet.
if ( ! class_exists( 'Blank_Plugin_Register_Shortcodes' ) ) {

	/**
	 * Blank_Plugin_Register_Shortcodes class.
	 */
	class Blank_Plugin_Register_Shortcodes extends Blank_Plugin_Options {

		/**
		 * Class constructor.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function __construct() {
			parent::__construct();
			blank_plugin()->get_core()->init_module( 'cherry5-insert-shortcode', array() );

			$this->register_shortcodes();
		}

		/**
		 * Render plugin options page.
		 *
		 * @since 1.0.0
		 * @access private
		 * @return void
		 */
		private function register_shortcodes() {
			cherry5_register_shortcode(
				array(
					'title'       => 'UI Elements',
					'description' => '',
					'icon'        => '<span class="dashicons dashicons-admin-customizer"></span>',
					'slug'        => 'ui_elements',
					'shortcodes'  => array(
						array(
							'title'       => 'UI Elements Shortcode',
							'description' => '',
							'icon'        => '',
							'slug'        => 'ui_elements_shortcode',
							'twin'        => false,
							'options'     => $this->ui_elements_options,
						),
					),
				)
			);

			cherry5_register_shortcode(
				array(
					'title'       => 'Interface Builder Elements',
					'description' => '',
					'icon'        => '<span class="dashicons dashicons-hammer"></span>',
					'slug'        => 'interface_builder',
					'shortcodes'  => array(
						array(
							'title'       => 'UI Elements Shortcode',
							'description' => '',
							'icon'        => '',
							'slug'        => 'Shortcode With Accordion',
							'twin'        => false,
							'options'     => array_merge( $this->accordion, $this->accordion_settings, $this->accordion_options ),
						),
						array(
							'title'       => 'toggle Shortcode',
							'description' => '',
							'icon'        => '<span class="dashicons dashicons-editor-justify"></span>',
							'slug'        => 'Shortcode With Toggle',
							'twin'        => false,
							'options'     => array_merge( $this->toggle, $this->toggle_settings, $this->toggle_options ),
						),
						array(
							'title'       => 'Shortcode With Vertical Tabs',
							'description' => '',
							'icon'        => '',
							'slug'        => 'tab_vertical_shortcode',
							'twin'        => false,
							'options'     => array_merge( $this->tab_vertical, $this->tab_vertical_settings, $this->tab_vertical_options ),
						),
						array(
							'title'       => 'Shortcode With horizontal Tabs',
							'description' => '',
							'icon'        => '',
							'slug'        => 'tab_horizontal_shortcode',
							'twin'        => false,
							'options'     => array_merge( $this->tab_horizontal, $this->tab_horizontal_settings, $this->tab_horizontal_options ),
						),
					),
				)
			);


		}
	}
}
