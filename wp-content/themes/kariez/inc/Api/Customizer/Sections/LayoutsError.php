<?php
/**
 * Theme Customizer - Header
 *
 * @package kariez
 */

namespace RT\Kariez\Api\Customizer\Sections;

use RT\Kariez\Api\Customizer;
use RTFramework\Customize;
use RT\Kariez\Traits\LayoutControlsTraits;

/**
 * Customizer class
 */
class LayoutsError extends Customizer {

	use LayoutControlsTraits;

	protected $section_error_layout = 'rt_error_layout_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'    => $this->section_error_layout,
			'title' => __( 'Error Layout', 'kariez' ),
			'panel' => 'rt_layouts_panel',
		] );

		Customize::add_controls( $this->section_error_layout, $this->get_controls() );
	}

	public function get_controls() {
		$options_val = $this->get_layout_controls( 'error' );
		unset( $options_val['error_layout'] );
		unset( $options_val['error__header_style'] );

		return $options_val;
	}

}
