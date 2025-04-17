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
class General extends Customizer {
	protected $section_general = 'rt_general_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_general,
			'title'       => __( 'General', 'kariez' ),
			'description' => __( 'General Section', 'kariez' ),
			'priority'    => 20
		] );
		Customize::add_controls( $this->section_general, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_general_controls', [

			'rt_svg_enable' => [
				'type'  => 'switch',
				'label' => __( 'Enable SVG Upload', 'kariez' ),
				'default' => 1,
			],

			'rt_preloader' => [
				'type'  => 'switch',
				'label' => __( 'Preloader', 'kariez' ),
			],

			'rt_preloader_logo' => [
				'type'         => 'image',
				'label'        => __( 'Preloader Logo', 'kariez' ),
				'description'  => __( 'Upload preloader logo for your site.', 'kariez' ),
				'button_label' => __( 'Logo', 'kariez' ),
				'condition' => [ 'rt_preloader' ]
			],

			'preloader_bg_color' => [
				'type'    => 'color',
				'label'   => __( 'Preloader Background Color', 'kariez' ),
				'condition' => [ 'rt_preloader' ]
			],

			'rt_back_to_top' => [
				'type'  => 'switch',
				'label' => __( 'Back to Top', 'kariez' ),
			],

			'rt_remove_admin_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Remove Admin Bar', 'kariez' ),
				'description' => __( 'This option not work for administrator role.', 'kariez' ),
			],

			'container_width' => [
				'type'    => 'select',
				'label'   => __( 'Container Width', 'kariez' ),
				'default' => '1320',
				'choices' => [
					'1554' => esc_html__( '1554px', 'kariez' ),
					'1364' => esc_html__( '1364px', 'kariez' ),
					'1320' => esc_html__( '1320px', 'kariez' ),
					'1200' => esc_html__( '1200px', 'kariez' ),
					'1140' => esc_html__( '1140px', 'kariez' ),
				]
			],

			'rt_blend' => [
				'type'        => 'switch',
				'label'       => __( 'Image Blend', 'kariez' ),
				'default' => 0,
				'description' => __( 'This option for use all image blend mode.', 'kariez' ),
			],

		] );

	}

}
