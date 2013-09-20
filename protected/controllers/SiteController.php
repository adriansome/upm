<?php

class SiteController extends Controller
{
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when the page module is not loaded and an action 
	 * is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(is_file($this->viewPath.'/index.php'))
		{
			$this->render('index');
		}
		else
			throw new CHttpException(404, 'Not Found.');
	}

	/**
	 * This is the action will setup the CMS for a new site.
	 * Comment this action to disable CMS setup in a production environment.
	 */
	public function actionSetup()
	{
		if(is_file($this->viewPath.'/setup.php'))
		{
			$this->render('setup');
		}
		else
			throw new CHttpException(404, 'Not Found.');
	}

	public function actionFilemanager()
	{
		$this->renderPartial('filemanager');
	}
}