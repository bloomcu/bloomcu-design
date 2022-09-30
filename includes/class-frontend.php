<?php
namespace Design;

/**
 * Frontend Handler
 */
class Frontend {

	public function __construct() {
		add_action('wp_head', [$this, 'render_frontend'], 12);
		// add_filter('body_class', [$this, 'add_body_class']);
		add_action('admin_bar_menu', [ $this, 'admin_bar_menu' ], 999);
	}
	
	/**
	 * Render frontend
	 *
	 * @param  array $atts
	 *
	 * @return string
	 */
	public function render_frontend($atts) {
		$disabled = isset($_COOKIE['design_plugin_disabled']);
		$design = isset($_COOKIE['design_plugin_design']) ? $_COOKIE['design_plugin_design'] : null;
		// $mode = isset($_COOKIE['design_plugin_mode']) ? $_COOKIE['design_plugin_mode'] : 'view';
		
		global $current_user; 
		$user = wp_get_current_user();
		// var_dump($user->data);
		
		// if (isset($_GET['design']) && isset($_GET['mode'])) {
		if (isset($_GET['design'])) {
			// $disabled = false;
			$design = isset($_GET['design']) ? $_GET['design'] : null;
			// $mode = isset($_GET['mode']) ? $_GET['mode'] : null;
		}
		
		if (!$disabled) {
			echo '
				<div
					id="app"
					data-design="' . $design . '"
					data-user_name="' . $user->data->display_name . '"
					data-user_email="' . $user->data->user_email . '"
				></div>
			';
		}
	}
	
	/**
	 * Add body class
	 *
	 * @return array
	 */
	// public function add_body_class($classes = []) {
	// 	// $disabled = isset($_COOKIE['design_plugin_disabled']);
	// 	// $collapsed = isset($_COOKIE['design_plugin_sidebar_collapsed']);
	// 
	// 	// if (!$disabled && !$collapsed) {
	// 	// 	// return;
	// 	// 
	// 	// 	$classes[] = 'design-plugin-enabled';
	// 	// 	return $classes;
	// 	// }
	// 
	// 	return $classes;
	// }
	
	/**
	 * Inject our button into the frontend admin bar
	 *
	 * @return void
	 */
	public function admin_bar_menu($admin_bar) {
		$disabled = isset($_COOKIE['design_plugin_disabled']);
		
		// if (isset($_GET['design']) && isset($_GET['mode'])) {
		// 	$disabled = false;
		// }
		
		if ($disabled) {
			// Toggle on
			$admin_bar->add_menu( array(
				'id'    => 'design-plugin-power-button',
				'title' => '<span class="ab-icon dashicons dashicons-visibility" style="top: 2px;"></span>' . 'Enable Style Designer',
				'href'  => '#',
				'meta'  => array(
					'onclick' => 'document.cookie = "design_plugin_disabled=; path=/; expires= Thu, 01 Jan 1970 00:00:00 UTC", location.reload();',
				),
			));	
			
		} else {
			// Toggle off
			$admin_bar->add_menu( array(
				'id'    => 'design-plugin-power-button',
				'title' => '<span class="ab-icon dashicons dashicons-hidden" style="top: 2px;"></span>' . 'Disable Style Designer',
				'href'  => '#',
				'meta'  => array(
					'onclick' => 'document.cookie = "design_plugin_disabled=true; path=/;", location.reload();',
				),
			));	
		}
	}
}
