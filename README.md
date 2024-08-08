# WP PLUGIN SKELETON

Simple skeleton to help create WordPress plugins rapidly. I make this skeleton to resolve some of my freelance projects.
Everything in this repository is just my favourite when doing WP job. So, maybe it does not fit your case, just find
another beautiful boilerplate outside.

## Installation

First, Clone this repository

```
$ git clone git@github.com:m397dev/wp-plugin-skeleton.git
```

Second, you need defines some config in "ROOT_DIR/prepare.php" file

```
<?php

return [
    'preg' => [
        '__plugin_name__' => 'plugin-name',
        '__plugin_name_function__' => 'plugin_name',
        '__Plugin_Name_Class__' => 'Plugin_Name',
    ],
];
```

* preg: this array contains the file name, function name and class name that will generate when initialization.
* preg[__plugin_name__]:           Define the plugin's file prefix.
* preg[__plugin_name_function__]:  Define the plugin's function prefix.
* preg[__Plugin_Name_Class__]:     Define the plugin's class prefix

The skeleton has defined all the default containers ("container" is the folder inside the "src" folder, that contains
all PHP files that need to
be included during the plugin runs).

So, if you have something new, then you want to load them, just define in the "prepare.php" file.

```
<?php

return [
    'preg' => [],
    'containers' => [
    ...
    'your_container_name',
    ...
    ]
];
```

Next, you should change the "plugin-readme" file. This file contains the README.txt content of this plugin.

WP Readme is running PHP WASM and WordPress in your browser to help you live preview and validate your
readme.txt files as if they were already published in the WordPress.org plugins directory!

After that, open terminal then run command:

```
$ php serve init
```

And maybe, in some cases, you need to change permission for "tmp" and "writable" folders.
Run the command below to do that:

```
$ sudo chmod -R 775 /tmp
$ sudo chmod -R 775 /writable
```

That all.
