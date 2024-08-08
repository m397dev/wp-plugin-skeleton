<?php

/**
 * Prepare for plugin initialization.
 *
 * preg: this array contains the file name, function name and class name that
 * will generate when initialization.
 *
 * preg[__plugin_name__]:           Define the plugin's file prefix.
 * preg[__plugin_name_function__]:  Define the plugin's function prefix.
 * preg[__Plugin_Name_Class__]:     Define the plugin's class prefix
 *
 * containers: This array contains all the containers that need to be scanned
 * in the src folder.
 *
 * @since 1.0.0
 */
return [
	'preg'       => [
		'__plugin_name__'          => 'plugin-name',
		'__plugin_name_function__' => 'plugin_name',
		'__Plugin_Name_Class__'    => 'Plugin_Name',
	],
	'containers' => [
		'config',
		'includes',
		'includes/admin',
		'includes/ajax',
		'includes/client',
		'includes/cron',
		'includes/helpers',
		'includes/models',
		'includes/rest',
		'includes/shortcodes',
	],
];