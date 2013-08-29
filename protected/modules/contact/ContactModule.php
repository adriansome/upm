<?php

class ContactModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

	public function getAssets()
	{
		return Yii::app()->getAssetManager()->publish(
    		Yii::getPathOfAlias('application.modules.contact.assets')
    	);
	}
}
