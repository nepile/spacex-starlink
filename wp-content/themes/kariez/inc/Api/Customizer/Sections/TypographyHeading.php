<?php
/**
 * Theme Customizer - Heading Typography
 *
 * @package kariez
 */

namespace RT\Kariez\Api\Customizer\Sections;

use RT\Kariez\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class TypographyHeading extends Customizer {

	protected $section_id = 'rt_heading_typo_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_id,
			'title'       => __( 'Heading Typography', 'kariez' ),
			'description' => __( 'Heading Typography Section', 'kariez' ),
			'panel'       => 'rt_typography_panel',
			'priority'    => 2
		] );

		Customize::add_controls( $this->section_id, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_heading_typo_section', [

			'rt_all_heading_typo' => [
				'type'    => 'typography',
				'label'   => __( 'All Headings Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => 'Outfit',
						'regularweight' => '700',
						'size'          => '40',
						'lineheight'    => '50',
					]
				)
			],

			'rt_heading_h1_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H1 Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h2_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H2 Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h3_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H3 Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h4_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H4 Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h5_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H5 Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

			'rt_heading_h6_typo' => [
				'type'    => 'typography',
				'label'   => __( 'H6 Typography', 'kariez' ),
				'default' => json_encode(
					[
						'font'          => '',
						'regularweight' => '',
						'size'          => '',
						'lineheight'    => '',
					]
				)
			],

		] );

	}

}
