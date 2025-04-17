<?php
/**
 * Theme Customizer - Header
 *
 * @package kariez
 */

namespace RT\Kariez\Api\Customizer\Sections;

use RT\Kariez\Api\Customizer;
use RT\Kariez\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Header extends Customizer {
	protected $section_header = 'rt_header_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_header,
			'panel'       => 'rt_header_panel',
			'title'       => __( 'Header Menu', 'kariez' ),
			'description' => __( 'Header Section', 'kariez' ),
			'priority'    => 2,
			'edit-point'  => ''
		] );
		Customize::add_controls( $this->section_header, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_header_controls', [

			'rt_header_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Choose Layout', 'kariez' ),
				'default'   => '1',
				'edit-link' => '.site-branding',
				'choices'   => Fns::image_placeholder( 'header', 1 )
			],

			'rt_menu_alignment' => [
				'type'    => 'select',
				'label'   => __( 'Menu Alignment', 'kariez' ),
				'default' => 'justify-content-center',
				'choices' => [
					''                       => __( 'Menu Alignment', 'kariez' ),
					'justify-content-start'  => __( 'Left Alignment', 'kariez' ),
					'justify-content-center' => __( 'Center Alignment', 'kariez' ),
					'justify-content-end'    => __( 'Right Alignment', 'kariez' ),
				]
			],

			'rt_header_width' => [
				'type'    => 'select',
				'label'   => __( 'Header Width', 'kariez' ),
				'default' => 'box',
				'choices' => [
					'box'       => __( 'Box Width', 'kariez' ),
					'full' => __( 'Full Width', 'kariez' ),
				]
			],

			'rt_header_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Header Max Width (PX)', 'kariez' ),
				'description' => __( 'Enter a number greater than 1440. Remove value for 100%', 'kariez' ),
				'condition'   => [ 'rt_header_width', '==', 'full' ]
			],

			'rt_sticy_header' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Header', 'kariez' ),
				'description' => __( 'Show header at the top when scrolling down', 'kariez' ),
			],

			'rt_tr_header' => [
				'type'  => 'switch',
				'label' => __( 'Transparent Header', 'kariez' ),
			],

			'rt_tr_header_color' => [
				'type'    => 'select',
				'label'   => __( 'Transparent color', 'kariez' ),
				'default' => 'tr-header-dark',
				'choices' => [
					'tr-header-light'   => __( 'Light Color', 'kariez' ),
					'tr-header-dark'    => __( 'Dark Color', 'kariez' ),
				],
				'condition' => [ 'rt_tr_header' ]
			],

			'rt_tr_header_shadow' => [
				'type'  => 'switch',
				'label' => __( 'Header Dark Shadow', 'kariez' ),
				'condition' => [ 'rt_tr_header' ]
			],

			'rt_header_border' => [
				'type'    => 'switch',
				'label'   => __( 'Header Border', 'kariez' ),
				'default' => 0
			],
			'rt_header_sep1'   => [
				'type' => 'separator',
				'edit-link' => '.menu-icon-wrapper',
			],

			'rt_header_login_link' => [
				'type'    => 'switch',
				'label'   => __( 'User Login ?', 'kariez' ),
				'default' => 0,
			],

			'rt_header_search' => [
				'type'    => 'switch',
				'label'   => __( 'Search Icon ?', 'kariez' ),
				'default' => 1,
			],

			'rt_header_bar' => [
				'type'        => 'switch',
				'label'       => __( 'Hamburger Menu', 'kariez' ),
				'description' => __( 'It will be hide only for desktop.', 'kariez' ),
				'default'     => 0,
			],

			'rt_header_separator' => [
				'type'    => 'switch',
				'label'   => __( 'Icon Separator', 'kariez' ),
				'default' => 0,
			],

			'rt_offcanvas_social' => [
				'type'    => 'switch',
				'label'   => __( 'Offcanvas Social', 'kariez' ),
				'default' => 0,
			],
			'rt_header_phone' => [
				'type'    => 'switch',
				'label'   => __( 'Phone ?', 'kariez' ),
				'default' => 0
			],
			'rt_header_sep2' => [
				'type' => 'separator',
			],

			'rt_get_started_button' => [
				'type'    => 'switch',
				'label'   => __( 'Get Started Button ?', 'kariez' ),
				'default' => 0
			],



			'rt_get_started_button_url' => [
				'type'    => 'text',
				'label'   => __( 'Button Link', 'kariez' ),
				'condition' => [ 'rt_get_started_button' ],
			],


		] );

	}
}
