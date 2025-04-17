<?php
/**
 * Theme Customizer Pannels
 *
 * @package kariez
 */

namespace RT\Kariez\Api\Customizer;

use RT\Kariez\Traits\SingletonTraits;
use RTFramework\Customize;

/**
 * Customizer class
 */
class Pannels {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return
	 */
	public function __construct() {
		$this->add_panels();
	}

	/**
	 * Add Panels
	 * @return void
	 */
	public function add_panels() {
		Customize::add_panels(
			[
				[
					'id'          => 'rt_header_panel',
					'title'       => esc_html__( 'Header - Topbar - Menu', 'kariez' ),
					'description' => esc_html__( 'Kariez Header', 'kariez' ),
					'priority'    => 22,
				],
				[
					'id'          => 'rt_typography_panel',
					'title'       => esc_html__( 'Typography', 'kariez' ),
					'description' => esc_html__( 'Kariez Typography', 'kariez' ),
					'priority'    => 24,
				],
				[
					'id'          => 'rt_color_panel',
					'title'       => esc_html__( 'Colors', 'kariez' ),
					'description' => esc_html__( 'Kariez Color Settings', 'kariez' ),
					'priority'    => 28,
				],
				[
					'id'          => 'rt_layouts_panel',
					'title'       => esc_html__( 'Layout Settings', 'kariez' ),
					'description' => esc_html__( 'Kariez Layout Settings', 'kariez' ),
					'priority'    => 34,
				],
				[
					'id'          => 'rt_contact_social_panel',
					'title'       => esc_html__( 'Contact & Socials', 'kariez' ),
					'description' => esc_html__( 'Kariez Contact & Socials', 'kariez' ),
					'priority'    => 24,
				],

			]
		);
	}

}
