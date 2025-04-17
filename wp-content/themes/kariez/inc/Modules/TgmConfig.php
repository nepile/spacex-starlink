<?php
/**
 * @author  RadiusTheme
 * @since   1.0.0
 * @version 1.1.0
 */

namespace RT\Kariez\Modules;
use RT\Kariez\Traits\SingletonTraits;

require_once get_template_directory() . '/inc/Lib/class-tgm-plugin-activation.php';
class TgmConfig {

	use SingletonTraits;

	public $base;
	public $path;

	public function __construct() {
		$this->base = 'kariez';
		$this->path = get_template_directory() . '/plugin-bundle/';

		add_action( 'tgmpa_register', [ $this, 'register_required_plugins' ] );
	}

	public function register_required_plugins() {
		$plugins = [
			// Bundled
			[
				'name'     => 'Kariez Core',
				'slug'     => 'kariez-core',
				'source'   => 'kariez-core.zip',
				'required' => true,
				'version'  => '1.0.1'
			],
			[
				'name'     => 'RT Framework',
				'slug'     => 'rt-framework',
				'source'   => 'rt-framework.zip',
				'required' => true,
				'version'  => '3.0.0'
			],

			// Repository
			[
				'name'     => esc_html__('Breadcrumb NavXT','kariez'),
				'slug'     => 'breadcrumb-navxt',
				'required' => false,
			],
			[
				'name'     => esc_html__('Elementor Page Builder','kariez'),
				'slug'     => 'elementor',
				'required' => false,
			],
			[
				'name'     => esc_html__('WP Fluent Forms','kariez'),
				'slug'     => 'fluentform',
				'required' => false,
			],
			[
				'name'     => esc_html__('One Click Demo Import','kariez'),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			],
		];

		$config = [
			'id'           => $this->base,
			'default_path' => $this->path,
			'menu'         => $this->base . '-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		];

		tgmpa( $plugins, $config );
	}
}
