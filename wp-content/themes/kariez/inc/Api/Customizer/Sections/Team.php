<?php
/**
 * Theme Customizer - Team
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
class Team extends Customizer {

	protected $section_team = 'rt_team_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_team,
			'title'       => __( 'Team Option', 'kariez' ),
			'description' => __( 'Team Section', 'kariez' ),
			'priority'    => 35
		] );

		Customize::add_controls( $this->section_team, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_team_controls', [

			'rt_team_archive_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Archive Option', 'kariez' ),
			],

			'rt_team_style' => [
				'type'        => 'select',
				'label'       => __( 'Team Layout', 'kariez' ),
				'description' => __( 'This option works only for team layout', 'kariez' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Team 01', 'kariez' ),
					'2'    => __( 'Team 02', 'kariez' ),
					'3'    => __( 'Team 03', 'kariez' ),
				]
			],

			'rt_team_item_number' => [
				'type'    => 'number',
				'label'   => __( 'Team Archive Item Limit', 'kariez' ),
				'default' => '8',
			],

			'rt_team_ar_designation' => [
				'type'    => 'switch',
				'label'   => __( 'Designation Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_team_ar_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_team_ar_excerpt' => [
				'type'    => 'switch',
				'label'   => __( 'Excerpt Visibility', 'kariez' ),
				'default' => 0
			],

			'rt_team_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'kariez' ),
				'default' => '12',
				'condition' => [ 'rt_team_ar_excerpt' ]
			],

			'rt_team_banner_archive_title' => [
				'type'    => 'text',
				'label'   => __( 'Archive Banner Title', 'kariez' ),
				'default' => __( 'Our Teams', 'kariez' ),
			],

			'rt_team_slug' => [
				'type'    => 'text',
				'label'   => __( 'Archive Slug', 'kariez' ),
				'default' => __( 'team', 'kariez' ),
			],

			'rt_team_cat_slug' => [
				'type'    => 'text',
				'label'   => __( 'Category Slug', 'kariez' ),
				'default' => 'team-category',
			],

			'rt_team_single_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Single Option', 'kariez' ),
			],

			'rt_team_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Single Banner Title', 'kariez' ),
				'default' => __( 'Team Details', 'kariez' ),
			],

			'rt_team_single_author' => [
				'type'        => 'select',
				'label'       => __( 'Team Author Layout', 'kariez' ),
				'default'     => 'team-thumb-square',
				'choices'     => [
					'team-thumb-square'    => __( 'Thumb Square', 'kariez' ),
					'team-thumb-round'    => __( 'Thumb Round', 'kariez' ),
				]
			],

			'rt_team_single_author_order' => [
				'type'        => 'select',
				'label'       => __( 'Team Author Order', 'kariez' ),
				'default'     => 'thumb-left',
				'choices'     => [
					'thumb-left'    => __( 'Thumb Left', 'kariez' ),
					'thumb-right'    => __( 'Thumb Right', 'kariez' ),
				]
			],

			'rt_team_single_info' => [
				'type'    => 'switch',
				'label'   => __( 'Info Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_team_single_social' => [
				'type'    => 'switch',
				'label'   => __( 'Social Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_team_single_skill' => [
				'type'    => 'switch',
				'label'   => __( 'Skill Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_team_single_qualification' => [
				'type'    => 'switch',
				'label'   => __( 'Qualification List', 'kariez' ),
				'default' => 1
			],


			'rt_team_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Team Single Related Option', 'kariez' ),
			],

			'rt_team_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'kariez' ),
				'default' => 0
			],

			'rt_team_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Team Related Title', 'kariez' ),
				'default' => __( 'Related Team', 'kariez' ),
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'kariez' ),
				'default' => 4,
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'kariez' ),
				'description' => __( 'Team Query Type', 'kariez' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'kariez' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'kariez' ),
					'author' => esc_html__( 'Posts by the same Author', 'kariez' ),
				],
				'condition' => [ 'rt_team_related' ]
			],

			'rt_team_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'kariez' ),
				'description' => __( 'Display Team Order', 'kariez' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'kariez' ),
					'rand' => esc_html__( 'Random Posts', 'kariez' ),
					'modified' => esc_html__( 'Last Modified Posts', 'kariez' ),
					'popular' => esc_html__( 'Most Commented posts', 'kariez' ),
					'views' => esc_html__( 'Most Viewed posts', 'kariez' ),
				],
				'condition' => [ 'rt_team_related' ]
			],

		] );
	}


}
