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
class Labels extends Customizer {
	protected $section_labels = 'rt_labels_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_labels,
			'title'       => __( 'Modify Static Text', 'kariez' ),
			'description' => __( 'You can change all static text of the theme.', 'kariez' ),
			'priority'    => 999
		] );
		Customize::add_controls( $this->section_labels, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {

		return apply_filters( 'rt_labels_controls', [

			'rt_header_labels' => [
				'type'  => 'heading',
				'label' => __( 'Header Labels', 'kariez' ),
			],

			'rt_get_menu_label' => [
				'type'        => 'text',
				'label'       => __( 'Menu Text', 'kariez' ),
				'description' => __( 'Content: Menu Button', 'kariez' ),
			],

			'rt_get_login_label' => [
				'type'        => 'text',
				'label'       => __( 'Log In', 'kariez' ),
				'default'     => __( 'Log In', 'kariez' ),
				'description' => __( 'Content: SignIn Button', 'kariez' ),
			],

			'rt_phone_lebel' => [
				'type'        => 'text',
				'label'       => __( 'Have Any Questions?', 'kariez' ),
				'default'     => __( 'Have Any Questions?', 'kariez' ),
				'description' => __( 'Content: Have Any Questions?', 'kariez' ),
			],

			'rt_phone_number' => [
				'type'        => 'text',
				'label'       => __( 'Phone Number', 'kariez' ),
				'default'     => __( '+456 775 4566', 'kariez' ),
				'description' => __( 'Content: +456 775 4566', 'kariez' ),
			],


			'rt_get_started_label' => [
				'type'        => 'text',
				'label'       => __( 'Get Started', 'kariez' ),
				'default'     => __( 'Get Started', 'kariez' ),
				'description' => __( 'Content: Get Started', 'kariez' ),
				'condition' => [ 'rt_get_started_button' ],
			],

			'rt_contact_info_label' => [
				'type'        => 'text',
				'label'       => __( 'Contact Info', 'kariez' ),
				'default'     => __( 'Contact Info', 'kariez' ),
				'description' => __( 'Content: Contact Info', 'kariez' ),
			],

			'rt_follow_us_label' => [
				'type'        => 'text',
				'label'       => __( 'Follow Us On', 'kariez' ),
				'default'     => __( 'Follow Us On', 'kariez' ),
				'description' => __( 'Content: Follow Us On', 'kariez' ),
			],

			'rt_about_label' => [
				'type'        => 'text',
				'label'       => __( 'About Us', 'kariez' ),
				'description' => __( 'Content: About Us', 'kariez' ),
			],

			'rt_about_text' => [
				'type'        => 'textarea',
				'label'       => __( 'About Text', 'kariez' ),
				'description' => __( 'Enter about text here.', 'kariez' ),
			],

			'rt_footer_labels' => [
				'type'  => 'heading',
				'label' => __( 'Footer Labels', 'kariez' ),
			],

			'rt_ready_label' => [
				'type'        => 'text',
				'label'       => __( 'Are You Ready', 'kariez' ),
				'default'     => __( 'ARE YOU READY TO GET STARTED?', 'kariez' ),
				'description' => __( 'Content: Footer Are You Ready', 'kariez' ),
			],

			'rt_contact_button_text' => [
				'type'        => 'text',
				'label'       => __( 'Contact Us', 'kariez' ),
				'default'     => __( 'Contact Us', 'kariez' ),
				'description' => __( 'Content: Footer contact button', 'kariez' ),
			],

			'rt_blog_labels' => [
				'type'  => 'heading',
				'label' => __( 'Blog Labels', 'kariez' ),
			],
			'rt_author_prefix' => [
				'type'        => 'text',
				'label'       => __( 'By', 'kariez' ),
				'default'     => 'by',
				'description' => __( 'Content: Meta Author Prefix', 'kariez' ),
			],
			'rt_tags'         => [
				'type'        => 'text',
				'label'       => __( 'Tags:', 'kariez' ),
				'default'     => __( 'Tags:', 'kariez' ),
				'description' => __( 'Content: Single blog footer tags label', 'kariez' ),
			],
			'rt_social' => [
				'type'        => 'text',
				'label'       => __( 'Socials:', 'kariez' ),
				'default'     => __( 'Socials:', 'kariez' ),
				'description' => __( 'Content: Single blog footer Socials label', 'kariez' ),
			],
			'rt_blog_read_more' => [
				'type'        => 'text',
				'label'       => __( 'Blog Read More:', 'kariez' ),
				'default'     => __( 'Continue Reading', 'kariez' ),
				'description' => __( 'Content: Single blog footer read more text', 'kariez' ),
			],

		] );
	}


}
