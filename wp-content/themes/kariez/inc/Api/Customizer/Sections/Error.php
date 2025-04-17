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
class Error extends Customizer {
	protected $section_labels = 'rt_error_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Error Page', 'kariez' ),
			'description' => __( 'Error section.', 'kariez' ),
			'priority'    => 39
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_labels_controls', [

			'rt_error_image' => [
				'type'         => 'image',
				'label'        => __( 'Error Image', 'kariez' ),
				'description'  => __( 'Upload error image for your site.', 'kariez' ),
				'button_label' => __( 'Error image', 'kariez' ),
			],

			'rt_error_heading' => [
				'type'        => 'text',
				'label'       => __( 'Error Heading', 'kariez' ),
				'default'     => __( 'Oops, something went wrong.', 'kariez' ),
			],

			'rt_error_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Text', 'kariez' ),
				'default'     => __( 'Sorry! This Page Is Not Available!', 'kariez' ),
			],

			'rt_error_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Error Button Text', 'kariez' ),
				'default'     => __( 'Back To Home Page', 'kariez' ),
			],

		] );
	}


}
