<?php
namespace Design;

/**
 * REST_API Handler
 */
class REST_API {

	public function __construct() {
		// add_action( 'rest_api_init', function() {
		// 	register_rest_route( 'design/v1', '/design/(?P<id>\d+)', [
		// 		'methods'  => 'GET',
		// 		'callback' => [ $this, 'get_design' ],
		// 	] );
		// } );
	}

	public function get_design( $data ) {
		// $design = get_post( $data['id'] );
		// 
		// // Bail if empty or not a design post
		// if ( empty( $design ) || $design->post_type !== 'design' ) {
		// 	return 0;
		// }
		// 
		// // attach design schema meta
		// $schema = get_post_meta( $data['id'], '_bloom_design_schema', true );
		// $design->design_structure = $schema;
		// 
		// // attach design type
		// $type = get_post_meta( $data['id'], '_bloom_design_type', true );
		// $design->design_type = $type;
		// 
		// return $design;
	}

}
