<?php
/*
Plugin Name: BloomCU Design
Plugin URI: https://bloomcu.com/
Description: Design made easier. Made by BloomCU.
Version: 1.5.2
Author: BloomCU
Author URI: https://bloomcu.com/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: designPlugin
Domain Path: /languages
*/

/**
 * Copyright (c) YEAR Your Name (email: ). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Design_Plugin class
 *
 * @class Design_Plugin The class that holds the entire Design_Plugin plugin
 */
final class Design_Plugin {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	public $version = '1.5.2';

	/**
	 * Holds various class instances
	 *
	 * @var array
	 */
	private $container = array();

	/**
	 * Constructor for the Design_Plugin class
	 *
	 * Sets up all the appropriate hooks and actions
	 * within our plugin.
	 */
	public function __construct() {

		$this->define_constants();

		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
	}

	/**
	 * Initializes the Design_Plugin() class
	 *
	 * Checks for an existing Design_Plugin() instance
	 * and if it doesn't find one, creates it.
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new Design_Plugin();
		}

		return $instance;
	}

	/**
	 * Magic getter to bypass referencing plugin.
	 *
	 * @param $prop
	 *
	 * @return mixed
	 */
	public function __get( $prop ) {
		if ( array_key_exists( $prop, $this->container ) ) {
			return $this->container[ $prop ];
		}

		return $this->{$prop};
	}

	/**
	 * Magic isset to bypass referencing plugin.
	 *
	 * @param $prop
	 *
	 * @return mixed
	 */
	public function __isset( $prop ) {
		return isset( $this->{$prop} ) || isset( $this->container[ $prop ] );
	}

	/**
	 * Define the constants
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'DESIGN_PLUGIN_VERSION', $this->version );
		define( 'DESIGN_PLUGIN_FILE', __FILE__ );
		define( 'DESIGN_PLUGIN_PATH', dirname( DESIGN_PLUGIN_FILE ) );
		define( 'DESIGN_PLUGIN_INCLUDES', DESIGN_PLUGIN_PATH . '/includes' );
		define( 'DESIGN_PLUGIN_URL', plugins_url( '', DESIGN_PLUGIN_FILE ) );
		define( 'DESIGN_PLUGIN_ASSETS', plugin_dir_url(__FILE__) . 'dist' );
	}

	/**
	 * Load the plugin after all plugins are loaded
	 *
	 * @return void
	 */
	public function init_plugin() {
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Placeholder for activation function
	 *
	 * Nothing being called here yet.
	 */
	public function activate() {

		$installed = get_option( 'designPlugin_installed' );

		if ( ! $installed ) {
			update_option( 'designPlugin_installed', time() );
		}

		// Update plugin version
		update_option( 'designPlugin_version', DESIGN_PLUGIN_VERSION );
	}

	/**
	 * Placeholder for deactivation function
	 *
	 * Nothing being called here yet.
	 */
	public function deactivate() {

	}

	/**
	 * Include the required files
	 *
	 * @return void
	 */
	public function includes() {

		require_once DESIGN_PLUGIN_INCLUDES . '/class-assets.php';

		if ( $this->is_request( 'admin' ) ) {
			require_once DESIGN_PLUGIN_INCLUDES . '/class-admin.php';
		}

		if ( $this->is_request( 'frontend' ) ) {
			require_once DESIGN_PLUGIN_INCLUDES . '/class-frontend.php';
		}

		// require_once DESIGN_PLUGIN_INCLUDES . '/class-ajax.php';
		// require_once DESIGN_PLUGIN_INCLUDES . '/class-rest-api.php';
		require_once DESIGN_PLUGIN_INCLUDES . '/class-post-type.php';

	}

	/**
	 * Initialize the hooks
	 *
	 * @return void
	 */
	public function init_hooks() {

		add_action( 'init', array( $this, 'init_classes' ) );

		$this->init_cpt();
	}

	/**
	 * Instantiate the required classes
	 *
	 * @return void
	 */
	public function init_classes() {

		if ( $this->is_request( 'admin' ) ) {
			$this->container['admin'] = new Design\Admin();
		}

		if ( $this->is_request( 'frontend' ) ) {
			$this->container['frontend'] = new Design\Frontend();
		}

		$this->container['assets'] = new Design\Assets();
		// $this->container['ajax'] = new Design\Ajax();
		// $this->container['rest'] = new Design\REST_API();
	}

	/**
	 * Initialize our custom post type
	 */
	public function init_cpt() {
		new Design\Post_Type();
	}

	/**
	 * What type of request is this?
	 *
	 * @param  string $type admin, ajax, cron or frontend.
	 *
	 * @return bool
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin':
				return is_admin();

			case 'ajax':
				return defined( 'DOING_AJAX' );

			case 'rest':
				return defined( 'REST_REQUEST' );

			case 'cron':
				return defined( 'DOING_CRON' );

			case 'frontend':
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}
	}
}

$designPlugin = Design_Plugin::init();
