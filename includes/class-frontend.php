<?php
namespace Design;

/**
 * Frontend Handler
 */
class Frontend {

	public function __construct() {
		add_action('wp_head', [$this, 'render_frontend'], 12);
		add_filter('body_class', [$this, 'add_body_class']);
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
		$design = isset($_GET['design']) ? $_GET['design'] : null;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
		
		if ($design && $mode) {
			echo '
				<div
					id="app"
					data-design="'.$design.'"
					data-mode="'.$mode.'"
				></div>
			';
		}
	}
	
	/**
	 * Add body class
	 *
	 * @return array
	 */
	public function add_body_class($classes = []) {
		$design = isset($_GET['design']) ? $_GET['design'] : null;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
		
		if ($design && $mode === 'edit') {
			$classes[] = 'design-plugin-enabled';
	    return $classes;
		}
		
		return $classes;
	}
	
	/**
	 * Inject our button into the frontend admin bar
	 *
	 * @return void
	 */
	public function admin_bar_menu($admin_bar) {
		if (isset($_COOKIE['design_plugin_disabled'])) {
			// Enable design
			$admin_bar->add_menu( array(
				'id'    => 'design-plugin-power-button',
				'title' => '<span class="ab-icon dashicons dashicons-visibility" style="top: 2px;"></span>' . 'Enable Style Designer',
				'href'  => '#',
				'meta'  => array(
					'onclick' => 'document.cookie = "design_plugin_disabled=; path=/; expires= Thu, 01 Jan 1970 00:00:00 UTC", location.reload();',
					// 'onclick' => '$.removeCookie("design_plugin_disabled");'
				),
			));	
			
		} else {
			// Disable design
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
