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
class ColorFooter extends Customizer {
	protected $section_footer_color = 'rt_footer_color_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_footer_color,
			'panel'       => 'rt_color_panel',
			'title'       => __( 'Footer Colors', 'kariez' ),
			'description' => __( 'Footer Color Section', 'kariez' ),
			'priority'    => 8
		] );

		Customize::add_controls( $this->section_footer_color, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_footer_color_controls', [
			'rt_footer_color1'           => [
				'type'  => 'heading',
				'label' => __( 'Main Footer', 'kariez' ),
			],
			'rt_footer_bg'               => [
				'type'  => 'color',
				'label' => __( 'Footer Background', 'kariez' ),
			],
			'rt_footer_text_color'             => [
				'type'  => 'color',
				'label' => __( 'Footer Text', 'kariez' ),
			],
			'rt_footer_link_color'             => [
				'type'  => 'color',
				'label' => __( 'Footer Link', 'kariez' ),
			],
			'rt_footer_link_hover_color'       => [
				'type'  => 'color',
				'label' => __( 'Footer Link - Hover', 'kariez' ),
			],
			'rt_footer_widget_title_color'     => [
				'type'  => 'color',
				'label' => __( 'Widget Title', 'kariez' ),
			],
			'rt_footer_input_border_color'     => [
				'type'  => 'color',
				'label' => __( 'Input/List/Table Border Color', 'kariez' ),
			],
			'rt_footer_copyright_color1' => [
				'type'  => 'heading',
				'label' => __( 'Copyright Area', 'kariez' ),
			],
			'rt_copyright_bg'            => [
				'type'  => 'color',
				'label' => __( 'Copyright Background', 'kariez' ),
			],
			'rt_copyright_text_color'          => [
				'type'  => 'color',
				'label' => __( 'Copyright Text', 'kariez' ),
			],
			'rt_copyright_link_color'          => [
				'type'  => 'color',
				'label' => __( 'Copyright Link', 'kariez' ),
			],
			'rt_copyright_link_hover_color'    => [
				'type'  => 'color',
				'label' => __( 'Copyright Link - Hover', 'kariez' ),
			],
		] );


	}

}
