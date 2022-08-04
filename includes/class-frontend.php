<?php
namespace Design;
// require 'partials/topbar.php';

/**
 * Frontend Handler
 */
class Frontend {

	public function __construct() {
		add_action('wp_head', [$this, 'render_frontend'], 12);
	}
	
	public function add_body_class($classes = []) {
		// if (get_field('design_article')) {
		// 	$classes[] = 'design-bar';
		// }
    // return $classes;
	}

	/**
	 * Render frontend
	 *
	 * @param  array $atts
	 *
	 * @return string
	 */
	public function render_frontend( $atts ) {
		echo '<div id="app"></div>';
	}
	
	/**
	 * Render frontend
	 *
	 * @param  array $atts
	 *
	 * @return string
	 */
	public function enqueue_base( $atts ) {
		wp_enqueue_style('base');
	}

}
