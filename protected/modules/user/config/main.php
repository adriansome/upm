<?php
$module_name = basename(dirname(dirname(__FILE__)));
$default_controller = 'default';
 
return array(
    'import' => array(
        'application.modules.' . $module_name . '.models.*',
        'application.modules.' . $module_name . '.components.*',
    ),
    
    'modules' => array(
        $module_name => array(
            'defaultController' => $default_controller,
        ),
    ),
    
    'components' => array(
        'user'=>array(
            'class'=>'WebUser',
            'loginUrl'=>array('login'),
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        'urlManager' => array(
            'rules' => array(
                $module_name . '/management' => $module_name . '/management/index',
                'adminzone' => $module_name  . '/' . $default_controller . '/login/page/adminzone',
                '<action:(register|login|profile|logout|registrationsuccess)>' => $module_name . '/'. $default_controller . '/<action>',
                'login/forgotten-credentials' => $module_name . '/'. $default_controller . '/forgottenCredentials',
                'login/forgotten-credentials/reminder-sent' => $module_name . '/'. $default_controller . '/reminderSent',
                $module_name . '/<action:(validate|resetPassword|revertDelete|revertEmail)>/<uid:[a-zA-Z0-9]+>' => $module_name . '/' . $default_controller . '/<action>',
                $module_name . '/<action:\w+>' => $module_name . '/' . $default_controller . '/<action>',
            ),
        ),
    ),

    'params'=>array(
        'phpass'=>array(
            'iteration_count_log2'=>8,
            'portable_hashes'=>false,
        ),
        'coreManagementActions'=>array(
        	'User Management'=>array('/user/management')
        ),
    ),
);
