<?php
namespace Research;

/**
 * Scripts and Styles Class
 */
class Assets {

	public function __construct() {

		if ( is_admin() ) {
			// wp_enqueue_editor();
			// add_action( 'admin_enqueue_scripts', [ $this, 'register' ], 5 );
			// add_action( 'admin_enqueue_scripts', [ $this, 'localize_admin_script' ], 10 );
		} else {
			// add_action( 'wp_enqueue_scripts', [ $this, 'register' ], 5 );
			// add_action( 'wp_enqueue_scripts', [ $this, 'localize_frontend_script' ], 10 );
		}

	}

	/**
	 * Register our app scripts and styles
	 *
	 * @return void
	 */
	public function register() {
		$this->register_scripts( $this->get_scripts() );
		$this->register_styles( $this->get_styles() );
	}

	/**
	 * Register scripts
	 *
	 * @param  array $scripts
	 *
	 * @return void
	 */
	private function register_scripts( $scripts ) {
		foreach ( $scripts as $handle => $script ) {
			$deps      = isset( $script['deps'] ) ? $script['deps'] : false;
			$in_footer = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
			$version   = isset( $script['version'] ) ? $script['version'] : BOILERPLATE_PLUGIN_VERSION;

			wp_register_script( $handle, $script['src'], $deps, $version, $in_footer );
		}
	}

	/**
	 * Localize admin script
	 */
	public function localize_admin_script() {
		wp_localize_script(
			'designPlugin-admin',
			'researchLocal',
			[
				'siteUrl'  => esc_url( home_url() ),
				'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'wp_rest' ),
			]
		);
	}

	/**
	 * Localize frontend script
	 */
	public function localize_frontend_script() {
		wp_localize_script(
			'research-plugin-frontend',
			'researchLocal',
			[
				'siteUrl'  => esc_url( home_url() ),
			]
		);
	}

	/**
	 * Register styles
	 *
	 * @param array $styles
	 *
	 * @return void
	 */
	public function register_styles( $styles ) {
		foreach ( $styles as $handle => $style ) {
			$deps = isset( $style['deps'] ) ? $style['deps'] : false;

			wp_register_style( $handle, $style['src'], $deps, BOILERPLATE_PLUGIN_VERSION );
		}
	}

	/**
	 * Get all registered scripts
	 *
	 * @return array
	 */
	public function get_scripts() {
		$prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '';

		$scripts = [
			'designPlugin-vendor' => [
				'src'       => BOILERPLATE_PLUGIN_ASSETS . '/js/vendor.min.js',
				'version'   => filemtime( BOILERPLATE_PLUGIN_PATH . '/assets/js/vendor.min.js' ),
				'in_footer' => true,
			],
			'research-plugin-frontend' => [
				'src'       => BOILERPLATE_PLUGIN_ASSETS . '/js/frontend.min.js',
				'deps'      => [ 'jquery', 'designPlugin-vendor' ],
				'version'   => filemtime( BOILERPLATE_PLUGIN_PATH . '/assets/js/frontend.min.js' ),
				'in_footer' => true,
			],
			// 'designPlugin-admin' => [
			// 	'src'       => BOILERPLATE_PLUGIN_ASSETS . '/js/admin.min.js',
			// 	'deps'      => [ 'jquery', 'designPlugin-vendor' ],
			// 	'version'   => filemtime( BOILERPLATE_PLUGIN_PATH . '/assets/js/admin.min.js' ),
			// 	'in_footer' => true,
			// ],
			// 'font-awesome' => [
			// 	'src'       => 'https://use.fontawesome.com/releases/v5.1.0/js/all.js',
			// 	'deps'      => [],
			// 	'version'   => '5.1.0',
			// 	'in_footer' => true,
			// ],
			// 'polyfill-io' => [
			// 	'src'       => 'https://cdn.polyfill.io/v2/polyfill.min.js',
			// 	'deps'      => [],
			// 	'version'   => '3.25.1',
			// 	'in_footer' => false,
			// ],
		];

		return $scripts;
	}

	/**
	 * Get registered styles
	 *
	 * @return array
	 */
	public function get_styles() {

		$styles = [
			'designPlugin-style' => [
				'src' =>  BOILERPLATE_PLUGIN_ASSETS . '/css/style.css'
			],
			'research-plugin-frontend' => [
				'src' =>  BOILERPLATE_PLUGIN_ASSETS . '/css/frontend.css'
			],
			'designPlugin-admin' => [
				'src' =>  BOILERPLATE_PLUGIN_ASSETS . '/css/admin.css'
			],
		];

		return $styles;
	}

}
