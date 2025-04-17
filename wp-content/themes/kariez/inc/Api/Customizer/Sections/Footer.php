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
class Footer extends Customizer {
	protected $section_footer = 'rt_footer_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_footer,
			'title'       => __( 'Footer', 'kariez' ),
			'description' => __( 'Footer Section', 'kariez' ),
			'priority'    => 38
		] );

		Customize::add_controls( $this->section_footer, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_footer_controls', [

			'rt_footer_display' => [
				'type'        => 'switch',
				'label'       => __( 'Footer Display', 'kariez' ),
				'description' => __( 'Show footer display', 'kariez' ),
				'default' => 1,
			],

			'rt_footer_style' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'kariez' ),
				'default' => '1',
				'choices' => Fns::image_placeholder( 'footer', 1 )
			],

			'rt_footer_width' => [
				'type'    => 'select',
				'label'   => __( 'Footer Width', 'kariez' ),
				'default' => '',
				'choices' => [
					''       => __( 'Box Width', 'kariez' ),
					'-fluid' => __( 'Full Width', 'kariez' ),
				]
			],

			'rt_footer_max_width' => [
				'type'        => 'number',
				'label'       => __( 'Footer Max Width (PX)', 'kariez' ),
				'description' => __( 'Enter a number greater than 992.', 'kariez' ),
				'condition'   => [ 'rt_footer_width', '==', '-fluid' ]
			],

			'rt_sticky_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Sticky Footer', 'kariez' ),
				'description' => __( 'Show footer at the top when scrolling down', 'kariez' ),
			],

			'rt_social_footer' => [
				'type'        => 'switch',
				'label'       => __( 'Social Icon', 'kariez' ),
				'description' => __( 'Show footer at the social icon, This options available for only Footer layout.', 'kariez' ),
			],

			'rt_footer_copyright' => [
				'type'        => 'tinymce',
				'label'       => __( 'Footer Copyright Text', 'kariez' ),
				'default'     => __( 'Copyright© [y] RadiusTheme, All Rights Reserved.', 'kariez' ),
				'description' => __( 'Add [y] flag anywhere for dynamic year.', 'kariez' ),
			],

		] );

	}


}
