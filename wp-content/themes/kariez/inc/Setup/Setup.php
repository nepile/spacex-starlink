<?php

namespace RT\Kariez\Setup;

use RT\Kariez\Traits\SingletonTraits;

class Setup {
	use SingletonTraits;

	/**
	 * register default hooks and actions for WordPress
	 * @return void
	 */
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'setup' ] );
		add_action( 'after_setup_theme', [ $this, 'content_width' ], 0 );
	}

	/**
	 * Setup Theme
	 * @return void
	 */
	public function setup() {
		load_theme_textdomain( 'kariez', get_template_directory() . '/languages' );

		$this->add_theme_support();
		$this->add_image_size();
	}

	/**
	 * Add Image Size
	 * @return void
	 */
	private function add_image_size() {
		$sizes = [
			'kariez-size1' => [ 1344, 625, true ],
			'kariez-size2'  => [ 960, 520, true ],
			'kariez-size3'  => [ 960, 690, true ],
			'kariez-size4'  => [ 450, 450, true ],
			'kariez-size5'  => [ 600, 682, true ],
			'kariez-size6'  => [ 960, 960, true ],
			'kariez-size7'  => [ 450, 600, true ],
		];

		$sizes = apply_filters( 'kariez_image_size', $sizes );

		foreach ( $sizes as $size => $value ) {
			add_image_size( $size, $value[0], $value[1], $value[2] );
		}
	}

	/**
	 * Add Theme Support
	 * @return void
	 */
	private function add_theme_support() {
		/*
		 * Default Theme Support options better have
		 */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ] );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'custom-logo' );
		add_theme_support( "custom-header" );
		add_theme_support( "custom-background" );
		add_theme_support( "register_block_style" );
		add_theme_support( "register_block_pattern" );
		add_theme_support( "responsive-embeds" );

		/**
		 * Add woocommerce support and woocommerce override
		 */
		add_theme_support( 'woocommerce' );


		/*
		 * Activate Post formats if you need
		 */
		add_theme_support( 'post-formats', [
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		] );
	}

	/*
		Define a max content width to allow WordPress to properly resize your images
	*/
	public function content_width() {
		$GLOBALS['content_width'] = apply_filters( 'content_width', 1440 );
	}

}
