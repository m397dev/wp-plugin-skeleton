<?php

declare( strict_types=1 );

/**
 * Fired when the plugin is uninstalled.
 *
 * @package    __plugin_name__
 *
 * @since      1.0.0
 */
if ( ! function_exists( '__plugin_name_function___uninstall' ) ) {
	/**
	 * Handle the uninstallation work-flow of this plugin.
	 *
	 * @return void
	 */
	function __plugin_name_function___uninstall(): void {
		if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
			exit();
		}
	}

	__plugin_name_function___uninstall();
}