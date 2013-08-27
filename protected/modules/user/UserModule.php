<?php

class UserModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'user.models.*',
			'user.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			if(($action->id != 'registrationSuccess' && $action->id != 'resendEmailVerification') && isset(Yii::app()->session['referer']) && (Yii::app()->session['referer']['action'] == 'registrationSuccess' || Yii::app()->session['referer']['action'] == 'sendEmailVerification'))
				unset(Yii::app()->session['referer']);
			
			return true;
		}
		else
			return false;
	}
}
