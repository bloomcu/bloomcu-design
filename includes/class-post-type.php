<?php
namespace Design;

/**
 * Custom Post Type
 */
class Post_Type {

	public function __construct() {
		// add_action( 'init', [ $this, 'design_acf' ], 5 );
	}
	
	/**
	 * Register acf fields
	 *
	 * @return void
	 */
	public function design_acf() {
		// if( function_exists('acf_add_local_field_group') ):
		// 
		// 	acf_add_local_field_group(array(
		// 	'key' => 'group_3dgc21ee7b84c',
		// 	'title' => 'Design',
		// 	'fields' => array(
		// 		array(
		// 			'key' => 'field_5cac228b49995',
		// 			'label' => 'Design Article',
		// 			'name' => 'design_article',
		// 			'type' => 'text',
		// 			'instructions' => 'Link to design article.',
		// 			'required' => 0,
		// 			'conditional_logic' => 0,
		// 			'wrapper' => array(
		// 				'width' => '',
		// 				'class' => '',
		// 				'id' => '',
		// 			),
		// 			'default_value' => '',
		// 			'placeholder' => '',
		// 			'prepend' => '',
		// 			'append' => '',
		// 			'maxlength' => '',
		// 		),
		// 	),
		// 	'location' => array(
		// 		array(
		// 			array(
		// 				'param' => 'post_type',
		// 				'operator' => '==',
		// 				'value' => 'page',
		// 			),
		// 		),
		// 	),
		// 	'menu_order' => 0,
		// 	'position' => 'acf_after_title',
		// 	'style' => 'default',
		// 	'label_placement' => 'top',
		// 	'instruction_placement' => 'label',
		// 	'hide_on_screen' => '',
		// 	'active' => true,
		// 	'description' => '',
		// 	'show_in_rest' => 0,
		// 	));
		// 
		// 	endif;		
	}

}
