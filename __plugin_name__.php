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

require_once plugin_dir_path( __FILE__ ) . 'src/includes/class-__plugin_name__.php';

$__plugin_name__ = new __Plugin_Name_Class__( __FILE__ );
$__plugin_name__->run();