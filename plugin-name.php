<?php

declare( strict_types=1 );

/**
 * @wordpress-plugin
 *
 * Plugin Name:         Plugin Name
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
 * @package plugin-name
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'plugin_name_init' ) ) {
	/**
	 * Initialization.
	 *
	 * @return void
	 */
	function plugin_name_init(): void {
		if ( ! defined( 'WPINC' ) ) {
			http_response_code( 403 );
			exit();
		}
	}

	plugin_name_init();
}
