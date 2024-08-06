<?php

declare( strict_types=1 );

/**
 * Fired when the plugin is uninstalled.
 *
 * @package    plugin-name
 *
 * @since      1.0.0
 */
if ( ! function_exists( 'plugin_name_uninstall' ) ) {
	/**
	 * Handle the uninstallation work-flow of this plugin.
	 *
	 * @return void
	 */
	function plugin_name_uninstall(): void {
		if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
			exit();
		}
	}

	plugin_name_uninstall();
}