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
if ( ! function_exists( '__plugin_name_function___init' ) ) {
	/**
	 * Initialization.
	 *
	 * @return void
	 */
	function __plugin_name_function___init(): void {
		if ( ! defined( 'WPINC' ) ) {
			http_response_code( 403 );
			exit();
		}
	}

	__plugin_name_function___init();
}