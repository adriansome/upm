<?php

class ManagementController extends BlockController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/single';

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
	public function accessRules() {
        return array(
            array('allow',
                'users'=>array('@'),
                'roles' => array('admin'),
            ),
            array('allow',
                'actions'=>array('index','create','update','delete'),
                'users'=>array('@'),
                'roles' => array('editor'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Block;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Block']))
		{
			$model->attributes=$_POST['Block'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Block']))
		{
			$model->attributes=$_POST['Block'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$inputs = array();

		 $form=$this->beginWidget('CActiveForm', array(
			'id'=>'block-form',
			'enableAjaxValidation'=>true,
		));

		foreach($model->contents as $content)
		{
			switch ($content->type->name) {
				case 'singleline':
					$inputs[$content->name] = array(
						'label'=>$form->labelEx($content,'string_value'),
						'field'=>$form->textField($content,'string_value',array('size'=>60,'maxlength'=>140)),
						'validation'=>$form->error($content,'string_value'),
					);
					break;

				case 'multiline':
					$inputs[$content->name] = '';
					break;

				case 'html':
					$inputs[$content->name] = '';
					break;

				case 'file':
					$inputs[$content->name] = '';
					break;

				case 'date':
					$inputs[$content->name] = '';
					break;

				case 'boolean':
					$inputs[$content->name] = '';
					break;
				
				default:
					throw new CHttpException(500, 'Unknown content type "'.$content->type->name.'"');
			}
		}

		$this->performAjaxValidation($model);

		$this->render('update',array(
			'models'=>$model->contents,
			'inputs'=>$inputs,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Block');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Block the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Block::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Block $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='block-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
