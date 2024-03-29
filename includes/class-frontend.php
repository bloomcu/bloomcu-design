<?php
namespace Design;

/**
 * Frontend Handler
 */
class Frontend {

	public function __construct() {
		add_action('init', [$this, 'init'], 999);
		add_action('wp_head', [$this, 'render_frontend'], 12);
		add_action('admin_bar_menu', [ $this, 'admin_bar_menu' ], 999);
	}
	
	/**
	 * Initialize
	 *
	 * @return string
	 */
	public function init() {
		if (isset($_GET['design']) && isset($_GET['mode'])) {
			setcookie('design_plugin_enabled', 'true', time() + (30 * 30 * 24 * 60 * 60 * 1000), '/'); // 30 days
		}
	}
	
	/**
	 * Render frontend
	 *
	 * @param  array $atts
	 *
	 * @return string
	 */
	public function render_frontend($atts) {
		$endpoint = get_field('api_endpoint', 'option');
		$organization = get_field('organization_slug', 'option');
		
		$enabled = isset($_COOKIE['design_plugin_enabled']) ? $_COOKIE['design_plugin_enabled'] : null;
		$design = isset($_COOKIE['design_plugin_design']) ? $_COOKIE['design_plugin_design'] : null;
		$mode = null;
		
		// Url params overide cookies that might be available
		if (isset($_GET['design']) && isset($_GET['mode'])) {
			$enabled = true;
			$design = $_GET['design'];
			$mode = $_GET['mode'];
		}
		
		global $current_user; 
		$user = wp_get_current_user();
		
		if ($enabled || $design && $mode) {
			echo '
				<div
					id="app"
					data-endpoint="' . $endpoint . '"
					data-organization="' . $organization . '"
					data-design="' . $design . '"
					data-mode="' . $mode . '"
					data-user_name="' . $user->data->display_name . '"
					data-user_email="' . $user->data->user_email . '"
					data-user_role="' . $user->roles[0] . '"
				></div>
			';
		}
	}
	// data-user_roles="' . implode($user->roles, ', ') . ']"
	/**
	 * Inject our button into the frontend admin bar
	 *
	 * @return void
	 */
	public function admin_bar_menu($admin_bar) {
		$enabled = isset($_COOKIE['design_plugin_enabled']) ? $_COOKIE['design_plugin_enabled'] : null;
		
		if (isset($_GET['design']) && isset($_GET['mode'])) {
			$enabled = true;
		}
		
		if ($enabled) {
			
			// Show button that disables plugin
			$admin_bar->add_menu( array(
				'id'    => 'design-plugin-power-button',
				'title' => '<span class="ab-icon dashicons dashicons-hidden" style="top: 2px;"></span>' . 'Disable Style Designer',
				'href'  => '#',
				'meta'  => array(
					'onclick' => 'document.cookie = "design_plugin_enabled=; path=/; expires= Thu, 01 Jan 1970 00:00:00 UTC", window.location = window.location.href.split("?")[0];',
				),
			));	
		} else {
			
			// Show button that enables plugin
			$admin_bar->add_menu( array(
				'id'    => 'design-plugin-power-button',
				'title' => '<span class="ab-icon dashicons dashicons-visibility" style="top: 2px;"></span>' . 'Enable Style Designer',
				'href'  => '#',
				'meta'  => array(
					'onclick' => 'document.cookie = "design_plugin_enabled=true; path=/;", location.reload();',
				),
			));	
		}
	}
}
