<?php
$module_name = basename(dirname(dirname(__FILE__)));
$default_controller = false;

// $listsDir = dirname(dirname(dirname(dirname(dirname(__FILE__))))).DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.$config['theme'].DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'lists'.DIRECTORY_SEPARATOR;
// $handle = opendir($listsDir);
// $listManagementActions = array();
// $lists = array();

// while(false !== ($file = readdir($handle)))
// {
//     if ($file != "." && $file != ".." && is_dir($listsDir . $file))
//     {
//         $listManagementActions[ucfirst($file).' Management'] = array('/'.$file.'/management');
//         $lists[] = $file;
//     }
// }
 
return array(
    'import' => array(
        'application.modules.' . $module_name . '.models.*',
        'application.modules.' . $module_name . '.components.*',
        'application.modules.' . $module_name . '.widgets.*'
    ),
    
    'modules' => array(
        $module_name => array(),
    ),
    
    'components' => array(
        'urlManager' => array(
            'rules' => array(
                // '<list:('.implode('|', $lists).')>/management' => $module_name . '/management/list',
                $module_name . '/management/<action:\w+>/<id:\d+>' => $module_name . '/management/<action>',
                $module_name . '/management/<action:\w+>' => $module_name . '/management/<action>',
            ),
        ),
    ),

    // 'params'=>array(
    //     'managementActions'=>$listManagementActions,
    // ),
);