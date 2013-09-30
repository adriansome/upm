<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/single',
	 * meaning using a single column layout. See 'protected/views/layouts/single.php'.
	 */
	public $layout='//layouts/single';

	public $bodyId;
	
	public $breadcrumbs=array();

	public function beforeAction($action)
	{
		if(YII_DEBUG)
			Yii::app()->assetManager->forceCopy = true;
		
		if(parent::beforeAction($action))
			return true;
		
		return false;
	}

	public function getCurrentUrl()
	{
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$sp = strtolower($_SERVER["SERVER_PROTOCOL"]);
		$protocol = substr($sp, 0, strpos($sp, "/")) . $s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
	}
}