<?php
$module_name = basename(dirname(dirname(__FILE__)));
$default_controller = 'default';
 
return array(
    // set site home page to managed template.
    'defaultController' => $module_name . '/' . $default_controller . '/view/link/home',

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
            'class'=>'EDbUrlManager',
            'rules' => array(
                $module_name . '/management' => $module_name . '/management/index',
                $module_name . '/management/<activeId:\d+>' => $module_name . '/management/index',
                $module_name . '/management/<action:\w+>/<id:\d+>' => $module_name . '/management/<action>',
                $module_name . '/<action:\w+>/<id:\d+>' => $module_name . '/' . $default_controller . '/<action>',
                $module_name . '/<action:\w+>' => $module_name . '/' . $default_controller . '/<action>',
                '<link:[\s\S]+>'=>array(
                    $module_name . '/' . $default_controller . '/' . 'view',
                    'type'=>'db',
                    'fields'=>array(
                        'link'=>array(
                            'table'=>'page',
                            'field'=>'link'
                        ),
                    ),
                ),
            ),
        ),
    ),
);