<?php

declare( strict_types=1 );

if ( isset( $argv[1] ) && function_exists( $argv[1] ) ) {
	$parameters = array_slice( $argv, 2 );
	call_user_func( $argv[1], ...$parameters );
}

/**
 * Initialization.
 *
 * @return void
 *
 * @since 1.0.0
 */
function init(): void {
	$config = require_once __DIR__ . '/prepare.php';
	$result = [];
	console_log( 'Scanning...' );

	foreach ( $config['containers'] as $container ) {
		$container_path = __DIR__ . '/src/' . $container;
		if ( is_dir( $container_path ) ) {
			$files = array_diff( scandir( $container_path ), [ '.', '..' ] );

			foreach ( $files as $file ) {
				$file_path = $container_path . '/' . $file;

				if ( is_file( $file_path ) && pathinfo( $file_path )['extension'] === 'php' ) {
					generate( $config, $file_path );
					$result['success'][] = $container;
				}
			}
		} else {
			$result['failed'][] = $container;
			console_log( 'Could not find container: ' . $container, 1 );
		}
	}

	generate( $config, __DIR__ . '/__plugin_name__.php' );
	console_log( 'Completed!' );

	$readme_path    = __DIR__ . '/plugin-readme';
	$readme_content = file_get_contents( $readme_path );
	file_put_contents( __DIR__ . '/README.md', $readme_content );
	unset( $readme_path );
	rename( __DIR__ . '/README.md', __DIR__ . '/README.txt' );

	result( $result );
}

/**
 * Generation.
 *
 * @param  array  $config  The prepare configuration.
 * @param  string  $file_path  The absolute path to the given file.
 *
 * @return void
 *
 * @since 1.0.0
 */
function generate(
	array $config,
	string $file_path,
): void {
	$preg_keys    = array_keys( $config['preg'] );
	$preg_values  = array_values( $config['preg'] );
	$file_content = file_get_contents( $file_path );
	$new_content  = str_replace( $preg_keys, $preg_values, $file_content );
	$new_name     = str_replace( $preg_keys[0], $preg_values[0], $file_path );
	file_put_contents( $file_path, $new_content );
	rename( $file_path, $new_name );
}

/**
 * Display log message to the console.
 *
 * @param  string  $message  Message that will be displayed.
 * @param  int  $type  Message type
 *
 * @return void
 *
 * @since 1.0.0
 */
function console_log( string $message, int $type = 0 ): void {
	$status = match ( $type ) {
		0 => '[INFO]',
		1 => '[ERROR]',
		default => '[WARNING]',
	};

	echo "$status $message" . PHP_EOL;
}

/**
 * Display console result.
 *
 * @param  array  $result  Result list.
 *
 * @return void
 *
 * @since 1.0.0
 */
function result( array $result ): void {
	echo "\n";
	echo "=============== RESULTS ============== \n";
	echo "SUCCESS --------------- \n";
	echo isset( $result['success'] ) ? count( $result['success'] ) : 0;
	echo " success \n";
	echo "====================================== \n";
	echo "FAILED ---------------- \n";
	echo isset( $result['failed'] ) ? count( $result['failed'] ) : 0;
	echo " failed \n";
	echo "=============== ENDS ================= \n";
	echo "\n";
}