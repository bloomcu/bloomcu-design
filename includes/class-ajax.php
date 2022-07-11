<?php
namespace Design;

/**
 * REST_API Handler
 */
class Ajax {

	public function __construct() {
		// add_action( 'wp_ajax_design_save_design', [ $this, 'save_design' ] );
	}

	public function save_design() {

		// $post_id   = sanitize_text_field( $_POST['id'] );
		// $design_type = sanitize_text_field( $_POST['type'] );
		// $design_json = $_POST['schema'];
		// 
		// if ( empty( $post_id ) || empty( $design_json ) ) {
		// 	return;
		// }
		// 
		// $this->save_postdata( $post_id, $design_json, $design_type );
		// 
		// wp_die();

	}

	/**
	 * Save Quiz Data
	 */
	public function save_postdata( $post_id, $schema, $type ) {
		// 
		// update_post_meta(
		// 	$post_id,
		// 	'_bloom_design_schema',
		// 	wp_slash( $schema )
		// );
		// 
		// update_post_meta(
		// 	$post_id,
		// 	'_bloom_design_type',
		// 	$type
		// );

	}

}
