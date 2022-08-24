<?php
namespace Design;

/**
 * Scripts and Styles Class
 */
class Assets {

	public function __construct() {
		$design = isset($_GET['design']) ? $_GET['design'] : null;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
		
		if (is_admin()) { 
			return; 
		}
		
		if (!$design) { 
			return; 
		}
		
		if ($mode === 'edit' && !is_user_logged_in()) {
			$this->redirect_to_login();
		}
		
		if ($mode === 'view' || $mode === 'edit') {
			$this->init();
		}
	}
	
	/**
	 * Init plugin assets
	 *
	 * @return void
	 */
	public function init() {
		add_action('wp_enqueue_scripts', [$this, 'dequeue_child_theme_stylesheet'], 999);
		add_action('wp_enqueue_scripts', [$this, 'register']);
	}
	
	/**
	 * Redirect to login
	 *
	 * @return void
	 */
	public function redirect_to_login() {
		wp_redirect(
			wp_login_url()
		);
	}
	
	/**
	 * Disable child theme styles
	 *
	 * @return void
	 */
	public function dequeue_child_theme_stylesheet() {
		// Dequeue child theme css
		wp_dequeue_style('client-css');
		
		// Re enqueue base.js with depending on Vue
		// wp_deregister_script('base');
		// wp_enqueue_script('base', THEME_JS . '/app.js', [], '', true);
		
		// Dequeue search js and vue
		// wp_dequeue_script('codybloom-search');
		// wp_dequeue_script('vue');
		
		// Enqueue this plugin's js
		wp_enqueue_script('design-plugin-frontend');
	}
	
	// public function enqueue_dynamic_stylesheet() {
	// 	wp_enqueue_style('dynamic-css', DESIGN_PLUGIN_ASSETS . '/css/style.php');
	// }

	/**
	 * Register our app scripts and styles
	 *
	 * @return void
	 */
	public function register() {
		$this->register_scripts( $this->get_scripts() );
		// $this->register_styles( $this->get_styles() );
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
			$version   = isset( $script['version'] ) ? $script['version'] : DESIGN_PLUGIN_VERSION;
		
			wp_register_script( $handle, $script['src'], $deps, $version, $in_footer );
		}
	}

	/**
	 * Localize admin script
	 */
	public function localize_admin_script() {
		// wp_localize_script(
		// 	'designPlugin-admin',
		// 	'designLocal',
		// 	[
		// 		'siteUrl'  => esc_url( home_url() ),
		// 		'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
		// 		'nonce'    => wp_create_nonce( 'wp_rest' ),
		// 	]
		// );
	}

	/**
	 * Localize frontend script
	 */
	public function localize_frontend_script() {
		// wp_localize_script(
		// 	'design-plugin-frontend',
		// 	'designLocal',
		// 	[
		// 		'siteUrl'  => esc_url( home_url() ),
		// 	]
		// );
	}

	/**
	 * Register styles
	 *
	 * @param array $styles
	 *
	 * @return void
	 */
	public function register_styles( $styles ) {
		// foreach ( $styles as $handle => $style ) {
		// 	$deps = isset( $style['deps'] ) ? $style['deps'] : false;
		// 
		// 	wp_register_style( $handle, $style['src'], $deps, DESIGN_PLUGIN_VERSION );
		// }
	}

	/**
	 * Get all registered scripts
	 *
	 * @return array
	 */
	public function get_scripts() {
		// $prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '';
		// 
		$scripts = [
		// 	'designPlugin-vendor' => [
		// 		'src'       => DESIGN_PLUGIN_ASSETS . '/js/vendor.min.js',
		// 		'version'   => filemtime( DESIGN_PLUGIN_PATH . '/assets/js/vendor.min.js' ),
		// 		'in_footer' => true,
		// 	],
			'design-plugin-frontend' => [
				'src'       => DESIGN_PLUGIN_ASSETS . '/js/main.js',
				// 'version'   => filemtime( DESIGN_PLUGIN_PATH . '/assets/js/main.js' ),
				'in_footer' => true,
			],
			// 'designPlugin-admin' => [
			// 	'src'       => DESIGN_PLUGIN_ASSETS . '/js/admin.min.js',
			// 	'deps'      => [ 'jquery', 'designPlugin-vendor' ],
			// 	'version'   => filemtime( DESIGN_PLUGIN_PATH . '/assets/js/admin.min.js' ),
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

		// $styles = [
		// 	'designPlugin-style' => [
		// 		'src' =>  DESIGN_PLUGIN_ASSETS . '/css/style.css'
		// 	],
		// 	'design-plugin-frontend' => [
		// 		'src' =>  DESIGN_PLUGIN_ASSETS . '/css/frontend.css'
		// 	],
		// 	'designPlugin-admin' => [
		// 		'src' =>  DESIGN_PLUGIN_ASSETS . '/css/admin.css'
		// 	],
		// ];
		// 
		// return $styles;
	}

}
