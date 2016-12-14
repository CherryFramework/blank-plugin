<?php
/**
 * Plugin Options.
 *
 * @package    Blank_Plugin
 * @subpackage Admin
 * @author     Cherry Team
 * @license    GPL-3.0+
 * @copyright  2012-2016, Cherry Team
 */

// If class `Blank_Plugin_Options` doesn't exists yet.
if ( ! class_exists( 'Blank_Plugin_Options' ) ) {

	/**
	 * Blank_Plugin_Options class.
	 */
	class Blank_Plugin_Options {

		/**
		 * Section on options page.
		 *
		 * @since 1.0.0
		 * @var array
		 * @access protected
		 */
		protected $section = null;

		/**
		* Form on options page.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $form = null;

		/**
		* User interface elements.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $ui_elements = null;

		/**
		* Interface builder elements.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $bi_elements = null;

		/**
		* User interface potions.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $ui_elements_options = null;

		/**
		* Submit buttons.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $submit_buttons = null;

		/**
		* Buttons.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $options_button = null;

		/**
		* Accordion.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $accordion = null;

		/**
		* Toggle.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $toggle = null;

		/**
		* Vertical tabs.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $tab_vertical = null;

		/**
		* Horizontal tabs.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $tab_horizontal = null;

		/**
		* Accordion settings.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $accordion_settings = null;

		/**
		* Toggle settings.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $toggle_settings = null;

		/**
		* Vertical tabs settings.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $tab_vertical_settings = null;

		/**
		* Horizontal tabs settings.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $tab_horizontal_settings = null;

		/**
		* Accordion options.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $accordion_options = null;

		/**
		* Toggle options.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $toggle_options = null;

		/**
		* Vertical tabs options.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $tab_vertical_options = null;

		/**
		* Horizontal tab options.
		*
		* @since 1.0.0
		* @var array
		* @access protected
		*/
		protected $tab_horizontal_options = null;

		/**
		 * HTML spinner.
		 *
		 * @since 1.0.0
		 * @var string
		 * @access private
		 */
		private $spinner = '<span class="loader-wrapper"><span class="loader"></span></span>';

		/**
		 * Dashicons.
		 *
		 * @since 1.0.0
		 * @var string
		 * @access private
		 */
		private $button_icon = '<span class="dashicons dashicons-yes icon"></span>';

		/**
		 * Default options.
		 *
		 * @since 1.0.0
		 * @var array
		 * @access private
		 */
		private $default_options = array();

		/**
		 * Class constructor.
		 *
		 * @since 1.0.0
		 * @access public
		 * @return void
		 */
		public function __construct() {
			$this->set_options();
		}

		/**
		 * Function set phugin options.
		 *
		 * @since 1.0.0
		 * @access private
		 * @return void
		 */
		private function set_options() {
			$this->section = array(
				'option_section' => array(
					'type'        => 'section',
					'scroll'      => true,
					'title'       => __( '<span class="dashicons dashicons-admin-settings"></span> Option Section', 'blank-plugin' ),
					'description' => esc_html__( 'Elements formed with modules cherry-ui-elements and cherry-interface-builder.', 'blank-plugin' ),
				),
			);

			$this->form = array(
				'option_form' => array(
					'type'   => 'form',
					'parent' => 'option_section',
					'action' => 'my_action.php',
				),
			);

			$this->ui_elements = array(
				'ui_elements' => array(
					'type'        => 'settings',
					'parent'      => 'option_form',
					'title'       => __( '<span class="dashicons dashicons-admin-generic"></span> UI Elements', 'blank-plugin' ),
					'description' => esc_html__( 'UI element created with the module cherry-ui-elements.', 'blank-plugin' ),
				),
			);

			$this->bi_elements = array(
				'bi_elements' => array(
					'type'        => 'settings',
					'parent'      => 'option_form',
					'title'       => __( '<span class="dashicons dashicons-admin-generic"></span> Interface Builder Element', 'blank-plugin' ),
					'description' => esc_html__( 'Interface element created with the module cherry-interface-builder.', 'blank-plugin' ),
				),
			);

			$this->ui_elements_options = array(
				'checkbox' => array(
					'type'        => 'checkbox',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox' => 'true',
					),
					'options'     => array(
						'checkbox' => esc_html__( 'Check Me', 'blank-plugin' ),
					),
				),
				'checkbox_multi' => array(
					'type'        => 'checkbox',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Multi Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox-0' => 'false',
						'checkbox-1' => 'false',
						'checkbox-2' => 'false',
						'checkbox-3' => 'true',
						'checkbox-4' => 'true',
					),
					'options' => array(
						'checkbox-0' => array(
							'label' => esc_html__( 'Check Me #1', 'blank-plugin' ),
						),
						'checkbox-1' => esc_html__( 'Check Me #2', 'blank-plugin' ),
						'checkbox-2' => esc_html__( 'Check Me #3', 'blank-plugin' ),
						'checkbox-3' => esc_html__( 'Check Me #4', 'blank-plugin' ),
						'checkbox-4' => esc_html__( 'Check Me #5', 'blank-plugin' ),
					),
				),
				'colorpicker' => array(
					'type'        => 'colorpicker',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Color Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'class'       => '',
					'value'       => '#3da3ce',
					'label'       => '',
				),
				'icon' => array(
					'type'        => 'iconpicker',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Icon Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description icon picker.', 'blank-plugin' ),
					'value'       => 'fa-wordpress',
					'icon_data'   => array(
						'icon_set'    => 'cherryWidgetFontAwesome',
						'icon_css'    => esc_url( BLANK_PLUGIN_URI . 'assets/css/min/font-awesome.min.css' ),
						'icon_base'   => 'fa',
						'icon_prefix' => 'fa-',
						'icons'       => $this->get_icons_set(),
					),
				),
				'media_image' => array(
					'type'               => 'media',
					'parent'             => 'ui_elements',
					'title'              => esc_html__( 'Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'icon_picker' => array(
					'type'        => 'iconpicker',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Icon Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description icon picker.', 'blank-plugin' ),
					'value'       => 'fa-wordpress',
					'icon_data'   => array(
						'icon_set'    => 'cherryWidgetFontAwesome',
						'icon_css'    => esc_url( BLANK_PLUGIN_URI . 'assets/css/min/font-awesome.min.css' ),
						'icon_base'   => 'fa',
						'icon_prefix' => 'fa-',
						'icons'       => $this->get_icons_set(),
					),
				),
				'media_multi_image' => array(
					'type'               => 'media',
					'parent'             => 'ui_elements',
					'title'              => esc_html__( 'Multi Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description multi choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => true,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_video' => array(
					'type'               => 'media',
					'parent'             => 'ui_elements',
					'title'              => esc_html__( 'Choose Video', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose video.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'video',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'radio' => array(
					'type'        => 'radio',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Radio Button', 'blank-plugin' ),
					'description' => esc_html__( 'Adds radio buttons group. Lets user select one option from the list.', 'blank-plugin' ),
					'value'       => 'radio-2',
					'options'     => array(
						'radio-1' => array(
							'label' => 'Radio #1',
						),
						'radio-2' => array(
							'label' => 'Radio #2',
						),
						'radio-3' => array(
							'label' => 'Radio #3',
						),
					),
					'class' => '',
					'label' => '',
				),
				'radio_image' => array(
					'type'          => 'radio',
					'parent'        => 'ui_elements',
					'title'         => esc_html__( 'Image Radio Button', 'blank-plugin' ),
					'description'   => esc_html__( 'Adds image based radio buttons group. Behaves as HTML radio buttons.', 'blank-plugin' ),
					'value'         => 'grid-layout',
					'class'         => '',
					'display_input' => false,
					'options'       => array(
						'grid-layout' => array(
							'label'   => esc_html__( 'Grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-grid.svg',
						),
						'masonry-layout' => array(
							'label'   => esc_html__( 'Masonry', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-masonry.svg',
						),
						'justified-layout' => array(
							'label'   => esc_html__( 'Justified', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-justified.svg',
						),
						'cascading-grid-layout' => array(
							'label'   => esc_html__( 'Cascading grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-cascading-grid.svg',
						),
						'list-layout' => array(
							'label'   => esc_html__( 'List', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-listing.svg',
						),
					),
				),
				'select' => array(
					'type'          => 'select',
					'parent'        => 'ui_elements',
					'title'         => esc_html__( 'Select', 'blank-plugin' ),
					'description'   => esc_html__( 'Description select.', 'blank-plugin' ),
					'multiple'      => false,
					'filter'        => true,
					'value'         => 'select-8',
					'options'       => array(
						'select-1'   => 'select 1',
						'select-2'   => 'select 2',
						'select-3'   => 'select 3',
						'select-4'   => 'select 4',
						'select-5'   => 'select 5',
						'optgroup-1' => array(
							'label'         => 'Group 1',
							'group_options' => array(
								'select-6' => 'select 6',
								'select-7' => 'select 7',
								'select-8' => 'select 8',
							),
						),
						'optgroup-2' => array(
							'label'         => 'Group 2',
							'group_options' => array(
								'select-9'  => 'select 9',
								'select-10' => 'select 10',
								'select-11' => 'select 11',
							),
						),
					),
					'placeholder'   => 'Select',
					'label'         => '',
					'class'         => '',
				),
				'multi_select' => array(
					'type'        => 'select',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Multi Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi select.', 'blank-plugin' ),
					'multiple'    => true,
					'filter'      => true,
					'value'       => array( 'select-2', 'select-4' ),
					'options'     => array(
						'select-1' => 'select 1',
						'select-2' => 'select 2',
						'select-3' => 'select 3',
						'select-4' => 'select 4',
						'select-5' => 'select 5',
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'draggable-slider' => array(
					'type'        => 'slider',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Slider', 'blank-plugin' ),
					'description' => esc_html__( 'Draggable slider with stepper. Used to define some numeric value.', 'blank-plugin' ),
					'value'       => 250,
					'max_value'   => 500,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),
				'stepper' => array(
					'type'        => 'stepper',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Stepper', 'blank-plugin' ),
					'description' => esc_html__( 'Adds a number input used to define numeric values.', 'blank-plugin' ),
					'value'       => 150,
					'max_value'   => 400,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),
				'switcher' => array(
					'type'         => 'switcher',
					'parent'       => 'ui_elements',
					'title'        => esc_html__( 'Switcher', 'blank-plugin' ),
					'description'  => esc_html__( 'Analogue of the regular HTML radio buttons.', 'blank-plugin' ),
					'value'        => 'false',
					'toggle'       => array(
					'true_toggle'  => 'On',
					'false_toggle' => 'Off',
					),
					'style'        => 'normal',
					'class'        => '',
					'label'        => '',
				),
				'text' => array(
					'type'        => 'text',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Text', 'blank-plugin' ),
					'description' => esc_html__( 'Description text.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'class'       => '',
					'label'       => '',

				),
				'textarea' => array(
					'type'        => 'textarea',
					'parent'      => 'ui_elements',
					'title'       => esc_html__( 'Text Area', 'blank-plugin' ),
					'description' => esc_html__( 'Description text area.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'rows'        => '10',
					'cols'        => '20',
					'class'       => '',
					'label'       => '',
				),
			);

			$this->submit_buttons = array(
				'submit_buttons' => array(
					'type'        => 'settings',
					'parent'      => 'option_form',
				),
			);

			$this->options_button = array(
				// Submite buttons
				'reset-buttons'  => array(
					'type'          => 'button',
					'parent'        => 'submit_buttons',
					'view_wrapping' => false,
					'content'       => '<span class="text">' . esc_html__( 'Reset', 'blank-plugin' ) . '</span>' . $this->spinner . $this->button_icon,
					'form'          => 'option_form',
				),
				'save-buttons'  => array(
					'type'          => 'button',
					'parent'        => 'submit_buttons',
					'style'         => 'success',
					'view_wrapping' => false,
					'content'       => '<span class="text">' . esc_html__( 'Save', 'blank-plugin' ) . '</span>' . $this->spinner . $this->button_icon,
					'form'          => 'option_form',
				),
			);

			$this->accordion = array(
				'accordion' => array(
					'type'        => 'component-accordion',
					'parent'      => 'bi_elements',
					'title'       => esc_html__( 'Component accordion', 'blank-plugin' ),
					'description' => esc_html__( 'Component Description', 'blank-plugin' ),
				),
			);
			$this->toggle = array(
				'toggle' => array(
					'type'        => 'component-toggle',
					'parent'      => 'bi_elements',
					'title'       => esc_html__( 'Component Toggle', 'blank-plugin' ),
					'description' => esc_html__( 'Component Description', 'blank-plugin' ),
				),
			);
			$this->tab_vertical = array(
				'tab_vertical' => array(
					'type'        => 'component-tab-vertical',
					'parent'      => 'bi_elements',
					'title'       => esc_html__( 'Component Vertical Tab', 'blank-plugin' ),
					'description' => esc_html__( 'Component Description', 'blank-plugin' ),
				),
			);
			$this->tab_horizontal= array(
				'tab_horizontal' => array(
					'type'        => 'component-tab-horizontal',
					'parent'      => 'bi_elements',
					'title'       => esc_html__( 'Component Horizontal Tab', 'blank-plugin' ),
					'description' => esc_html__( 'Component Description', 'blank-plugin' ),
				),
			);

			$this->accordion_settings = array(
				'accordion_1' => array(
					'type'        => 'settings',
					'parent'      => 'accordion',
					'title'       => esc_html__( 'Accordion child #1', 'blank-plugin' ),
					'description' => esc_html__( 'First acordion child description.', 'blank-plugin' ),
				),
				'accordion_2' => array(
					'type'        => 'settings',
					'parent'      => 'accordion',
					'title'       => esc_html__( 'Accordion child #2', 'blank-plugin' ),
					'description' => esc_html__( 'Second acordion child description.', 'blank-plugin' ),
				),
				'accordion_3' => array(
					'type'        => 'settings',
					'parent'      => 'accordion',
					'title'       => esc_html__( 'Accordion child #3', 'blank-plugin' ),
					'description' => esc_html__( 'Third acordion child description.', 'blank-plugin' ),
				),
				'accordion_4' => array(
					'type'        => 'settings',
					'parent'      => 'accordion',
					'title'       => esc_html__( 'Accordion child #4', 'blank-plugin' ),
					'description' => esc_html__( 'Fourth acordion child description.', 'blank-plugin' ),
				),
			);

			$this->toggle_settings = array(
				'toggle_1' => array(
					'type'        => 'settings',
					'parent'      => 'toggle',
					'title'       => esc_html__( 'Toggle child #1', 'blank-plugin' ),
					'description' => esc_html__( 'First toggle child child description.', 'blank-plugin' ),
				),
				'toggle_2' => array(
					'type'        => 'settings',
					'parent'      => 'toggle',
					'title'       => esc_html__( 'Toggle child #2', 'blank-plugin' ),
					'description' => esc_html__( 'Second toggle child child description.', 'blank-plugin' ),
				),
				'toggle_3' => array(
					'type'        => 'settings',
					'parent'      => 'toggle',
					'title'       => esc_html__( 'Toggle child #3', 'blank-plugin' ),
					'description' => esc_html__( 'Third toggle child child description.', 'blank-plugin' ),
				),
				'toggle_4' => array(
					'type'        => 'settings',
					'parent'      => 'toggle',
					'title'       => esc_html__( 'Toggle child #4', 'blank-plugin' ),
					'description' => esc_html__( 'Fourth toggle child child description.', 'blank-plugin' ),
				),
			);

			$this->tab_vertical_settings = array(
				'tab_vertical_1' => array(
					'type'        => 'settings',
					'parent'      => 'tab_vertical',
					'title'       => esc_html__( 'Tab #1', 'blank-plugin' ),
					'description' => esc_html__( 'First tab description.', 'blank-plugin' ),
				),
				'tab_vertical_2' => array(
					'type'        => 'settings',
					'parent'      => 'tab_vertical',
					'title'       => esc_html__( 'Tab #2', 'blank-plugin' ),
					'description' => esc_html__( 'Second tab description.', 'blank-plugin' ),
				),
				'tab_vertical_3' => array(
					'type'        => 'settings',
					'parent'      => 'tab_vertical',
					'title'       => esc_html__( 'Tab #3', 'blank-plugin' ),
					'description' => esc_html__( 'Third tab description.', 'blank-plugin' ),
				),
				'tab_vertical_4' => array(
					'type'        => 'settings',
					'parent'      => 'tab_vertical',
					'title'       => esc_html__( 'Tab #4', 'blank-plugin' ),
					'description' => esc_html__( 'Fourth tab description.', 'blank-plugin' ),
				),
			);

			$this->tab_horizontal_settings = array(
				'tab_horizontal_1' => array(
					'type'        => 'settings',
					'parent'      => 'tab_horizontal',
					'title'       => esc_html__( 'Tab #1', 'blank-plugin' ),
					'description' => esc_html__( 'First tab description.', 'blank-plugin' ),
				),
				'tab_horizontal_2' => array(
					'type'        => 'settings',
					'parent'      => 'tab_horizontal',
					'title'       => esc_html__( 'Tab #2', 'blank-plugin' ),
					'description' => esc_html__( 'Second tab description.', 'blank-plugin' ),
				),
				'tab_horizontal_3' => array(
					'type'        => 'settings',
					'parent'      => 'tab_horizontal',
					'title'       => esc_html__( 'Tab #3', 'blank-plugin' ),
					'description' => esc_html__( 'Third tab description.', 'blank-plugin' ),
				),
				'tab_horizontal_4' => array(
					'type'        => 'settings',
					'parent'      => 'tab_horizontal',
					'title'       => esc_html__( 'Tab #4', 'blank-plugin' ),
					'description' => esc_html__( 'Fourth tab description.', 'blank-plugin' ),
				),
			);

			$this->accordion_options = array(
				'checkbox_4' => array(
					'type'        => 'checkbox',
					'parent'      => 'accordion_1',
					'title'       => esc_html__( 'Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox' => 'true',
					),
					'options' => array(
						'checkbox' => esc_html__( 'Check Me', 'blank-plugin' ),
					),
				),
				'checkbox_multi_4' => array(
					'type'        => 'checkbox',
					'parent'      => 'accordion_1',
					'title'       => esc_html__( 'Multi Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox-0' => 'true',
						'checkbox-1' => 'false',
						'checkbox-2' => 'false',
						'checkbox-3' => 'true',
						'checkbox-4' => 'true',
					),
					'options' => array(
						'checkbox-0' => esc_html__( 'Check Me #1', 'blank-plugin' ),
						'checkbox-1' => esc_html__( 'Check Me #2', 'blank-plugin' ),
						'checkbox-2' => esc_html__( 'Check Me #3', 'blank-plugin' ),
						'checkbox-3' => esc_html__( 'Check Me #4', 'blank-plugin' ),
						'checkbox-4' => esc_html__( 'Check Me #5', 'blank-plugin' ),
					),
				),
				'colorpicker_4' => array(
					'type'        => 'colorpicker',
					'parent'      => 'accordion_1',
					'title'       => esc_html__( 'Color Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'class'       => '',
					'value'       => '#3da3ce',
					'label'       => '',
				),
				'icon_4' => array(
					'type'        => 'iconpicker',
					'parent'      => 'accordion_1',
					'title'       => esc_html__( 'Icon Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'value'       => 'fa-wordpress',
					'icon_data'   => array(
						'icon_set'    => 'cherryWidgetFontAwesome',
						'icon_css'    => esc_url( BLANK_PLUGIN_URI . 'assets/css/min/font-awesome.min.css' ),
						'icon_base'   => 'fa',
						'icon_prefix' => 'fa-',
						'icons'       => $this->get_icons_set(),
					),
				),

				'media_image_4' => array(
					'type'               => 'media',
					'parent'             => 'accordion_2',
					'title'              => esc_html__( 'Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_multi_image_4' => array(
					'type'               => 'media',
					'parent'             => 'accordion_2',
					'title'              => esc_html__( 'Multi Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description multi choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => true,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_video_4' => array(
					'type'               => 'media',
					'parent'             => 'accordion_2',
					'title'              => esc_html__( 'Choose Video', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose video.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'video',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'radio_4' => array(
					'type'        => 'radio',
					'parent'      => 'accordion_2',
					'title'       => esc_html__( 'Radio Button', 'blank-plugin' ),
					'description' => esc_html__( 'Adds radio buttons group. Lets user select one option from the list.', 'blank-plugin' ),
					'value'       => 'radio-1',
					'options'     => array(
						'radio-1' => array(
							'label' => 'Radio #1',
						),
						'radio-2' => array(
							'label' => 'Radio #2',
						),
						'radio-3' => array(
							'label' => 'Radio #3',
						),
					),
					'class' => '',
					'label' => '',
				),

				'radio_image_4' => array(
					'type'          => 'radio',
					'parent'        => 'accordion_3',
					'title'         => esc_html__( 'Image Radio Button', 'blank-plugin' ),
					'description'   => esc_html__( 'Adds image based radio buttons group. Behaves as HTML radio buttons.', 'blank-plugin' ),
					'value'         => 'grid-layout',
					'class'         => '',
					'display_input' => false,
					'options'       => array(
						'grid-layout' => array(
							'label'   => esc_html__( 'Grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-grid.svg',
						),
						'masonry-layout' => array(
							'label'   => esc_html__( 'Masonry', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-masonry.svg',
						),
						'justified-layout' => array(
							'label'   => esc_html__( 'Justified', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-justified.svg',
						),
						'cascading-grid-layout' => array(
							'label'   => esc_html__( 'Cascading grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-cascading-grid.svg',
						),
						'list-layout' => array(
							'label'   => esc_html__( 'List', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-listing.svg',
						),
					),
				),
				'select_4' => array(
					'type'        => 'select',
					'parent'      => 'accordion_3',
					'title'       => esc_html__( 'Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description select.', 'blank-plugin' ),
					'multiple'    => false,
					'filter'      => true,
					'value'       => 'select-8',
					'options'     => array(
						'select-1'   => 'select 1',
						'select-2'   => 'select 2',
						'select-3'   => 'select 3',
						'select-4'   => 'select 4',
						'select-5'   => 'select 5',
						'optgroup-1' => array(
							'label'         => 'Group 1',
							'group_options' => array(
								'select-6' => 'select 6',
								'select-7' => 'select 7',
								'select-8' => 'select 8',
							),
						),
						'optgroup-2' => array(
							'label'         => 'Group 2',
							'group_options' => array(
								'select-9'  => 'select 9',
								'select-10' => 'select 10',
								'select-11' => 'select 11',
							),
						),
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'multi_select_4' => array(
					'type'        => 'select',
					'parent'      => 'accordion_3',
					'title'       => esc_html__( 'Multi Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi select.', 'blank-plugin' ),
					'multiple'    => true,
					'filter'      => true,
					'value'       => array( 'select-2', 'select-4' ),
					'options'     => array(
						'select-1' => 'select 1',
						'select-2' => 'select 2',
						'select-3' => 'select 3',
						'select-4' => 'select 4',
						'select-5' => 'select 5',
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'slider_4' => array(
					'type'        => 'slider',
					'parent'      => 'accordion_3',
					'title'       => esc_html__( 'Slider', 'blank-plugin' ),
					'description' => esc_html__( 'Draggable slider with stepper. Used to define some numeric value.', 'blank-plugin' ),
					'value'       => 250,
					'max_value'   => 500,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),

				'stepper_4' => array(
					'type'        => 'stepper',
					'parent'      => 'accordion_4',
					'title'       => esc_html__( 'Stepper', 'blank-plugin' ),
					'description' => esc_html__( 'Adds a number input used to define numeric values.', 'blank-plugin' ),
					'value'       => 150,
					'max_value'   => 400,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),
				'switcher_4' => array(
					'type'        => 'switcher',
					'parent'      => 'accordion_4',
					'title'       => esc_html__( 'Switcher', 'blank-plugin' ),
					'description' => esc_html__( 'Analogue of the regular HTML radio buttons.', 'blank-plugin' ),
					'value'       => 'true',
					'toggle'      => array(
						'true_toggle'  => 'On',
						'false_toggle' => 'Off',
					),
					'style' => 'normal',
					'class' => '',
					'label' => '',
				),
				'text_4' => array(
					'type'        => 'text',
					'parent'      => 'accordion_4',
					'title'       => esc_html__( 'Text', 'blank-plugin' ),
					'description' => esc_html__( 'Description text.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'class'       => '',
					'label'       => '',
				),
				'textarea_4' => array(
					'type'        => 'textarea',
					'parent'      => 'accordion_4',
					'title'       => esc_html__( 'Text Area', 'blank-plugin' ),
					'description' => esc_html__( 'Description text area.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'rows'        => '10',
					'cols'        => '20',
					'class'       => '',
					'label'       => '',
				),
			);

			$this->toggle_options = array(
				'checkbox_5' => array(
					'type'        => 'checkbox',
					'parent'      => 'toggle_4',
					'title'       => esc_html__( 'Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox' => 'true',
					),
					'options' => array(
						'checkbox' => esc_html__( 'Check Me', 'blank-plugin' ),
					),
				),
				'checkbox_multi_5' => array(
					'type'        => 'checkbox',
					'parent'      => 'toggle_4',
					'title'       => esc_html__( 'Multi Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox-0' => 'true',
						'checkbox-1' => 'false',
						'checkbox-2' => 'false',
						'checkbox-3' => 'true',
						'checkbox-4' => 'true',
					),
					'options' => array(
						'checkbox-0' => esc_html__( 'Check Me #1', 'blank-plugin' ),
						'checkbox-1' => esc_html__( 'Check Me #2', 'blank-plugin' ),
						'checkbox-2' => esc_html__( 'Check Me #3', 'blank-plugin' ),
						'checkbox-3' => esc_html__( 'Check Me #4', 'blank-plugin' ),
						'checkbox-4' => esc_html__( 'Check Me #5', 'blank-plugin' ),
					),
				),
				'colorpicker_5' => array(
					'type'        => 'colorpicker',
					'parent'      => 'toggle_4',
					'title'       => esc_html__( 'Color Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'class'       => '',
					'value'       => '#3da3ce',
					'label'       => '',
				),
				'icon_5' => array(
					'type'        => 'iconpicker',
					'parent'      => 'toggle_4',
					'title'       => esc_html__( 'Color Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'value'       => 'fa-wordpress',
					'icon_data'   => array(
						'icon_set'    => 'cherryWidgetFontAwesome',
						'icon_css'    => esc_url( BLANK_PLUGIN_URI . 'assets/css/min/font-awesome.min.css' ),
						'icon_base'   => 'fa',
						'icon_prefix' => 'fa-',
						'icons'       => $this->get_icons_set(),
					),
				),

				'media_image_5' => array(
					'type'               => 'media',
					'parent'             => 'toggle_3',
					'title'              => esc_html__( 'Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_multi_image_5' => array(
					'type'               => 'media',
					'parent'             => 'toggle_3',
					'title'              => esc_html__( 'Multi Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description multi choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => true,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_video_5' => array(
					'type'               => 'media',
					'parent'             => 'toggle_3',
					'title'              => esc_html__( 'Choose Video', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose video.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'video',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'radio_5' => array(
					'type'        => 'radio',
					'parent'      => 'toggle_3',
					'title'       => esc_html__( 'Radio Button', 'blank-plugin' ),
					'description' => esc_html__( 'Adds radio buttons group. Lets user select one option from the list.', 'blank-plugin' ),
					'value'       => 'radio-1',
					'options'     => array(
						'radio-1' => array(
							'label' => 'Radio #1',
						),
						'radio-2' => array(
							'label' => 'Radio #2',
						),
						'radio-3' => array(
							'label' => 'Radio #3',
						),
					),
					'class' => '',
					'label' => '',
				),

				'radio_image_5' => array(
					'type'          => 'radio',
					'parent'        => 'toggle_2',
					'title'         => esc_html__( 'Image Radio Button', 'blank-plugin' ),
					'description'   => esc_html__( 'Adds image based radio buttons group. Behaves as HTML radio buttons.', 'blank-plugin' ),
					'value'         => 'grid-layout',
					'class'         => '',
					'display_input' => false,
					'options'       => array(
						'grid-layout' => array(
							'label'   => esc_html__( 'Grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-grid.svg',
						),
						'masonry-layout' => array(
							'label'   => esc_html__( 'Masonry', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-masonry.svg',
						),
						'justified-layout' => array(
							'label'   => esc_html__( 'Justified', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-justified.svg',
						),
						'cascading-grid-layout' => array(
							'label'   => esc_html__( 'Cascading grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-cascading-grid.svg',
						),
						'list-layout' => array(
							'label'   => esc_html__( 'List', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-listing.svg',
						),
					),
				),
				'select_5' => array(
					'type'        => 'select',
					'parent'      => 'toggle_2',
					'title'       => esc_html__( 'Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description select.', 'blank-plugin' ),
					'multiple'    => false,
					'filter'      => true,
					'value'       => 'select-8',
					'options'     => array(
						'select-1'   => 'select 1',
						'select-2'   => 'select 2',
						'select-3'   => 'select 3',
						'select-4'   => 'select 4',
						'select-5'   => 'select 5',
						'optgroup-1' => array(
							'label'         => 'Group 1',
							'group_options' => array(
								'select-6' => 'select 6',
								'select-7' => 'select 7',
								'select-8' => 'select 8',
							),
						),
						'optgroup-2' => array(
							'label'         => 'Group 2',
							'group_options' => array(
								'select-9'  => 'select 9',
								'select-10' => 'select 10',
								'select-11' => 'select 11',
							),
						),
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'multi_select_5' => array(
					'type'        => 'select',
					'parent'      => 'toggle_2',
					'title'       => esc_html__( 'Multi Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi select.', 'blank-plugin' ),
					'multiple'    => true,
					'filter'      => true,
					'value'       => array( 'select-2', 'select-4' ),
					'options'     => array(
						'select-1' => 'select 1',
						'select-2' => 'select 2',
						'select-3' => 'select 3',
						'select-4' => 'select 4',
						'select-5' => 'select 5',
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'slider_5' => array(
					'type'        => 'slider',
					'parent'      => 'toggle_2',
					'title'       => esc_html__( 'Slider', 'blank-plugin' ),
					'description' => esc_html__( 'Draggable slider with stepper. Used to define some numeric value.', 'blank-plugin' ),
					'value'       => 250,
					'max_value'   => 500,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),

				'stepper_5' => array(
					'type'        => 'stepper',
					'parent'      => 'toggle_1',
					'title'       => esc_html__( 'Stepper', 'blank-plugin' ),
					'description' => esc_html__( 'Adds a number input used to define numeric values.', 'blank-plugin' ),
					'value'       => 150,
					'max_value'   => 400,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),
				'switcher_5' => array(
					'type'        => 'switcher',
					'parent'      => 'toggle_1',
					'title'       => esc_html__( 'Switcher', 'blank-plugin' ),
					'description' => esc_html__( 'Analogue of the regular HTML radio buttons.', 'blank-plugin' ),
					'value'       => 'true',
					'toggle'      => array(
						'true_toggle'  => 'On',
						'false_toggle' => 'Off',
					),
					'style' => 'normal',
					'class' => '',
					'label' => '',
				),
				'text_5' => array(
					'type'        => 'text',
					'parent'      => 'toggle_1',
					'title'       => esc_html__( 'Text', 'blank-plugin' ),
					'description' => esc_html__( 'Description text.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'class'       => '',
					'label'       => '',
				),
				'textarea_5' => array(
					'type'        => 'textarea',
					'parent'      => 'toggle_1',
					'title'       => esc_html__( 'Text Area', 'blank-plugin' ),
					'description' => esc_html__( 'Description text area.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'rows'        => '10',
					'cols'        => '20',
					'class'       => '',
					'label'       => '',
				),
			);

			$this->tab_vertical_options = array(
				'checkbox_2' => array(
					'type'        => 'checkbox',
					'parent'      => 'tab_vertical_1',
					'title'       => esc_html__( 'Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox' => 'true',
					),
					'options' => array(
						'checkbox' => esc_html__( 'Check Me', 'blank-plugin' ),
					),
				),
				'checkbox_multi_2' => array(
					'type'        => 'checkbox',
					'parent'      => 'tab_vertical_1',
					'title'       => esc_html__( 'Multi Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox-0' => 'true',
						'checkbox-1' => 'false',
						'checkbox-2' => 'false',
						'checkbox-3' => 'true',
						'checkbox-4' => 'true',
					),
					'options' => array(
						'checkbox-0' => esc_html__( 'Check Me #1', 'blank-plugin' ),
						'checkbox-1' => esc_html__( 'Check Me #2', 'blank-plugin' ),
						'checkbox-2' => esc_html__( 'Check Me #3', 'blank-plugin' ),
						'checkbox-3' => esc_html__( 'Check Me #4', 'blank-plugin' ),
						'checkbox-4' => esc_html__( 'Check Me #5', 'blank-plugin' ),
					),
				),
				'colorpicker_2' => array(
					'type'        => 'colorpicker',
					'parent'      => 'tab_vertical_1',
					'title'       => esc_html__( 'Color Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'class'       => '',
					'value'       => '#3da3ce',
					'label'       => '',
				),
				'icon_2' => array(
					'type'        => 'iconpicker',
					'parent'      => 'tab_vertical_1',
					'title'       => esc_html__( 'Icon Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'value'       => 'fa-wordpress',
					'icon_data'   => array(
						'icon_set'    => 'cherryWidgetFontAwesome',
						'icon_css'    => esc_url( BLANK_PLUGIN_URI . 'assets/css/min/font-awesome.min.css' ),
						'icon_base'   => 'fa',
						'icon_prefix' => 'fa-',
						'icons'       => $this->get_icons_set(),
					),
				),

				'media_image_2' => array(
					'type'               => 'media',
					'parent'             => 'tab_vertical_2',
					'title'              => esc_html__( 'Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_multi_image_2' => array(
					'type'               => 'media',
					'parent'             => 'tab_vertical_2',
					'title'              => esc_html__( 'Multi Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description multi choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => true,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_video_2' => array(
					'type'               => 'media',
					'parent'             => 'tab_vertical_2',
					'title'              => esc_html__( 'Choose Video', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose video.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'video',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'radio_2' => array(
					'type'        => 'radio',
					'parent'      => 'tab_vertical_2',
					'title'       => esc_html__( 'Radio Button', 'blank-plugin' ),
					'description' => esc_html__( 'Adds radio buttons group. Lets user select one option from the list.', 'blank-plugin' ),
					'value'       => 'radio-1',
					'options'     => array(
						'radio-1' => array(
							'label' => 'Radio #1',
						),
						'radio-2' => array(
							'label' => 'Radio #2',
						),
						'radio-3' => array(
							'label' => 'Radio #3',
						),
					),
					'class' => '',
					'label' => '',
				),

				'radio_image_2' => array(
					'type'          => 'radio',
					'parent'        => 'tab_vertical_3',
					'title'         => esc_html__( 'Image Radio Button', 'blank-plugin' ),
					'description'   => esc_html__( 'Adds image based radio buttons group. Behaves as HTML radio buttons.', 'blank-plugin' ),
					'value'         => 'grid-layout',
					'class'         => '',
					'display_input' => false,
					'options'       => array(
						'grid-layout' => array(
							'label'   => esc_html__( 'Grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-grid.svg',
						),
						'masonry-layout' => array(
							'label'   => esc_html__( 'Masonry', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-masonry.svg',
						),
						'justified-layout' => array(
							'label'   => esc_html__( 'Justified', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-justified.svg',
						),
						'cascading-grid-layout' => array(
							'label'   => esc_html__( 'Cascading grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-cascading-grid.svg',
						),
						'list-layout' => array(
							'label'   => esc_html__( 'List', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-listing.svg',
						),
					),
				),
				'select_2' => array(
					'type'        => 'select',
					'parent'      => 'tab_vertical_3',
					'title'       => esc_html__( 'Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description select.', 'blank-plugin' ),
					'multiple'    => false,
					'filter'      => true,
					'value'       => 'select-8',
					'options'     => array(
						'select-1'   => 'select 1',
						'select-2'   => 'select 2',
						'select-3'   => 'select 3',
						'select-4'   => 'select 4',
						'select-5'   => 'select 5',
						'optgroup-1' => array(
							'label'         => 'Group 1',
							'group_options' => array(
								'select-6' => 'select 6',
								'select-7' => 'select 7',
								'select-8' => 'select 8',
							),
						),
						'optgroup-2' => array(
							'label'         => 'Group 2',
							'group_options' => array(
								'select-9'  => 'select 9',
								'select-10' => 'select 10',
								'select-11' => 'select 11',
							),
						),
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'multi_select_2' => array(
					'type'        => 'select',
					'parent'      => 'tab_vertical_3',
					'title'       => esc_html__( 'Multi Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi select.', 'blank-plugin' ),
					'multiple'    => true,
					'filter'      => true,
					'value'       => array( 'select-2', 'select-4' ),
					'options'     => array(
						'select-1' => 'select 1',
						'select-2' => 'select 2',
						'select-3' => 'select 3',
						'select-4' => 'select 4',
						'select-5' => 'select 5',
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'slider_2' => array(
					'type'        => 'slider',
					'parent'      => 'tab_vertical_3',
					'title'       => esc_html__( 'Slider', 'blank-plugin' ),
					'description' => esc_html__( 'Draggable slider with stepper. Used to define some numeric value.', 'blank-plugin' ),
					'value'       => 250,
					'max_value'   => 500,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),

				'stepper_2' => array(
					'type'        => 'stepper',
					'parent'      => 'tab_vertical_4',
					'title'       => esc_html__( 'Stepper', 'blank-plugin' ),
					'description' => esc_html__( 'Adds a number input used to define numeric values.', 'blank-plugin' ),
					'value'       => 150,
					'max_value'   => 400,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),
				'switcher_2' => array(
					'type'        => 'switcher',
					'parent'      => 'tab_vertical_4',
					'title'       => esc_html__( 'Switcher', 'blank-plugin' ),
					'description' => esc_html__( 'Analogue of the regular HTML radio buttons.', 'blank-plugin' ),
					'value'       => 'true',
					'toggle'      => array(
						'true_toggle'  => 'On',
						'false_toggle' => 'Off',
					),
					'style' => 'normal',
					'class' => '',
					'label' => '',
				),
				'text_2' => array(
					'type'        => 'text',
					'parent'      => 'tab_vertical_4',
					'title'       => esc_html__( 'Text', 'blank-plugin' ),
					'description' => esc_html__( 'Description text.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'class'       => '',
					'label'       => '',
				),
				'textarea_2' => array(
					'type'        => 'textarea',
					'parent'      => 'tab_vertical_4',
					'title'       => esc_html__( 'Text Area', 'blank-plugin' ),
					'description' => esc_html__( 'Description text area.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'rows'        => '10',
					'cols'        => '20',
					'class'       => '',
					'label'       => '',
				),
			);

			$this->tab_horizontal_options = array(
				'checkbox_3' => array(
					'type'        => 'checkbox',
					'parent'      => 'tab_horizontal_4',
					'title'       => esc_html__( 'Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox' => 'true',
					),
					'options' => array(
						'checkbox' => esc_html__( 'Check Me', 'blank-plugin' ),
					),
				),
				'checkbox_multi_3' => array(
					'type'        => 'checkbox',
					'parent'      => 'tab_horizontal_4',
					'title'       => esc_html__( 'Multi Checkbox', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi checkbox.', 'blank-plugin' ),
					'class'       => '',
					'value'       => array(
						'checkbox-0' => 'true',
						'checkbox-1' => 'false',
						'checkbox-2' => 'false',
						'checkbox-3' => 'true',
						'checkbox-4' => 'true',
					),
					'options' => array(
						'checkbox-0' => esc_html__( 'Check Me #1', 'blank-plugin' ),
						'checkbox-1' => esc_html__( 'Check Me #2', 'blank-plugin' ),
						'checkbox-2' => esc_html__( 'Check Me #3', 'blank-plugin' ),
						'checkbox-3' => esc_html__( 'Check Me #4', 'blank-plugin' ),
						'checkbox-4' => esc_html__( 'Check Me #5', 'blank-plugin' ),
					),
				),
				'colorpicker_3' => array(
					'type'        => 'colorpicker',
					'parent'      => 'tab_horizontal_4',
					'title'       => esc_html__( 'Color Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'class'       => '',
					'value'       => '#3da3ce',
					'label'       => '',
				),
				'icon_3' => array(
					'type'        => 'iconpicker',
					'parent'      => 'tab_horizontal_4',
					'title'       => esc_html__( 'Icon Picker', 'blank-plugin' ),
					'description' => esc_html__( 'Description color picker.', 'blank-plugin' ),
					'value'       => 'fa-wordpress',
					'icon_data'   => array(
						'icon_set'    => 'cherryWidgetFontAwesome',
						'icon_css'    => esc_url( BLANK_PLUGIN_URI . 'assets/css/min/font-awesome.min.css' ),
						'icon_base'   => 'fa',
						'icon_prefix' => 'fa-',
						'icons'       => $this->get_icons_set(),
					),
				),

				'media_image_3' => array(
					'type'               => 'media',
					'parent'             => 'tab_horizontal_3',
					'title'              => esc_html__( 'Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_multi_image_3' => array(
					'type'               => 'media',
					'parent'             => 'tab_horizontal_3',
					'title'              => esc_html__( 'Multi Choose Image', 'blank-plugin' ),
					'description'        => esc_html__( 'Description multi choose image.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => true,
					'library_type'       => 'image',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'media_video_3' => array(
					'type'               => 'media',
					'parent'             => 'tab_horizontal_3',
					'title'              => esc_html__( 'Choose Video', 'blank-plugin' ),
					'description'        => esc_html__( 'Description choose video.', 'blank-plugin' ),
					'value'              => '',
					'multi_upload'       => false,
					'library_type'       => 'video',
					'upload_button_text' => esc_html__( 'Choose Media', 'blank-plugin' ),
					'class'              => '',
					'label'              => '',
				),
				'radio_3' => array(
					'type'        => 'radio',
					'parent'      => 'tab_horizontal_3',
					'title'       => esc_html__( 'Radio Button', 'blank-plugin' ),
					'description' => esc_html__( 'Adds radio buttons group. Lets user select one option from the list.', 'blank-plugin' ),
					'value'       => 'radio-1',
					'options'     => array(
						'radio-1' => array(
							'label' => 'Radio #1',
						),
						'radio-2' => array(
							'label' => 'Radio #2',
						),
						'radio-3' => array(
							'label' => 'Radio #3',
						),
					),
					'class' => '',
					'label' => '',
				),

				'radio_image_3' => array(
					'type'          => 'radio',
					'parent'        => 'tab_horizontal_2',
					'title'         => esc_html__( 'Image Radio Button', 'blank-plugin' ),
					'description'   => esc_html__( 'Adds image based radio buttons group. Behaves as HTML radio buttons.', 'blank-plugin' ),
					'value'         => 'grid-layout',
					'class'         => '',
					'display_input' => false,
					'options'       => array(
						'grid-layout' => array(
							'label'   => esc_html__( 'Grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-grid.svg',
						),
						'masonry-layout' => array(
							'label'   => esc_html__( 'Masonry', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-masonry.svg',
						),
						'justified-layout' => array(
							'label'   => esc_html__( 'Justified', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-justified.svg',
						),
						'cascading-grid-layout' => array(
							'label'   => esc_html__( 'Cascading grid', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-cascading-grid.svg',
						),
						'list-layout' => array(
							'label'   => esc_html__( 'List', 'blank-plugin' ),
							'img_src' => BLANK_PLUGIN_URI . 'assets/img/svg/list-layout-listing.svg',
						),
					),
				),
				'select_3' => array(
					'type'        => 'select',
					'parent'      => 'tab_horizontal_2',
					'title'       => esc_html__( 'Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description select.', 'blank-plugin' ),
					'multiple'    => false,
					'filter'      => true,
					'value'       => 'select-8',
					'options'     => array(
						'select-1'   => 'select 1',
						'select-2'   => 'select 2',
						'select-3'   => 'select 3',
						'select-4'   => 'select 4',
						'select-5'   => 'select 5',
						'optgroup-1' => array(
							'label'         => 'Group 1',
							'group_options' => array(
								'select-6' => 'select 6',
								'select-7' => 'select 7',
								'select-8' => 'select 8',
							),
						),
						'optgroup-2' => array(
							'label'         => 'Group 2',
							'group_options' => array(
								'select-9'  => 'select 9',
								'select-10' => 'select 10',
								'select-11' => 'select 11',
							),
						),
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'multi_select_3' => array(
					'type'        => 'select',
					'parent'      => 'tab_horizontal_2',
					'title'       => esc_html__( 'Multi Select', 'blank-plugin' ),
					'description' => esc_html__( 'Description multi select.', 'blank-plugin' ),
					'multiple'    => true,
					'filter'      => true,
					'value'       => array( 'select-2', 'select-4' ),
					'options'     => array(
						'select-1' => 'select 1',
						'select-2' => 'select 2',
						'select-3' => 'select 3',
						'select-4' => 'select 4',
						'select-5' => 'select 5',
					),
					'placeholder' => 'Select',
					'label'       => '',
					'class'       => '',
				),
				'slider_3' => array(
					'type'        => 'slider',
					'parent'      => 'tab_horizontal_2',
					'title'       => esc_html__( 'Slider', 'blank-plugin' ),
					'description' => esc_html__( 'Draggable slider with stepper. Used to define some numeric value.', 'blank-plugin' ),
					'value'       => 250,
					'max_value'   => 500,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),

				'stepper_3' => array(
					'type'        => 'stepper',
					'parent'      => 'tab_horizontal_1',
					'title'       => esc_html__( 'Stepper', 'blank-plugin' ),
					'description' => esc_html__( 'Adds a number input used to define numeric values.', 'blank-plugin' ),
					'value'       => 150,
					'max_value'   => 400,
					'min_value'   => 0,
					'step_value'  => 1,
					'class'       => '',
					'label'       => '',
				),
				'switcher_3' => array(
					'type'        => 'switcher',
					'parent'      => 'tab_horizontal_1',
					'title'       => esc_html__( 'Switcher', 'blank-plugin' ),
					'description'  => esc_html__( 'Analogue of the regular HTML radio buttons.', 'blank-plugin' ),
					'value'        => 'true',
					'toggle'       => array(
						'true_toggle'  => 'On',
						'false_toggle' => 'Off',
					),
					'style'        => 'normal',
					'class'        => '',
					'label'        => '',
				),
				'text_3' => array(
					'type'        => 'text',
					'parent'      => 'tab_horizontal_1',
					'title'       => esc_html__( 'Text', 'blank-plugin' ),
					'description' => esc_html__( 'Description text.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'class'       => '',
					'label'       => '',
				),
				'textarea_3' => array(
					'type'        => 'textarea',
					'parent'      => 'tab_horizontal_1',
					'title'       => esc_html__( 'Text Area', 'blank-plugin' ),
					'description' => esc_html__( 'Description text area.', 'blank-plugin' ),
					'value'       => '',
					'placeholder' => esc_html__( 'Input Text', 'blank-plugin' ),
					'rows'        => '10',
					'cols'        => '20',
					'class'       => '',
					'label'       => '',
				),
			);


			$this->default_options = array_merge( $this->ui_elements_options, $this->accordion_options, $this->toggle_options, $this->tab_vertical_options, $this->tab_horizontal_options);
		}

		/**
		 * Save plugin options.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @return void
		 */
		protected function save_options( $key = false, $data = array() ) {
			if ( ! empty( $data ) && is_array( $data ) && $key ) {
				update_option( $key, $data );
			}
		}

		/**
		 * Reset options to default.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @return array
		 */
		protected function reset_options() {
			$default_options = $this->set_default_options();

			if ( ! empty( $default_options ) ) {
				$this->save_options( BLANK_PLUGIN_SLUG, $default_options );
			}

			return $default_options;
		}

		/**
		 * Get plugin options.
		 *
		 * @since 1.0.0
		 * @access private
		 * @return array
		 */
		private function get_options( $options_id, $default_value ) {
			$this->default_options[ $options_id ] = $default_value;
			$options                              = get_option( BLANK_PLUGIN_SLUG, false );

			if ( $options && isset( $options[ $options_id ] ) ) {
				return $options[ $options_id ];
			} else {
				return $default_value;
			}
		}

		/**
		 * Set default plugin options.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return array
		 */
		public function set_default_options() {
			$default_options      = $this->default_options;
			$db_default_options   = get_option( BLANK_PLUGIN_SLUG . '-default', array() );
			$result_array         = array_diff_key( $default_options, $db_default_options );
			$reverse_result_array = array_diff_key( $db_default_options, $default_options );

			if ( ! empty( $result_array ) || ! empty( $reverse_result_array ) ) {
				$this->save_options( BLANK_PLUGIN_SLUG . '-default' , $default_options );
				return $default_options;
			} else {
				return $db_default_options;
			}
		}

		/**
		 * Get icons set
		 *
		 * @return array
		 */
		private function get_icons_set() {
			ob_start();

			include BLANK_PLUGIN_DIR . 'assets/fonts/icons.json';

			$json = ob_get_clean();
			$result = array();
			$icons = json_decode( $json, true );

			foreach ( $icons['icons'] as $icon ) {
				$result[] = $icon['id'];
			}

			return $result;
		}
	}
}
