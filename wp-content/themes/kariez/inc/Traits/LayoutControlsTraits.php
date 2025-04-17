<?php
/**
 * LayoutControls
 */

namespace RT\Kariez\Traits;

// Do not allow directly accessing this file.
use RT\Kariez\Helpers\Fns;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'This script cannot be accessed directly.' );
}

trait LayoutControlsTraits {
	public function get_layout_controls( $prefix = '' ) {

		$_left_text  = __( 'Left Sidebar', 'kariez' );
		$_right_text = __( 'Right Sidebar', 'kariez' );
		$left_text   = $_left_text;
		$right_text  = $_right_text;
		$image_left  = 'sidebar-left.png';
		$image_right = 'sidebar-right.png';

		if ( is_rtl() ) {
			$left_text   = $_right_text;
			$right_text  = $_left_text;
			$image_left  = 'sidebar-right.png';
			$image_right = 'sidebar-left.png';
		}

		return apply_filters( "kariez_{$prefix}_layout_controls", [

			$prefix . '_layout' => [
				'type'    => 'image_select',
				'label'   => __( 'Choose Layout', 'kariez' ),
				'default' => 'right-sidebar',
				'choices' => [
					'left-sidebar'  => [
						'image' => kariez_get_img( $image_left ),
						'name'  => $left_text,
					],
					'full-width'    => [
						'image' => kariez_get_img( 'sidebar-full.png' ),
						'name'  => __( 'Full Width', 'kariez' ),
					],
					'right-sidebar' => [
						'image' => kariez_get_img( $image_right ),
						'name'  => $right_text,
					],
				]
			],

			$prefix . '_sidebar' => [
				'type'    => 'select',
				'label'   => __( 'Choose a Sidebar', 'kariez' ),
				'default' => 'default',
				'choices' => Fns::sidebar_lists()
			],

			$prefix . '_page_bg_image' => [
				'type'         => 'image',
				'label'        => __( 'Page Background Image', 'kariez' ),
				'description'  => __( 'Upload Background Image', 'kariez' ),
				'button_label' => __( 'Background Image', 'kariez' ),
			],

			$prefix . '_page_bg_color' => [
				'type'         => 'color',
				'label'        => __( 'Page Background Color', 'kariez' ),
				'description'  => __( 'Inter Background Color', 'kariez' ),
			],

			$prefix . '_header_heading' => [
				'type'  => 'heading',
				'label' => __( 'Header Settings', 'kariez' ),
			],

			$prefix . '_header_style' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Header Layout', 'kariez' ),
				'choices' => [
					'default' => __( '--Default--', 'kariez' ),
					'1'       => __( 'Layout 1', 'kariez' ),
					'2'       => __( 'Layout 2', 'kariez' ),
				],
			],

			$prefix . '_top_bar' => [
				'type'    => 'select',
				'label'   => __( 'Top Bar', 'kariez' ),
				'default' => 'default',
				'choices' => [
					'default' => __( '--Default--', 'kariez' ),
					'on'      => __( 'On', 'kariez' ),
					'off'     => __( 'Off', 'kariez' ),
				]
			],

			$prefix . '_banner_heading' => [
				'type'  => 'heading',
				'label' => __( 'Banner Settings', 'kariez' ),
			],

			$prefix . '_banner' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Visibility', 'kariez' ),
				'choices' => [
					'default' => __( '--Default--', 'kariez' ),
					'on'      => __( 'On', 'kariez' ),
					'off'     => __( 'Off', 'kariez' ),
				],
			],

			$prefix . '_breadcrumb_title' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Title', 'kariez' ),
				'choices' => [
					'default' => __( '--Default--', 'kariez' ),
					'on'      => __( 'On', 'kariez' ),
					'off'     => __( 'Off', 'kariez' ),
				],
			],

			$prefix . '_breadcrumb' => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Banner Breadcrumb', 'kariez' ),
				'choices' => [
					'default' => __( '--Default--', 'kariez' ),
					'on'      => __( 'On', 'kariez' ),
					'off'     => __( 'Off', 'kariez' ),
				],
			],

			$prefix . '_banner_image' => [
				'type'         => 'image',
				'label'        => __( 'Banner Image', 'kariez' ),
				'description'  => __( 'Upload Banner Image', 'kariez' ),
				'button_label' => __( 'Banner Image', 'kariez' ),
			],

			$prefix . '_banner_color' => [
				'type'         => 'color',
				'label'        => __( 'Banner Background Color', 'kariez' ),
				'description'  => __( 'Inter Background Color', 'kariez' ),
			],

			$prefix . '_footer_heading' => [
				'type'  => 'heading',
				'label' => __( 'Footer Settings', 'kariez' ),
			],

			$prefix . '_footer_style'  => [
				'type'    => 'select',
				'default' => 'default',
				'label'   => __( 'Footer Layout', 'kariez' ),
				'choices' => [
					'default' => __( '--Default--', 'kariez' ),
					'1'       => __( 'Layout 1', 'kariez' ),
					'2'       => __( 'Layout 2', 'kariez' ),
				],
			],

		] );


	}


}
