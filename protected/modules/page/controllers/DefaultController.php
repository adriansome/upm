<?php

class DefaultController extends PageController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout=false;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($link)
	{
		if($link == 'home')
			$link = '/';
		
		$model = $this->loadModel($link);
		Yii::app()->session['page_id'] = $model->id;
		
		// Check if user has permission to view this page.
		if($model->role !== 'all')
		{
			if($model->role === 'guest' && !Yii::app()->user->isGuest)
			{
				if(Yii::app()->user->role !== $model->role && Yii::app()->user->role !== 'editor' && Yii::app()->user->role !== 'admin')
					throw new CHttpException(403, 'You are not authorized to perform this action.');
			}
		}

		$template = '//templates/'.$model->layout;

		$this->render($template, array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Page the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($link)
	{
		$model=Page::model()->findByAttributes(array('link'=>$link));
		
		if(!isset($model))
		{
			$model=OldLink::model()->findByAttributes(array('link'=>$link))->page;

			if(isset($model))
				$this->redirect(Yii::app()->baseUrl.'/'.$model->link, true, 301);
		}

		if(!isset($model) || !$model->active)
			throw new CHttpException(404,'The requested page does not exist.');
		
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Page $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='page-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
