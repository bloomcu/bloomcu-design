<?php
namespace Design;
// require 'partials/topbar.php';

/**
 * Frontend Handler
 */
class Frontend {

	public function __construct() {
		// add_action('wp_head', [$this, 'render_frontend'], 11);
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
		// wp_enqueue_script( 'design-plugin-frontend' ); 
		
		ob_start();
		?>
		
		<style media="screen">
		.color-primary {
			color: #000;
		}
		
		:root, [data-theme="default"] {
			--color-primary: #000;
			
			/* --color-primary: unquote("hsl(#{$hue}, #{$saturation}, #{$lightness})");
			--color-primary-h: #{$hue};
			--color-primary-s: #{$saturation};
			--color-primary-l: #{$lightness}; */
		}
		</style>
		
		<?php
		echo ob_get_contents();
	}

}
