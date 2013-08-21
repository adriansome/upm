<?php
$module_name = basename(dirname(dirname(__FILE__)));
$default_controller = 'default';
 
return array(
    'import' => array(
        'application.modules.' . $module_name . '.models.*',
        'application.modules.' . $module_name . '.components.*',
        'application.modules.' . $module_name . '.extensions.*',
    ),
    
    'modules' => array(
        $module_name => array(
            'defaultController' => $default_controller,
        ),
    ),
    
    'components' => array(
        'user'=>array(
            'class'=>'WebUser',
            'loginUrl'=>array('user/login'),
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),
        'urlManager' => array(
            'rules' => array(
                $module_name . '/<action:\w+>/<id:\d+>' => $module_name . '/' . $default_controller . '/<action>',
                $module_name . '/<action:\w+>' => $module_name . '/' . $default_controller . '/<action>',
            ),
        ),
    ),

    'params'=>array(
        'phpass'=>array(
            'iteration_count_log2'=>8,
            'portable_hashes'=>false,
        ),
    ),
);