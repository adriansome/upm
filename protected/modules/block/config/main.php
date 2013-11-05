<?php
$module_name = basename(dirname(dirname(__FILE__)));
$default_controller = false;

$listsDir = dirname(dirname(dirname(dirname(dirname(__FILE__))))).DIRECTORY_SEPARATOR.'themes'.DIRECTORY_SEPARATOR.$config['theme'].DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'lists'.DIRECTORY_SEPARATOR;
$handle = opendir($listsDir);
$listManagementActions = array();
$lists = array();

foreach(glob($listsDir.'*') as $file)
// while(false !== ($file = readdir($handle)))
{
    if ($file != "." && $file != ".." && is_dir($file))
    {
    	$path = explode(DIRECTORY_SEPARATOR, $file);
        $file = end($path);
    	$listManagementActions[ucwords($file).' Management'] = array('/'.$file.'/management');
        $lists[] = $file;
    }
}

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
                '<list:('.implode('|', $lists).')>/management' => $module_name . '/management/list',
                '<list:('.implode('|', $lists).')>/management/item' => $module_name . '/management/item',
                'area/management' => $module_name . '/management/area',
                'area/management/nugget' => $module_name . '/management/nugget',
                $module_name . '/management/<action:\w+>/<id:\d+>' => $module_name . '/management/<action>',
                $module_name . '/management/<action:\w+>' => $module_name . '/management/<action>',
                'thumbs/<url:.+>'=>'block/resources/thumbs',
                'browse/<index:\d+>/landlord/<subfolder:\w+>'=>'block/resources/browse',
                'upload/<subfolder:\w+>/'=>'block/resources/upload',
                'list/<subfolder:\w+>/'=>'block/resources/list',
            ),
        ),
    ),

    'params'=>array(
        'managementActions'=>$listManagementActions,
    ),
);
