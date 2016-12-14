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

					'title'       => esc_html__( 'Plugin name', 'blank-plugin' ),
					'description' => esc_html__( 'Plugin description', 'blank-plugin' ),
					'icon'        => '<span class="dashicons dashicons-admin-settings"></span>',
					'slug'        => 'new-plugin',
					'shortcodes'  => array(
						array(
							'title'       => esc_html__( 'Shortcode Title', 'blank-plugin' ),
							'description' => esc_html__( 'Shortcode Description.', 'blank-plugin' ),
							'icon'        => '<span class="dashicons dashicons-schedule"></span>',
							'slug'        => 'new-shortcode',
							'options'     => $this->ui_elements_options,
						),
						array(
							'title'       => esc_html__( 'Twin Shortcode', 'blank-plugin' ),
							'icon'        => '<span class="dashicons dashicons-media-code"></span>',
							'slug'        => 'twin-shortcode',
							'twin'        => true,
						),
						array(
							'title'       => esc_html__( 'Has Not Option', 'blank-plugin' ),
							'icon'        => '<span class="dashicons dashicons-media-default"></span>',
							'slug'        => 'has-not-option',
						),
						array(
							'title'           => esc_html__( 'Has Default Content', 'blank-plugin' ),
							'icon'            => '<span class="dashicons dashicons-media-document"></span>',
							'slug'            => 'default-content',
							'default_content' => 'new-shortcode',
							'twin'            => true,
							'options'         => $this->ui_elements_options,
							),
					),
				)
			);

			cherry5_register_shortcode(
				array(
					'title'       => esc_html__( 'Interface Builder Elements', 'blank-plugin' ),
					'icon'        => '<span class="dashicons dashicons-hammer"></span>',
					'slug'        => 'interface_builder',
					'shortcodes'  => array(
						array(
							'title'       => esc_html__( 'Shortcode With Accordion', 'blank-plugin' ),
							'icon'        => '<span class="dashicons dashicons-list-view"></span>',
							'slug'        => 'accordion',
							'options'     => array_merge( $this->accordion, $this->accordion_settings, $this->accordion_options ),
						),
						array(
							'title'       => esc_html__( 'Shortcode With Toggle', 'blank-plugin' ),
							'icon'        => '<span class="dashicons dashicons-editor-justify"></span>',
							'slug'        => 'toggle',
							'options'     => array_merge( $this->toggle, $this->toggle_settings, $this->toggle_options ),
						),
						array(
							'title'       => esc_html__( 'Shortcode With Vertical Tabs', 'blank-plugin' ),
							'icon'        => '<span class="dashicons dashicons-category"></span>',
							'slug'        => 'tab_vertical_shortcode',
							'options'     => array_merge( $this->tab_vertical, $this->tab_vertical_settings, $this->tab_vertical_options ),
						),
						array(
							'title'           => esc_html__( 'Shortcode With Horizontal Tabs', 'blank-plugin' ),
							'icon'            => '<span class="dashicons dashicons-portfolio"></span>',
							'slug'            => 'tab_horizontal_shortcode',
							'default_content' => 'new-shortcode',
							'twin'            => true,
							'options'         => array_merge( $this->tab_horizontal, $this->tab_horizontal_settings, $this->tab_horizontal_options ),
						),
					),
				)
			);

		}
	}
}
