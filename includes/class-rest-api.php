<?php
namespace Research;

/**
 * REST_API Handler
 */
class REST_API {

	public function __construct() {
		add_action( 'rest_api_init', function() {
			register_rest_route( 'research/v1', '/research/(?P<id>\d+)', [
				'methods'  => 'GET',
				'callback' => [ $this, 'get_research' ],
			] );
		} );
	}

	public function get_research( $data ) {
		$research = get_post( $data['id'] );

		// Bail if empty or not a research post
		if ( empty( $research ) || $research->post_type !== 'research' ) {
			return 0;
		}

		// attach research schema meta
		$schema = get_post_meta( $data['id'], '_bloom_research_schema', true );
		$research->research_structure = $schema;

		// attach research type
		$type = get_post_meta( $data['id'], '_bloom_research_type', true );
		$research->research_type = $type;

		return $research;
	}

}
