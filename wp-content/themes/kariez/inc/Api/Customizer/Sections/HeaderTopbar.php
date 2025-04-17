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
class HeaderTopbar extends Customizer {
	protected $section_topbar = 'rt_top_bar_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_topbar,
			'panel'       => 'rt_header_panel',
			'title'       => __( 'Header Topbar', 'kariez' ),
			'description' => __( 'Top Bar Section', 'kariez' ),
			'priority'    => 1
		] );

		Customize::add_controls( $this->section_topbar, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_top_bar_controls', [

			'rt_top_bar' => [
				'type'      => 'switch',
				'label'     => __( 'Topbar Visibility', 'kariez' ),
				'default'   => 0,
				'edit-link' => '.topbar-row',
			],
			'rt_topbar_style' => [
				'type'      => 'image_select',
				'label'     => __( 'Topbar Style', 'kariez' ),
				'default'   => '1',
				'choices'   => Fns::image_placeholder( 'topbar', 1 ),
				'condition' => [ 'rt_top_bar' ]
			],
			'rt_topbar_address' => [
				'type'    => 'switch',
				'label'   => __( 'Topbar Address ?', 'kariez' ),
				'default' => 1,
				'condition' => [ 'rt_top_bar' ]
			],
			'rt_topbar_phone' => [
				'type'    => 'switch',
				'label'   => __( 'Topbar Phone ?', 'kariez' ),
				'default' => 1,
				'condition' => [ 'rt_top_bar' ]
			],
			'rt_topbar_email' => [
				'type'    => 'switch',
				'label'   => __( 'Topbar Email ?', 'kariez' ),
				'default' => 1,
				'condition' => [ 'rt_top_bar' ]
			],
			'rt_topbar_open_time' => [
				'type'    => 'switch',
				'label'   => __( 'Topbar Open Time ?', 'kariez' ),
				'default' => 1,
				'condition' => [ 'rt_top_bar' ]
			],
			'rt_topbar_social' => [
				'type'    => 'switch',
				'label'   => __( 'Topbar Social ?', 'kariez' ),
				'default' => 1,
				'condition' => [ 'rt_top_bar' ]
			],

		] );

	}

}
