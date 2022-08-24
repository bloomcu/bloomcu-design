<?php
namespace Design;
// require 'partials/topbar.php';

/**
 * Frontend Handler
 */
class Frontend {

	public function __construct() {
		// add_action('init', [$this, 'set_cookie'], 1);
		setcookie('design_plugin_enabled', 'true', time() + (86400 * 30), '/');
		
		if (isset($_COOKIE['design_plugin_enabled'])) {
			add_action('wp_head', [$this, 'render_frontend'], 12);	
		}
	}
	
	public function add_body_class($classes = []) {
		// if (get_field('design_article')) {
		// 	$classes[] = 'design-bar';
		// }
    // return $classes;
	}
	
	/**
	 * Set cookie
	 *
	 * @param  array $atts
	 *
	 */
	public function set_cookie() {
		// if(!isset($_COOKIE['design_plugin_enabled'])) {
			// setcookie('design_plugin_enabled', false);
		// }
	}
	
	/**
	 * Render frontend
	 *
	 * @param  array $atts
	 *
	 * @return string
	 */
	public function render_frontend( $atts ) {
		// $enabled = isset($_COOKIE['design_plugin_enabled']);
		$design = isset($_GET['design']) ? $_GET['design'] : null;
		$mode = isset($_GET['mode']) ? $_GET['mode'] : null;
		
		if ($design) {
			echo '
				<div
					id="app"
					data-design="'.$design.'"
					data-mode="'.$mode.'"
				></div>
			';
		}
	}
}
