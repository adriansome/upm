<?php
// Import config arrays from included application modules. 
$modules_dir = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR;
$handle = opendir($modules_dir);

while (false !== ($file = readdir($handle)))
{   
    if ($file != "." && $file != ".." && is_dir($modules_dir . $file))
        $config = CMap::mergeArray($config, require($modules_dir . $file . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'main.php'));
}

closedir($handle);