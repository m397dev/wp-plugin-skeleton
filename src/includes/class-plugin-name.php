<?php

declare( strict_types=1 );

/**
 * Class Plugin_Name.
 *
 * This is the core plugin class.
 * Includes attributes and functions used across both the public-facing side of
 * the site and the admin area.
 *
 * @package    plugin-name
 * @subpackage src/includes
 *
 * @since      1.0.0
 */
class Plugin_Name {

	/**
	 * @var array $plugin_info The info array data of this plugin.
	 */
	private array $plugin_info = [
		'plugin_name'        => 'plugin-name',
		'plugin_prefix'      => 'plugin-name-',
		'plugin_text_domain' => 'plugin-name',
		'plugin_version'     => '1.0.0',
	];

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout
	 * the plugin. Load the dependencies, define the locale, and set the hooks
	 * for the admin area and the public-facing side of the site.
	 */
	public function __construct() {}

	/**
	 * Returns an array data of the given configuration.
	 *
	 * @param  string  $config_name  Name of the config file that needs to be
	 *     accessed.
	 *
	 * @return array
	 */
	private function get_config( string $config_name ): array {
		$container_path = plugin_dir_path( dirname( __FILE__ ) ) . '/config/';
		$config_path    = $container_path . $this->plugin_info['plugin_prefix'] . $config_name . '.php';

		if ( ! file_exists( $config_path ) ) {
			wp_die( __( 'The configuration file "' . $config_name . '" does not exist.',
				$this->plugin_info['plugin_text_domain'] ) );
		}

		$config_data = require_once( $config_path );

		if ( ! is_array( $config_data ) ) {
			wp_die( __( 'The configuration file "' . $config_name . '" is not an array, so, not readable.',
				$this->plugin_info['plugin_text_domain'] ) );
		}

		if ( empty( $config_data ) ) {
			wp_die( __( 'The configuration "' . $config_name . '" is empty.',
				$this->plugin_info['plugin_text_domain'] ) );
		}

		return $config_data;
	}

}