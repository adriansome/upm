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
        'urlManager' => array(
            'rules' => array(
                $module_name . '/management' => $module_name . '/management/index',
                $module_name . '/management/<action:\w+>/<msgId:\d+>' => $module_name . '/management/<action>',
                $module_name . '/management/<action:\w+>/<name:.+>' => $module_name . '/management/<action>',
            ),
        ),
    ),
    
    'params' => array(
        'coreManagementActions' => array(
            'Message Centre' => array('/messaging/management')
        )
    )
);