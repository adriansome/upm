<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

// Setup path aliases for accessing 3rd party vendor extensions and libraries.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../vendors/bootstrap');
Yii::setPathOfAlias('mail', dirname(__FILE__).'/../vendors/mail');
Yii::setPathOfAlias('tinymce', dirname(__FILE__).'/../vendors/tinymce');
Yii::setPathOfAlias('filemanager', dirname(__FILE__).'/../vendors/filemanager');

// Main application config.
$config = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	'name'=>'Avalon Marshes',

	// set site/app theme here
	'theme'=>'avalon',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'bootstrap.components.*',
		'bootstrap.widgets.*',
		'application.helpers.*',
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

		'image'=>array(
          'class'=>'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver'=>'GD',
            // ImageMagick setup path
            'params'=>array('directory'=>'/opt/local/bin'),
        ),

		'mail' => array(
 			'class' => 'YiiMail',
 			'transportType' => 'php',
 			'logging' => true,
 			'dryRun' => false
 		),

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=avalonrob',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
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
            3=>array(
                'name'=>'submenu',
                'maxDepth'=>3,
            ),
        ),
	),
);

// Import installed module conifgs.
require_once('modules.php');



// Return compiled application conifg.
return $config;
