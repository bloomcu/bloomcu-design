<?php
namespace Design;

/**
 * Custom Post Type
 */
class Post_Type {

	public function __construct() {
		add_action( 'init', [ $this, 'plugin_settings_menu' ], 5 );
		add_action( 'init', [ $this, 'plugin_acf' ], 5 );
	}
	
	/**
	 * Register plugin settings menu
	 *
	 * @return void
	 */
	public function plugin_settings_menu() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page(array(
				'page_title' 	=> 'Design Settings',
				'menu_title'	=> 'Design Settings',
				'menu_slug' 	=> 'design-settings',
				'capability'	=> 'edit_posts',
			));
		}
	}
	
	/**
	 * Register acf fields
	 *
	 * @return void
	 */
	public function plugin_acf() {
		if ( function_exists('acf_add_local_field_group') ) {
			acf_add_local_field_group(array(
				'key' => 'group_6345b6c9874c8',
				'title' => 'Plugin - BloomCU Design Settings',
				'fields' => array(
					array(
						'key' => 'field_6345bbdc73bbe',
						'label' => 'Organization Slug',
						'name' => 'organization_slug',
						'type' => 'text',
						'instructions' => 'Slug for the organization that designs belong to within the Build App.',
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
					array(
						'key' => 'field_6345bc2273bbf',
						'label' => 'API Endpoint',
						'name' => 'api_endpoint',
						'type' => 'select',
						'instructions' => 'Set the endpoint for the Build App. Default is the production Build App.',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'http://build-api.test/api' => 'Local (build-api.test)',
							'https://build-api-staging.bloomcu.com/api' => 'Staging (build-api-staging.bloomcu.com)',
							'https://build-api.bloomcu.com/api' => 'Production (build-api.bloomcu.com)',
						),
						'default_value' => 'https://build-api.bloomcu.com/api',
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'options_page',
							'operator' => '==',
							'value' => 'design-settings',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
				'show_in_rest' => 0,
			));
		}
	}
	
}
