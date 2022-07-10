<?php
namespace Research;

/**
 * Custom Post Type
 */
class Post_Type {

	public function __construct() {
		// add_action( 'init', [ $this, 'research_acf' ], 5 );
	}
	
	/**
	 * Register acf fields
	 *
	 * @return void
	 */
	public function research_acf() {
		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array(
			'key' => 'group_3dgc21ee7b84c',
			'title' => 'Research',
			'fields' => array(
				array(
					'key' => 'field_5cac228b49995',
					'label' => 'Research Article',
					'name' => 'research_article',
					'type' => 'text',
					'instructions' => 'Link to research article.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'acf_after_title',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
			'show_in_rest' => 0,
			));

			endif;		
	}

}
