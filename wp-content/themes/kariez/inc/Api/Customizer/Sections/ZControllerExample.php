<?php
/**
 * Theme Customizer - Header
 *
 * @package kariez
 */

namespace RT\Kariez\Api\Customizer\Sections;

use RT\Kariez\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class ZControllerExample extends Customizer {

	protected $section_test = 'rt_test_test_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_test,
			'title'       => __( 'Test Controls', 'kariez' ),
			'description' => __( 'Customize the Test', 'kariez' ),
			'priority'    => 9999
		] );
		Customize::add_controls( $this->section_test, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_test_test_controls', [

			//Reset button
			'rt_reset_customize' => [
				'type'  => 'heading',
				'reset' => '1',
			],
			//Reset button

			'rt_test_heading1' => [
				'type'        => 'heading',
				'label'       => __( 'All controls', 'kariez' ),
				'description' => __( 'All controls are here', 'kariez' ),
			],

			'rt_test_switch' => [
				'type'  => 'switch',
				'label' => __( 'Choose switch', 'kariez' ),
			],

			'rt_test_text' => [
				'type'      => 'text',
				'label'     => __( 'Text Default', 'kariez' ),
				'default'   => __( 'Text Default', 'kariez' ),
				'transport' => '',
				'condition' => [ 'rt_test_switch' ]
			],


			'rt_test_switch2' => [
				'type'  => 'switch',
				'label' => __( 'Choose switch2', 'kariez' ),
			],
			'rt_test_url'     => [
				'type'      => 'url',
				'label'     => __( 'url', 'kariez' ),
				'default'   => __( 'url Default', 'kariez' ),
				'transport' => '',
				'condition' => [ 'rt_test_switch2', '!==', 1 ]
			],

			'rt_test_select'   => [
				'type'        => 'select',
				'label'       => __( 'Select a Val', 'kariez' ),
				'description' => __( 'Select Discription', 'kariez' ),
				'default'     => 'menu-left',
				'choices'     => [
					'menu-left'   => __( 'Left Alignment', 'kariez' ),
					'menu-center' => __( 'Center Alignment', 'kariez' ),
					'menu-right'  => __( 'Right Alignment', 'kariez' ),
				]
			],
			'rt_test_textarea' => [
				'type'      => 'textarea',
				'label'     => __( 'Textarea', 'kariez' ),
				'default'   => __( 'Textarea Default', 'kariez' ),
				'transport' => '',
			],

			'rt_test_select5' => [
				'type'        => 'select',
				'label'       => __( 'Select a Val2', 'kariez' ),
				'description' => __( 'Select Discription', 'kariez' ),
				'default'     => 'menu-center',
				'choices'     => [
					'menu-left'   => __( 'Left Alignment', 'kariez' ),
					'menu-center' => __( 'Center Alignment', 'kariez' ),
					'menu-right'  => __( 'Right Alignment', 'kariez' ),
				]
			],

			'rt_test_textarea2' => [
				'type'      => 'textarea',
				'label'     => __( 'Textarea2', 'kariez' ),
				'default'   => __( 'Textarea Default', 'kariez' ),
				'transport' => '',
			],


			'rt_test_checkbox' => [
				'type'  => 'checkbox',
				'label' => __( 'Choose checkbox', 'kariez' ),
			],

			'rt_test_textarea22' => [
				'type'      => 'textarea',
				'label'     => __( 'Checkbox Textarea2', 'kariez' ),
				'transport' => '',
				'condition' => [ 'rt_test_checkbox', '==', '1' ]
			],


			'rt_test_radio' => [
				'type'    => 'radio',
				'label'   => __( 'Choose radio', 'kariez' ),
				'choices' => [
					'menu-left'   => __( 'Left Alignment', 'kariez' ),
					'menu-center' => __( 'Center Alignment', 'kariez' ),
					'menu-right'  => __( 'Right Alignment', 'kariez' ),
				]
			],

			'rt_test_textarea222' => [
				'type'      => 'textarea',
				'label'     => __( 'rt_test_radio Textarea2 - menu-center', 'kariez' ),
				'transport' => '',
			],

			'rt_test_image_choose' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'kariez' ),
				'default' => '1',
				'choices' => $this->get_header_presets()
			],

			'rt_test_image' => [
				'type'         => 'image',
				'label'        => __( 'Choose Image', 'kariez' ),
				'button_label' => __( 'Logo', 'kariez' ),
			],

			'rt_test_image_attr' => [
				'type'      => 'bg_attribute',
				'condition' => [ 'rt_banner' ],
				'default'   => json_encode(
					[
						'position'   => 'center center',
						'attachment' => 'scroll',
						'repeat'     => 'no-repeat',
						'size'       => 'auto',
					]
				)
			],

			'rt_test_number' => [
				'type'        => 'number',
				'label'       => __( 'Select a Number', 'kariez' ),
				'description' => __( 'Select Number', 'kariez' ),
				'default'     => '5',
			],

			'rt_test_pages' => [
				'type'  => 'pages',
				'label' => __( 'Choose page', 'kariez' ),
			],

			'rt_test_color'      => [
				'type'  => 'color',
				'label' => __( 'Choose color', 'kariez' ),
			],
			'rt_test_alfa_color' => [
				'type'  => 'alfa_color',
				'label' => __( 'Choose alfa_color', 'kariez' ),
			],
			'rt_test_datetime'   => [
				'type'  => 'datetime',
				'label' => __( 'Choose datetime', 'kariez' ),
			],

			'rt_test_select2' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Meta', 'kariez' ),
				'placeholder' => __( 'Choose Meta', 'kariez' ),
				'multiselect' => true,
				'choices'     => [
					'author'   => __( 'Author', 'kariez' ),
					'date'     => __( 'Date', 'kariez' ),
					'category' => __( 'Category', 'kariez' ),
					'tag'      => __( 'Tag', 'kariez' ),
					'comment'  => __( 'Comment', 'kariez' ),
				],
			],

			'rt_test_repeater' => [
				'type'  => 'repeater',
				'label' => __( 'Choose repeater', 'kariez' ),
			],

			'rt_test_blog_meta_order1' => [
				'type'    => 'repeater',
				'label'   => __( 'Meta Order', 'kariez' ),
				'default' => 'one, two, three, four',
				'use_as'  => 'sort',
			],

			'rt_test_blog_meta_order2' => [
				'type'    => 'repeater',
				'label'   => __( 'Meta Order', 'kariez' ),
				'default' => 'one, two, three, four',
			],

			'rt_test_typography2' => [
				'type'    => 'typography',
				'label'   => __( 'Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => 'Open Sans',
						'regularweight' => 'normal',
						'size'          => '16',
						'lineheight'    => '26',
					]
				)
			],

			'rt_test_typography3' => [
				'type'    => 'typography',
				'label'   => __( 'Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => 'Open Sans',
						'regularweight' => 'normal',
						'size'          => '16',
						'lineheight'    => '26',
					]
				)
			],
		] );
	}

	/**
	 * Get Header Presets
	 * @return array[]
	 */
	public function get_header_presets() {
		if ( ! defined( 'RT_FRAMEWORK_DIR_URL' ) ) {
			return [];
		}

		return [
			'1' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 1', 'kariez' ),
			],
			'2' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 2', 'kariez' ),
			],
			'3' => [
				'image' => RT_FRAMEWORK_DIR_URL . '/assets/images/header-1.png',
				'name'  => __( 'Style 3', 'kariez' ),
			],
		];
	}

}
