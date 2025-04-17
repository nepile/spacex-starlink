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
class Contact extends Customizer {
	protected $section_contact = 'rt_contact_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_contact,
			'panel'       => 'rt_contact_social_panel',
			'title'       => __( 'Contact Information', 'kariez' ),
			'description' => __( 'Contact Address Section', 'kariez' ),
			'priority'    => 1
		] );
		Customize::add_controls( $this->section_contact, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_contact_controls', [

			'rt_phone' => [
				'type'  => 'text',
				'label' => __( 'Phone', 'kariez' ),
			],

			'rt_email' => [
				'type'  => 'text',
				'label' => __( 'Email', 'kariez' ),
			],

			'rt_open_time' => [
				'type'  => 'text',
				'label' => __( 'Open Time', 'kariez' ),
			],

			'rt_contact_address' => [
				'type'        => 'textarea',
				'label'       => __( 'Address', 'kariez' ),
				'description' => __( 'Enter company address here.', 'kariez' ),
			],

		] );
	}
}
