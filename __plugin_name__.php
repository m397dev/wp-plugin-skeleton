<?php

declare( strict_types=1 );

/**
 * @wordpress-plugin
 *
 * Plugin Name:         __plugin_name__
 * Plugin URI:          https://example.com
 * Description:         Description.
 * Version:             1.0.0
 * Author:              M397
 * Author URI:          https://example.com/author
 * License:             GPL-3.0+
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.html
 * Requires at least:   6.5
 * Requires PHP:        8.2
 *
 * @package             __plugin_name__
 *
 * @since               1.0.0
 */
if ( ! defined( 'WPINC' ) ) {
	http_response_code( 403 );
	exit();
}

if ( ! function_exists( '__plugin_name_function___activate' ) ) {
	/**
	 * The code that runs during plugin activation.
	 *
	 * @return void
	 */
	function __plugin_name_function___activate(): void {
		$__plugin_name__ = __plugin_name_function_get_instance();
		$__plugin_name__->switcher->activate();
	}
}

if ( ! function_exists( '__plugin_name_function___deactivate' ) ) {
	/**
	 * The code that runs during plugin deactivation.
	 *
	 * @return void
	 */
	function __plugin_name_function___deactivate(): void {
		$__plugin_name__ = __plugin_name_function_get_instance();
		$__plugin_name__->switcher->deactivate();
	}
}

if ( ! function_exists( '__plugin_name_function___init' ) ) {
	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does not affect the page life cycle.
	 *
	 * @return void
	 */
	function __plugin_name_function___init(): void {
		$__plugin_name__ = __plugin_name_function_get_instance();
		$__plugin_name__->run();
	}
}

if ( ! function_exists( '__plugin_name_function_get_instance' ) ) {
	/**
	 * Returns an instance of __Plugin_Name_Class__.
	 *
	 * @return __Plugin_Name_Class__
	 */
	function __plugin_name_function_get_instance(): __Plugin_Name_Class__ {
		require_once plugin_dir_path( __FILE__ ) . 'src/includes/class-__plugin_name__.php';

		return new __Plugin_Name_Class__();
	}
}

register_activation_hook( __FILE__, '__plugin_name_function___activate' );
register_deactivation_hook( __FILE__, '__plugin_name_function___deactivate' );
__plugin_name_function___init();