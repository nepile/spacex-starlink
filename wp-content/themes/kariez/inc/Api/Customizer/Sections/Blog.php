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
class Blog extends Customizer {

	protected $section_blog = 'rt_blog_section';


	/**
	 * Register controls
	 * @return void
	 */
	public function register() {
		Customize::add_section( [
			'id'          => $this->section_blog,
			'title'       => __( 'Blog Archive', 'kariez' ),
			'description' => __( 'Blog Section', 'kariez' ),
			'priority'    => 25
		] );

		Customize::add_controls( $this->section_blog, $this->get_controls() );
	}

	/**
	 * Get controls
	 * @return array
	 */
	public function get_controls() {
		return apply_filters( 'rt_blog_controls', [

			'rt_blog_style' => [
				'type'        => 'select',
				'label'       => __( 'Blog Style', 'kariez' ),
				'description' => __( 'This option works only for blog layout', 'kariez' ),
				'default'     => 'default',
				'choices'     => [
					'default' => __( 'Default From Theme', 'kariez' ),
					'grid-2'    => __( 'Grid 2', 'kariez' ),
					'grid-3'    => __( 'Grid 3', 'kariez' ),
					'list'    => __( 'List', 'kariez' ),
					'list-2'    => __( 'List 2', 'kariez' ),
				]
			],

			'rt_blog_column' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column', 'kariez' ),
				'description' => __( 'This option works only for large device', 'kariez' ),
				'default'     => 'default',
				'choices'     => [
					'default'   => __( 'Default From Theme', 'kariez' ),
					'col-lg-12' => __( '1 Column', 'kariez' ),
					'col-lg-6'  => __( '2 Column', 'kariez' ),
					'col-lg-4'  => __( '3 Column', 'kariez' ),
					'col-lg-3'  => __( '4 Column', 'kariez' ),
				]
			],

			'rt_blog_column_gap' => [
				'type'        => 'select',
				'label'       => __( 'Grid Column Gap', 'kariez' ),
				'description' => __( 'This option works only for blog grid gap', 'kariez' ),
				'default'     => 'g-4',
				'choices'     => [
					'g-1'  => __( 'Gap 1', 'kariez' ),
					'g-2'  => __( 'Gap 2', 'kariez' ),
					'g-3'  => __( 'Gap 3', 'kariez' ),
					'g-4'  => __( 'Gap 4', 'kariez' ),
					'g-5'  => __( 'Gap 5', 'kariez' ),
				]
			],

			'rt_excerpt_limit' => [
				'type'    => 'number',
				'label'   => __( 'Content Limit', 'kariez' ),
				'default' => '25',
			],

			'rt_blog_btn_style' => [
				'type'        => 'select',
				'label'       => __( 'Button Style', 'kariez' ),
				'description' => __( 'This option works only for blog button style', 'kariez' ),
				'default'     => 'button-3',
				'choices'     => [
					'button-1'  => __( 'Default', 'kariez' ),
					'button-2'  => __( 'Button 2', 'kariez' ),
					'button-3'  => __( 'Button 3', 'kariez' ),
					'button-4'  => __( 'Button 4', 'kariez' ),
					'button-5'  => __( 'Button 5', 'kariez' ),
				]
			],

			'rt_blog_btn_radius' => [
				'type'    => 'number',
				'label'   => __( 'Button Radius', 'kariez' ),
				'default' => 6,
			],

			'rt_blog_pagination_style' => [
				'type'        => 'select',
				'label'       => __( 'Pagination Style', 'kariez' ),
				'description' => __( 'This option works only for blog pagination style', 'kariez' ),
				'default'     => 'pagination-area',
				'choices'     => [
					'pagination-area'  => __( 'Default', 'kariez' ),
					'pagination-area-2'  => __( 'Style 2', 'kariez' ),
				]
			],

			'rt_meta_heading' => [
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'kariez' ),
			],

			'rt_blog_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Meta Style', 'kariez' ),
				'default' => 'meta-style-default',
				'choices' => Fns::meta_style()
			],

			'rt_single_above_meta_style' => [
				'type'    => 'select',
				'label'   => __( 'Title Above Meta Style', 'kariez' ),
				'default' => 'meta-style-dash',
				'choices' => Fns::meta_style( [ 'meta-style-dash-bg', 'meta-style-pipe' ] )
			],

			'rt_blog_meta' => [
				'type'        => 'select2',
				'label'       => __( 'Choose Meta', 'kariez' ),
				'description' => __( 'You can sort meta by drag and drop', 'kariez' ),
				'placeholder' => __( 'Choose Meta', 'kariez' ),
				'multiselect' => true,
				'default'     => 'author,date,category',
				'choices'     => Fns::blog_meta_list(),
			],

			'rt_visibility' => [
				'type'  => 'heading',
				'label' => __( 'Visibility Section', 'kariez' ),
			],

			'rt_meta_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Meta Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_blog_above_meta_visibility' => [
				'type'  => 'switch',
				'label' => __( 'Title Above Meta Visibility', 'kariez' ),
			],

			'rt_blog_content_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Content Visibility', 'kariez' ),
				'default' => 1
			],


			'rt_blog_footer_visibility' => [
				'type'    => 'switch',
				'label'   => __( 'Entry Footer Visibility', 'kariez' ),
				'default' => 1
			],

			'rt_animation_heading' => [
				'type'  => 'heading',
				'label' => __( 'Animation', 'kariez' ),
			],

			'rt_animation' => [
				'type'      => 'switch',
				'label'       => __( 'Animation', 'kariez' ),
				'default'     => 0,
			],

			'rt_animation_effect' => [
				'type'        => 'select',
				'label' => __( 'Entrance Animation', 'kariez' ),
				'description' => __( 'This option works only for blog animation effect', 'kariez' ),
				'default'     => 'fadeInUp',
				'choices'     => [
					'bounce' => esc_html__( 'bounce', 'kariez' ),
					'flash' => esc_html__( 'flash', 'kariez' ),
					'pulse' => esc_html__( 'pulse', 'kariez' ),
					'rubberBand' => esc_html__( 'rubberBand', 'kariez' ),
					'shakeX' => esc_html__( 'shakeX', 'kariez' ),
					'shakeY' => esc_html__( 'shakeY', 'kariez' ),
					'headShake' => esc_html__( 'headShake', 'kariez' ),
					'swing' => esc_html__( 'swing', 'kariez' ),
					'fadeIn' => esc_html__( 'fadeIn', 'kariez' ),
					'fadeInUp' => esc_html__( 'fadeInUp', 'kariez' ),
					'fadeInDown' => esc_html__( 'fadeInDown', 'kariez' ),
					'fadeInLeft' => esc_html__( 'fadeInLeft', 'kariez' ),
					'fadeInRight' => esc_html__( 'fadeInRight', 'kariez' ),
					'bounceIn' => esc_html__( 'bounceIn', 'kariez' ),
					'bounceInUp' => esc_html__( 'bounceInUp', 'kariez' ),
					'bounceInDown' => esc_html__( 'bounceInDown', 'kariez' ),
					'bounceInLeft' => esc_html__( 'bounceInLeft', 'kariez' ),
					'bounceInRight' => esc_html__( 'bounceInRight', 'kariez' ),
					'slideInUp' => esc_html__( 'slideInUp', 'kariez' ),
					'slideInDown' => esc_html__( 'slideInDown', 'kariez' ),
					'slideInLeft' => esc_html__( 'slideInLeft', 'kariez' ),
					'slideInRight' => esc_html__( 'slideInRight', 'kariez' ),
				],
				'condition' => [ 'rt_animation' ],
			],

			'delay' => [
				'type'  => 'text',
				'label' => __( 'Delay', 'kariez' ),
				'default' => '200',
				'condition' => [ 'rt_animation' ],
			],

			'duration' => [
				'type'  => 'text',
				'label' => __( 'Duration', 'kariez' ),
				'default' => '1200',
				'condition' => [ 'rt_animation' ],
			],

		] );
	}
}
