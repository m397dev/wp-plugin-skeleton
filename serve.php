<?php

declare( strict_types=1 );

function init(): void {
	$config = [
		'file_preg'     => '__plugin_name__',
		'function_preg' => '__plugin_name_function__',
		'class_preg'    => '__Plugin_Name_Class__',
	];
}

if ( isset( $argv[1] ) && function_exists( $argv[1] ) ) {
	$parameters = array_slice( $argv, 2 );
	call_user_func( $argv[1], ...$parameters );
}