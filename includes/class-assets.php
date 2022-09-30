<?php
namespace Design;

/**
 * Scripts and Styles Class
 */
class Assets {

	public function __construct() {
		$disabled = isset($_COOKIE['design_plugin_disabled']);
		$design = isset($_COOKIE['design_plugin_design']) ? $_COOKIE['design_plugin_design'] : null;
		$mode = isset($_COOKIE['design_plugin_mode']) ? $_COOKIE['design_plugin_mode'] : null;
		
		// if (isset($_GET['design']) && isset($_GET['mode'])) {
		if (isset($_GET['design'])) {
			// $disabled = false;
			$design = isset($_GET['design']) ? $_GET['design'] : null;
			// $mode = isset($_GET['mode']) ? $_GET['mode'] : null;
			
			// Update cookies
			setcookie('design_plugin_disabled', '', 'Thu, 01 Jan 1970 00:00:00 UTC', '/'); // Destroy cookie
			setcookie('design_plugin_design', $design, time() + (86400 * 30), '/'); // 86400 = 1 day
			// setcookie('design_plugin_mode', $mode, time() + (86400 * 30), '/');
		}
		
		if (!$disabled) {
			// return;
			
			if ($mode === 'edit') {
				if (!is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php') {
					$this->redirect_to_login();
				}
				
				// $this->init();
			}
			
			// if ($mode === 'view') {
				$this->init();
			// }
		}
		
		// return;
		
		// if (!isset($_COOKIE['design_plugin_disabled'])) {
		// 	$design = isset($_GET['design']) ? $_GET['design'] : null;
		// 	$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
		// 
		// 	if (!$design) { 
		// 		return; 
		// 	}
		// 
		// 	if ($mode === 'edit' && !is_user_logged_in()) {
		// 		$this->redirect_to_login();
		// 	}
		// 
		// 	if ($mode === 'view' || $mode === 'edit') {
		// 		$this->init();
		// 	}	
	}
	
	/**
	 * Init plugin assets
	 *
	 * @return void
	 */
	public function init() {
		add_action('wp_enqueue_scripts', [$this, 'dequeue_child_theme_stylesheet'], 999);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_design_plugin_frontend']);
	}
	
	/**
	 * Disable child theme styles
	 *
	 * @return void
	 */
	public function dequeue_child_theme_stylesheet() {
		wp_dequeue_style('client-css');
	}
	
	/**
	 * Enqueue design plugin frontend script
	 *
	 * @return void
	 */
	public function enqueue_design_plugin_frontend() {
		wp_enqueue_script('design-plugin-frontend', DESIGN_PLUGIN_ASSETS . '/main.js?v=' . filemtime(DESIGN_PLUGIN_PATH . '/src/main.js'), [], '', true);
		
		// wp_enqueue_script('design-plugin-frontend', DESIGN_PLUGIN_ASSETS . '/assets/index.js?v=' . filemtime(DESIGN_PLUGIN_PATH . '/dist/assets/index.js'), [], '', true);
		// wp_enqueue_script('design-plugin-frontend', '/wp-content/plugins/bloomcu-design/src/main.js', [], '', true);
		// add_filter('script_loader_tag', [$this, 'add_module_to_design_plugin_script'], 10, 3);
		
		// Prod
		// wp_enqueue_style('design-plugin-css', DESIGN_PLUGIN_ASSETS . '/assets/main.css?v=' . filemtime(DESIGN_PLUGIN_PATH . '/dist/assets/main.css'), [], '', 'screen');
		// wp_enqueue_script('design-plugin-frontend', DESIGN_PLUGIN_ASSETS . '/assets/main.js?v=' . filemtime(DESIGN_PLUGIN_PATH . '/dist/assets/main.js'), [], '', true);
		// add_filter('script_loader_tag', [$this, 'add_module_to_design_plugin_script'], 10, 3);
		
		// ESM format
		// wp_enqueue_script('design-plugin-frontend', DESIGN_PLUGIN_ASSETS . '/bloomcu-design.esm.js?v=' . filemtime(DESIGN_PLUGIN_PATH . '/dist/bloomcu-design.esm.js'), [], '', true);
		// wp_enqueue_style('design-plugin-css', DESIGN_PLUGIN_ASSETS . '/style.css?v=' . filemtime(DESIGN_PLUGIN_PATH . '/dist/style.css'), [], '', 'screen');
		
		// UMD format
		// wp_enqueue_script('design-plugin-frontend', DESIGN_PLUGIN_ASSETS . '/bloomcu-design.umd.js?v=' . filemtime(DESIGN_PLUGIN_PATH . '/dist/bloomcu-design.umd.js'), [], '', true);
		// wp_enqueue_style('design-plugin-css', DESIGN_PLUGIN_ASSETS . '/style.css?v=' . filemtime(DESIGN_PLUGIN_PATH . '/dist/style.css'), [], '', 'screen');
	}
	
	// function add_module_to_design_plugin_script($tag, $handle, $src) {
	// 	if ('design-plugin-frontend' === $handle) {
	// 		$tag = '<script type="module" src="' . esc_url($src) . '"></script>';
	// 	}
	// 
	// 	return $tag;
	// }
	
	/**
	 * Redirect to login
	 *
	 * @return void
	 */
	public function redirect_to_login() {
		$redirect = wp_login_url() . '?redirect_to=' . $this->get_current_url();
		
		wp_redirect($redirect);
	}
	
	/**
	 * Get the current URL
	 *
	 * @return String
	 */
	public function get_current_url() {
		if (
			isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || 
			isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
		) {
			$protocol = 'https://';
		} else {
			$protocol = 'http://';
		}
		
		return urlencode($protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	}
}
