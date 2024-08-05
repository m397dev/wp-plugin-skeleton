<?php
/**
 * @project     wp-plugin-skeleton
 * @author      M397
 * @email       m397.dev@gmail.com
 * @date        8/5/2024
 * @time        5:13 PM
 */

declare( strict_types=1 );

/**
 * - Name: Plugin_Name_Bootstrap
 * - Type: Base class
 * - Description:
 * This is the bootstrap class for this plugin. It fires first when this plugin
 * is loaded, all config and dependencies will be loaded in this class.
 *
 * @package src
 * @subpackage includes/bootstrap
 *
 * @since 1.0.0
 */
class Plugin_Name_Bootstrap {

	/**
	 * @var string $plugin_name Defines the name of this plugin.
	 */
	private string $plugin_name = 'plugin-name';

	/**
	 * @var array|string[] $registered_config Register configurations.
	 */
	private array $registered_config = [
		'info',
		'db',
		'dependencies',
		'params',
	];

	/**
	 * Require all registered configurations.
	 *
	 * @return void
	 */
	public function load_all_config(): void {
		foreach ( $this->registered_config as $config ) {
			$this->load_single_config( $config );
		}
	}

	/**
	 * Require single registered configuration.
	 *
	 * @param  string  $config_name
	 *
	 * @return void
	 */
	public function load_single_config( string $config_name ): void {
		require_once $this->get_config_file( $config_name );
	}

	/**
	 * Returns absolute path to the given configuration if existed.
	 *
	 * @param  string  $config_name
	 *
	 * @return string
	 */
	private function get_config_file( string $config_name ): string {
		if ( ! in_array( $config_name, $this->registered_config ) ) {
			wp_die( __( 'The "' . $config_name . '" configuration has not been registered.' ) );
		}

		$config_container = $this->get_root_dir() . '/config/';
		$config           = $config_container . $this->plugin_name . '-' . $config_name . '.php';

		if ( ! file_exists( $config ) ) {
			wp_die( __( 'The "' . $config_name . '" configuration is missing.' ) );
		}

		return $config;
	}

	/**
	 * Return absolute path to the root dir.
	 *
	 * @return string
	 */
	private function get_root_dir(): string {
		return plugin_dir_path( dirname( __FILE__, 2 ) );
	}

}