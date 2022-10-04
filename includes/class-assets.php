<?php
namespace Design;

/**
 * Scripts and Styles Class
 */
class Assets {

	public function __construct() {
		$disabled = isset($_COOKIE['design_plugin_disabled']);
		$design = isset($_COOKIE['design_plugin_design']) ? $_COOKIE['design_plugin_design'] : null;
		$mode = null;
		// $mode = isset($_COOKIE['design_plugin_mode']) ? $_COOKIE['design_plugin_mode'] : null;
		
		if (isset($_GET['design']) && isset($_GET['mode'])) {
			$design = $_GET['design'];
			$mode = $_GET['mode'];
			
			setcookie('design_plugin_disabled', '', 'Thu, 01 Jan 1970 00:00:00 UTC', '/'); // Enable plugin
			setcookie('design_plugin_design', $design, time() + (86400 * 30), '/'); // 86400 = 1 day
		}
		
		if (!$disabled) {

			if ($mode === 'edit') {
				if (!is_user_logged_in() && $GLOBALS['pagenow'] !== 'wp-login.php') {
					$this->redirect_to_login();
				}
			}
			
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
	}
	
	/**
	 * Redirect to login
	 *
	 * @return void
	 */
	// public function redirect_to_login() {
	// 	$redirect = wp_login_url() . '?redirect_to=' . $this->get_current_url();
	// 
	// 	wp_redirect($redirect);
	// }
	
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
