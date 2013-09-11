<?php
$module_name = basename(dirname(dirname(__FILE__)));
$default_controller = false;
 
return array(
    'import' => array(
        'application.modules.' . $module_name . '.models.*',
        'application.modules.' . $module_name . '.components.*',
        'application.modules.' . $module_name . '.widgets.*'
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
                // $module_name . '/<action:\w+>/<id:\d+>' => $module_name . '/' . $default_controller . '/<action>',
                // $module_name . '/<action:\w+>' => $module_name . '/' . $default_controller . '/<action>',
            ),
        ),
    ),
);