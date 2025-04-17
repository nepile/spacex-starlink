<?php
/**
 * Build Gutenberg Blocks
 *
 * @package kariez
 */

namespace RT\Kariez\Api;

use RT\Kariez\Traits\SingletonTraits;

/**
 * Customizer class
 */
class Gutenberg {
	use SingletonTraits;

	/**
	 * Register default hooks and actions for WordPress
	 *
	 * @return WordPress add_action()
	 */
	public function __construct() {
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}

		add_action( 'init', [ $this, 'gutenberg_init' ] );

	}

	/**
	 * Custom Gutenberg settings
	 * @return
	 */
	public function gutenberg_init() {
		add_theme_support( 'gutenberg', [
			// Theme supports responsive video embeds
			'responsive-embeds' => true,
			// Theme supports wide images, galleries and videos.
			'wide-images'       => true,
		] );

		add_theme_support( 'editor-color-palette', [
			[
				'name' => esc_html__( 'Primary Color', 'kariez' ),
				'slug' => 'kariez-primary',
				'color' => '#006D5B',
			],
			[
				'name' => esc_html__( 'Secondary Color', 'kariez' ),
				'slug' => 'kariez-secondary',
				'color' => '#00473b',
			],
			[
				'name' => esc_html__( 'Yellow Color', 'kariez' ),
				'slug' => 'kariez-yellow',
				'color' => '#ffb000',
			],
			[
				'name' => esc_html__( 'Dark gray', 'kariez' ),
				'slug' => 'kariez-dark-gray',
				'color' => '#edf5f4',
			],
			[
				'name' => esc_html__( 'light gray', 'kariez' ),
				'slug' => 'kariez-light-gray',
				'color' => '#f1f1f1',
			],
			[
				'name' => esc_html__( 'white', 'kariez' ),
				'slug' => 'kariez-white',
				'color' => '#ffffff',
			],
		] );

		add_theme_support( 'editor-font-sizes', [
			[
				'name' => esc_html__( 'Small', 'kariez' ),
				'size' => 16,
				'slug' => 'small'
			],
			[
				'name' => esc_html__( 'Normal', 'kariez' ),
				'size' => 24,
				'slug' => 'normal'
			],
			[
				'name' => esc_html__( 'Large', 'kariez' ),
				'size' => 36,
				'slug' => 'large'
			],
			[
				'name' => esc_html__( 'Huge', 'kariez' ),
				'size' => 44,
				'slug' => 'huge'
			]
		] );
	}
}
