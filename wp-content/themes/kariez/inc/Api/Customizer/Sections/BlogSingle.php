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
class BlogSingle extends Customizer {
	protected $section_blog_single = 'rt_blog_single_section';

	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog_single,
			'title'       => __( 'Blog Single', 'kariez' ),
			'description' => __( 'Blog Single Section', 'kariez' ),
			'priority'    => 26
		] );

		Customize::add_controls( $this->section_blog_single, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_single_controls', [

			'rt_single_post_style' => [
				'type'    => 'select',
				'label'   => __( 'Post View Style', 'kariez' ),
				'default' => '1',
				'choices' => Fns::single_post_style()
			],

			'rt_single_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Single Meta', 'kariez' ),
				'description' => __( 'You can sort meta by drag and drop', 'kariez' ),
				'placeholder' => __( 'Choose Meta', 'kariez' ),
				'multiselect' => true,
				'default'     => 'author,date,category,comment',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_single_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'kariez' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_post_banner_single_title' => [
				'type'    => 'text',
				'label'   => __( 'Single Banner Title', 'kariez' ),
				'default' => __( 'Post Details', 'kariez' ),
			],

			'rt_single_visibility_heading' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'kariez' ),
			],

			'rt_single_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_single_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Above Meta Visibility', 'kariez' ),
			],
			'rt_single_tag_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Tag Visibility', 'kariez' ),
			],
			'rt_single_share_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Share Visibility', 'kariez' ),
			],
			'rt_single_profile_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Author Profile Visibility', 'kariez' ),
			],
			'rt_single_caption_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Caption Visibility', 'kariez' ),
			],
			'rt_single_navigation_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Navigation Visibility', 'kariez' ),
			],
			'rt_post_share' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Share Media', 'kariez' ),
				'description' => __( 'You can sort meta by drag and drop', 'kariez' ),
				'placeholder' => __( 'Choose Media', 'kariez' ),
				'multiselect' => true,
				'default'     => 'facebook,twitter,linkedin',
				'choices'     => Fns::post_share_list(),
				'condition' => [ 'rt_single_share_visibility' ]
			],

			'rt_post_single_related_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Single Related Option', 'kariez' ),
			],

			'rt_post_related' => [
				'type'    => 'switch',
				'label'   => __( 'Related Visibility', 'kariez' ),
				'default' => 0
			],

			'rt_post_related_title' => [
				'type'    => 'text',
				'label'   => __( 'Post Related Title', 'kariez' ),
				'default' => __( 'Related Post', 'kariez' ),
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_limit' => [
				'type'    => 'number',
				'label'   => __( 'Related Item Limit', 'kariez' ),
				'default' => 4,
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_query' => [
				'type'        => 'select',
				'label'       => __( 'Query Type', 'kariez' ),
				'description' => __( 'Post Query Type', 'kariez' ),
				'default'     => 'cat',
				'choices'     => [
					'cat' => esc_html__( 'Posts in the same Categories', 'kariez' ),
					'tag' => esc_html__( 'Posts in the same Tags', 'kariez' ),
					'author' => esc_html__( 'Posts by the same Author', 'kariez' ),
				],
				'condition' => [ 'rt_post_related' ]
			],

			'rt_post_related_sort' => [
				'type'        => 'select',
				'label'       => __( 'Sort Order', 'kariez' ),
				'description' => __( 'Display Post Order', 'kariez' ),
				'default'     => 'recent',
				'choices'     => [
					'recent' => esc_html__( 'Recent Posts', 'kariez' ),
					'rand' => esc_html__( 'Random Posts', 'kariez' ),
					'modified' => esc_html__( 'Last Modified Posts', 'kariez' ),
					'popular' => esc_html__( 'Most Commented posts', 'kariez' ),
					'views' => esc_html__( 'Most Viewed posts', 'kariez' ),
				],
				'condition' => [ 'rt_post_related' ]
			],

		] );
	}


}
