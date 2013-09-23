<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../vendors/bootstrap');
Yii::setPathOfAlias('mail', dirname(__FILE__).'/../vendors/mail');
Yii::setPathOfAlias('tinymce', dirname(__FILE__).'/../vendors/tinymce');
Yii::setPathOfAlias('filemanager', dirname(__FILE__).'/../vendors/filemanager');
Yii::setPathOfAlias('caroufredsel', dirname(__FILE__).'/../vendors/caroufredsel');

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
		'bootstrap.components.*',
		'bootstrap.widgets.*',
		'caroufredsel.*',
		'mail.*',
	),

	'modules'=>array(
		// comment the following to disable the Gii tool (do not enable Gii in production env.)
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'fanatic',
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
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
				'welcome'=>'site/index',
				'setup'=>'site/setup',
			),
		),

		'mail' => array(
 			'class' => 'YiiMail',
 			'transportType' => 'php',
 			'logging' => true,
 			'dryRun' => false
 		),

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=fanatic',
			'emulatePrepare' => true,
			'username' => 'fanatic',
			'password' => 'fanatic',
			'charset' => 'utf8',
		),

		'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),

        'utility'=>array(
        	'class'=>'Utility',
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
				
				/*array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'mail@mattbiddle.cc',
		'overlayAdmin'=>false,
		'maxDepth'=>3,
        'menus'=>array(
            1=>array(
                'name'=>'mainmenu',
                'maxDepth'=>3,
            ),
            2=>array(
                'name'=>'footer',
                'maxDepth'=>1,
            ),
        ),
	),
);

require_once('modules.php');

return $config;