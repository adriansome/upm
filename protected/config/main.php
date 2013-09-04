<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'The New Fridge',

	// set site/app theme here
	'theme'=>'new_fridge',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.mail.*',
	),

	'modules'=>array(
		// comment the following to disable the Gii tool (do not enable Gii in production env.)
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'fanatic',
			// if removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','33.33.33.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'caseSensitive'=>false,
			'rules'=>array(
				'setup'=>'site/setup',
				'home'=>'site/index',
			),
		),
		'mail' => array(
 			'class' => 'YiiMail',
 			'transportType' => 'php',
 			'logging' => true,
 			'dryRun' => false
 		),
		// uncomment the following to use an SQLite database
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=fanatic',
			'emulatePrepare' => true,
			'username' => 'fanatic',
			'password' => 'fanatic',
			'charset' => 'utf8',
		),	
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'mail@mattbiddle.cc',
		'overlayAdmin'=>false,
	),
);

// Import config arrays from included application modules. 
$modules_dir = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR;
$handle = opendir($modules_dir);

while (false !== ($file = readdir($handle))) {
    
    if ($file != "." && $file != ".." && is_dir($modules_dir . $file))
        $config = CMap::mergeArray($config, require($modules_dir . $file . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php'));
}
closedir($handle);

//echo '<pre>'.print_r($config,1).'</pre>'; exit;

return $config;