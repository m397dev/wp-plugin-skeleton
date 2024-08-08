<?php

declare( strict_types=1 );

/**
 * Class __Plugin_Name_Class__.
 *
 * This is the core plugin class.
 * Includes attributes and functions used across both the public-facing side of
 * the site and the admin area.
 *
 * @package    __plugin_name__
 * @subpackage src/includes
 *
 * @since      1.0.0
 */
class __Plugin_Name_Class__ {

	/**
	 * @var array $plugin_info The info array data of this plugin.
	 */
	public array $plugin_info = [
		'plugin_name'        => '__plugin_name__',
		'plugin_prefix'      => '__plugin_name__',
		'plugin_text_domain' => '__plugin_name__',
		'plugin_version'     => '1.0.0',
	];

	/**
	 * @var __Plugin_Name_Class___Switcher $switcher Instance of the
	 *      "__Plugin_Name_Class___Switcher" class.
	 */
	public __Plugin_Name_Class___Switcher $switcher;

	/**
	 * @var __Plugin_Name_Class___Loader $loader Instance of the
	 *     "__Plugin_Name_Class___Loader" class.
	 */
	public __Plugin_Name_Class___Loader $loader;

	/**
	 * @var __Plugin_Name_Class___Database $database Instance of the
	 *     "__Plugin_Name_Class___Database" class.
	 */
	public __Plugin_Name_Class___Database $database;

	/**
	 * @var __Plugin_Name_Class___Admin $admin Instance of the
	 *      "__Plugin_Name_Class___Admin" class.
	 */
	public __Plugin_Name_Class___Admin $admin;

	/**
	 * @var __Plugin_Name_Class___Client $client Instance of the
	 *      "__Plugin_Name_Class___Client" class.
	 */
	public __Plugin_Name_Class___Client $client;

	/**
	 * @var __Plugin_Name_Class___I18n $i18n Instance of the
	 *       "__Plugin_Name_Class___I18n" class.
	 */
	public __Plugin_Name_Class___I18n $i18n;

	/**
	 * @var __Plugin_Name_Class___Ajax $ajax Instance of the
	 *       "__Plugin_Name_Class___Ajax" class.
	 */
	public __Plugin_Name_Class___Ajax $ajax;

	/**
	 * @var __Plugin_Name_Class___Cron $cron Instance of the
	 *        "__Plugin_Name_Class___Cron" class.
	 */
	public __Plugin_Name_Class___Cron $cron;

	/**
	 * @var __Plugin_Name_Class___Helper $helper Instance of the
	 *     "__Plugin_Name_Class___Helper" class.
	 */
	public __Plugin_Name_Class___Helper $helper;

	/**
	 * @var __Plugin_Name_Class___Model $model Instance of the
	 *      "__Plugin_Name_Class___Model" class.
	 */
	public __Plugin_Name_Class___Model $model;

	/**
	 * @var __Plugin_Name_Class___Rest $rest Instance of the
	 *       "__Plugin_Name_Class___Rest" class.
	 */
	public __Plugin_Name_Class___Rest $rest;

	/**
	 * @var __Plugin_Name_Class___Shortcode $shortcode Instance of the
	 *        "__Plugin_Name_Class___Shortcode" class.
	 */
	public __Plugin_Name_Class___Shortcode $shortcode;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout
	 * the plugin. Load the dependencies, define the locale, and set the hooks
	 * for the admin area and the public-facing side of the site.
	 */
	public function __construct() {
		$this->load_instances();
	}

	/**
	 * Run the loader to execute all the hooks with WordPress.
	 *
	 * @return void
	 */
	public function run(): void {
		$this->loader->run();
	}

	/**
	 * Returns parameter by the given key if it exists.
	 *
	 * @param  string  $key
	 *
	 * @return string
	 */
	public function load_param( string $key ): string {
		$params = $this->get_config( 'params' );

		if ( empty( $params[ $key ] ) ) {
			wp_die( __( 'Cannot find any parameter name: ' . $key,
				$this->plugin_info['plugin_text_domain'] ) );
		}

		return $params[ $key ];
	}

	/**
	 * Create an instance of all dependencies.
	 *
	 * @return void
	 */
	private function load_instances(): void {
		$this->load_dependencies();
		$this->switcher  = new __Plugin_Name_Class___Switcher();
		$this->loader    = new __Plugin_Name_Class___Loader();
		$this->database  = new __Plugin_Name_Class___Database();
		$this->admin     = new __Plugin_Name_Class___Admin();
		$this->client    = new __Plugin_Name_Class___Client();
		$this->i18n      = new __Plugin_Name_Class___I18n();
		$this->ajax      = new __Plugin_Name_Class___Ajax();
		$this->cron      = new __Plugin_Name_Class___Cron();
		$this->helper    = new __Plugin_Name_Class___Helper();
		$this->model     = new __Plugin_Name_Class___Model();
		$this->rest      = new __Plugin_Name_Class___Rest();
		$this->shortcode = new __Plugin_Name_Class___Shortcode();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @return void
	 */
	private function load_dependencies(): void {
		$dependencies = $this->get_config( 'dependencies' );

		foreach ( $dependencies as $dependency ) {
			$dependency_path = plugin_dir_path( __FILE__ ) . $dependency;

			if ( ! file_exists( $dependency_path ) ) {
				wp_die( __( 'The dependency: "' . $dependency_path . '" does not exists.',
					$this->plugin_info['plugin_text_domain'] ) );
			}

			require_once $dependency_path;
		}
	}

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
		$config_path    = $container_path . $this->plugin_info['plugin_prefix'] . '-' . $config_name . '.php';

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