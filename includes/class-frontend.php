<?php
namespace Research;
// require 'partials/topbar.php';

/**
 * Frontend Handler
 */
class Frontend {

	public function __construct() {
		// add_action('wp_footer', [$this, 'render_frontend']);
		// add_filter('body_class', [$this, 'add_body_class']);
	}
	
	public function add_body_class($classes = []) {
		if (get_field('research_article')) {
			$classes[] = 'research-bar';
		}
    return $classes;
	}

	/**
	 * Render frontend
	 *
	 * @param  array $atts
	 *
	 * @return string
	 */
	public function render_frontend( $atts ) {
		wp_enqueue_style( 'research-plugin-frontend' );
		wp_enqueue_script( 'research-plugin-frontend' ); 
		
		ob_start();
		?>
		
		<?php if (get_field('research_article')): ?>
			<div class="bloom-research-bar">
			  <p>This page has <a href="<?php the_field('research_article'); ?>" target="_blank">research</a></p>
			</div>
		<?php //endif; ?>
		
		<?php
		echo ob_get_contents();
	}

}
