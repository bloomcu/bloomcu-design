<?php
namespace Design;
// require 'partials/topbar.php';

/**
 * Frontend Handler
 */
class Frontend {

	public function __construct() {
		add_action('wp_head', [$this, 'render_frontend'], 12);
		// add_action('wp_footer', [$this, 'render_frontend'], 12);
		// add_action('wp_enqueue_scripts', [$this, 'render_frontend'], 11);
		// add_action('plugins_loaded', [$this, 'render_frontend'], 11);
		// add_filter('body_class', [$this, 'add_body_class']);
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
		// wp_enqueue_style( 'design-plugin-frontend' );
		// wp_enqueue_script('design-plugin-frontend', plugin_dir_url(__FILE__) . '/js/main.js');
		// wp_enqueue_style('base');
		// wp_enqueue_style('base', THEME_CSS . '/app.css', [], '', false);
		ob_start();
		?>
		
		<div id="app"></div>
		
		<?php
		// echo ob_get_contents();
		// return ob_get_clean();
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
