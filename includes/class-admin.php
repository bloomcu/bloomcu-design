<?php
namespace Design;

/**
 * Admin Pages Handler
 */
class Admin {

	public function __construct() {
		// add_action( 'admin_menu', [ $this, 'admin_menu' ] );
		// add_action('admin_bar_menu', [ $this, 'admin_bar_menu' ], 100);
		// add_filter( 'manage_design_posts_columns', [ $this, 'set_post_columns' ] );
		// add_action( 'manage_design_posts_custom_column', [ $this, 'set_columns_content' ], 10, 2 );
	}

	/**
	 * Inject our metabox into the post type
	 *
	 * @return void
	 */
	public function admin_menu() {


	}
	
	// /**
	//  * Inject our button into the frontend admin bar
	//  *
	//  * @return void
	//  */
	// public function admin_bar_menu($admin_bar) {
	// 	$admin_bar->add_menu( array(
  //       'id'    => 'design-plugin-power-button',
  //       'title' => 'Design',
  //       'href'  => '#',
  //       'meta'  => array(
  //           'title' => 'Design',            
  //       ),
  //   ));
	// }

	/**
	 * Add custom columns
	 *
	 * @return Array
	 */
	public function set_post_columns( $columns ) {
		// $columns = [
		// 	'cb'        => $columns['cb'],
		// 	'title'     => 'Title',
		// 	'role'      => 'Role',
		// 	'category'  => 'Category',
		// 	'shortcode' => 'Shortcode',
		// 	'date'      => $columns['date'],
		// ];
		// 
		// return $columns;
	}

	/**
	 * Set columns content
	 */
	public function set_columns_content( $column, $post_id ) {
		// 
		// $role = get_post_meta( $post_id, 'role', true );
		// $category = get_the_terms( $post_id, 'design_category');
		// 
		// switch ( $column ) {
		// 
		// 	case 'role':
		// 		if ( $role ) {
		// 			echo esc_html( $role );
		// 		} else {
		// 			echo '-';
		// 		}
		// 		break;
		// 
		// 	case 'category':
		// 		if ( $category ) {
		// 			echo esc_html( $category[0]->name );
		// 		} else {
		// 			echo '-';
		// 		}
		// 		break;
		// 
		// 	case 'shortcode':
		// 		echo "[design id=\"$post_id\"]";
		// 		break;
		// }
	}

}
