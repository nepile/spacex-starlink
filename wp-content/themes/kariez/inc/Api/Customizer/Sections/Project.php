<?php
/**
 * Theme Customizer - Project
 *
 * @package kariez
 */

namespace RT\Kariez\Api\Customizer\Sections;

use RT\Kariez\Api\Customizer;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Project extends Customizer {

	protected $section_project = 'rt_project_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_project,
			'title'       => __( 'Project Option', 'kariez' ),
			'description' => __( 'Project Section', 'kariez' ),
			'priority'    => 37
		] );

		Customize::add_controls( $this->section_project, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_project_controls', [

			'rt_project_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Archive Option', 'kariez' ),
			],

			'rt_project_style' => [
				'type'        => 'select',
				'label'       => __( 'Project Layout', 'kariez' ),
				'description' => __( 'This option works only for project layout', 'kariez' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Project 01', 'kariez' ),
					'2'    => __( 'Project 02', 'kariez' ),
				]
			],

			'rt_project_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Archive Item Limit', 'kariez' ),
				'default' => '6',
			],


			'rt_project_filter' => [
				'type'        => 'select',
				'label'       => __( 'Image Filter', 'kariez' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default', 'kariez' ),
					'grayscale'    => __( 'Grayscale', 'kariez' ),
				]
			],

			'rt_project_ar_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category Visibility', 'kariez' ),
				'default' => 1
			],


			'rt_project_ar_button' => [
				'type'    => 'switch',
				'label'   => __( 'Button Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_project_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'kariez' ),
				'default' => 0
			],


			'rt_project_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'kariez' ),
				'default' => '12',
				'condition' => [ 'rt_project_ar_excerpt' ]
			],

			'rt_project_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'kariez' ),
				'default' => __( 'Our Projects', 'kariez' ),
			],

			'rt_project_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'kariez' ),
				'default' => 'project',
			],

			'rt_project_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'kariez' ),
				'default' => 'project-category',
			],

			'rt_project_single_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Single Option', 'kariez' ),
			],

			'rt_project_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Single Banner Title', 'kariez' ),
				'default' => __( 'Project Details', 'kariez' ),
			],

			'rt_project_title' => [
				'type'    => 'switch',
				'label'   => __( 'Info Title Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_project_text' => [
				'type'    => 'switch',
				'label'   => __( 'Text Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_project_cat' => [
				'type'    => 'switch',
				'label'   => __( 'Category Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_project_client' => [
				'type'    => 'switch',
				'label'   => __( 'Client Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_project_start' => [
				'type'    => 'switch',
				'label'   => __( 'Start Time Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_project_end' => [
				'type'    => 'switch',
				'label'   => __( 'End Time Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_project_weblink' => [
				'type'    => 'switch',
				'label'   => __( 'Weblink Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_project_rating' => [
				'type'    => 'switch',
				'label'   => __( 'Rating Visibility', 'kariez' ),
				'default' => 0
			],

			'rt_project_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Project Single Related Option', 'kariez' ),
			],

			'rt_project_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'kariez' ),
				'default' => 0
			],

			'rt_project_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Project Related Title', 'kariez' ),
				'default' => __( 'Related Projects', 'kariez' ),
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'kariez' ),
				'default' => 3,
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_title_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Title Limit', 'kariez' ),
				'default' => 5,
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'kariez' ),
				'description' => __( 'Project Query Type', 'kariez' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'kariez' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'kariez' ),
					'author' => esc_html__( 'Posts by the same Author', 'kariez' ),
				],
				'condition' => [ 'rt_project_related' ]
			],

			'rt_project_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'kariez' ),
				'description' => __( 'Display Project Order', 'kariez' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'kariez' ),
					'rand' => esc_html__( 'Random Posts', 'kariez' ),
					'modified' => esc_html__( 'Last Modified Posts', 'kariez' ),
					'popular' => esc_html__( 'Most Commented posts', 'kariez' ),
					'views' => esc_html__( 'Most Viewed posts', 'kariez' ),
				],
				'condition' => [ 'rt_project_related' ]
			],

		] );
	}


}
