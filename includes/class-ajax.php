<?php
namespace Research;

/**
 * REST_API Handler
 */
class Ajax {

	public function __construct() {
		add_action( 'wp_ajax_research_save_research', [ $this, 'save_research' ] );
	}

	public function save_research() {

		$post_id   = sanitize_text_field( $_POST['id'] );
		$research_type = sanitize_text_field( $_POST['type'] );
		$research_json = $_POST['schema'];

		if ( empty( $post_id ) || empty( $research_json ) ) {
			return;
		}

		$this->save_postdata( $post_id, $research_json, $research_type );

		wp_die();

	}

	/**
	 * Save Quiz Data
	 */
	public function save_postdata( $post_id, $schema, $type ) {

		update_post_meta(
			$post_id,
			'_bloom_research_schema',
			wp_slash( $schema )
		);

		update_post_meta(
			$post_id,
			'_bloom_research_type',
			$type
		);

	}

}
