<?php
/**
 * Theme Customizer - Service
 *
 * @package kariez
 */

namespace RT\Kariez\Api\Customizer\Sections;

use Elementor\Controls_Manager;
use RT\Kariez\Api\Customizer;
use RT\Kariez\Helpers\Fns;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Service extends Customizer {

	protected $section_service = 'rt_service_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_service,
			'title'       => __( 'Service Option', 'kariez' ),
			'description' => __( 'Service Section', 'kariez' ),
			'priority'    => 36
		] );

		Customize::add_controls( $this->section_service, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_service_controls', [

			'rt_service_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Service Archive Option', 'kariez' ),
			],

			'rt_service_style' => [
				'type'        => 'select',
				'label'       => __( 'Service Layout', 'kariez' ),
				'description' => __( 'This service 02 layout only icon show', 'kariez' ),
				'default'     => 'default',
			'choices'     => [
					'default' => __( 'Service 01', 'kariez' ),
					'2'    => __( 'Service 02', 'kariez' ),
				]
			],

			'rt_service_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Service Archive Item Limit', 'kariez' ),
				'default' => '8',
			],


			'rt_service_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'kariez' ),
				'default' => 0
			],

			'rt_service_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'kariez' ),
				'default' => '15',
				'condition' => [ 'rt_service_ar_excerpt' ]
			],

			'rt_service_read_more' => [
				'type'    => 'switch',
				'label'   => __( 'Read More Visibility', 'kariez' ),
				'default' => 1
			],


			'rt_service_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'kariez' ),
				'default' => __( 'Our Services', 'kariez' ),
			],

			'rt_service_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'kariez' ),
				'default' => 'service',
			],

			'rt_service_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'kariez' ),
				'default' => 'service-category',
			],

			'rt_service_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Service Single Related Option', 'kariez' ),
			],

			'rt_service_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Single Banner Title', 'kariez' ),
				'default' => __( 'Service Details', 'kariez' ),
			],

			'rt_service_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'kariez' ),
				'default' => 0
			],

			'rt_service_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Service Related Title', 'kariez' ),
				'default' => __( 'Related Service', 'kariez' ),
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'kariez' ),
				'default' => 3,
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'kariez' ),
				'description' => __( 'Service Query Type', 'kariez' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'kariez' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'kariez' ),
					'author' => esc_html__( 'Posts by the same Author', 'kariez' ),
				],
				'condition' => [ 'rt_service_related' ]
			],

			'rt_service_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'kariez' ),
				'description' => __( 'Display Service Order', 'kariez' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'kariez' ),
					'rand' => esc_html__( 'Random Posts', 'kariez' ),
					'modified' => esc_html__( 'Last Modified Posts', 'kariez' ),
					'popular' => esc_html__( 'Most Commented posts', 'kariez' ),
					'views' => esc_html__( 'Most Viewed posts', 'kariez' ),
				],
				'condition' => [ 'rt_service_related' ]
			],

		] );
	}


}
