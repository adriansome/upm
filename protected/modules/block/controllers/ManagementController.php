<?php

class ManagementController extends BlockController
{
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
	public function actionCreate($type,$name)
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

		$this->renderPartial('create',array(
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
		if(Yii::app()->request->urlReferrer !== $this->currentUrl)
			Yii::app()->user->setReturnUrl(Yii::app()->request->urlReferrer);

		$block=$this->loadModel($id);
		$contents = $block->contents;

		if(isset($_POST['Content']))
		{
			// Forever an optimist.. Presume everything will save without error.
			$contentSaved = true;
			$response = array();

			foreach($_POST['Content'] as $index => $content)
			{
				$contents[$index]->attributes = $content;
				
				// If any content cannot be saved set $contentSaved flag to false.
				if(!$contents[$index]->save())
					$contentSaved = false;
			}

			if($contentSaved)
				$response['success'] = $block->name.' has been saved.';
			else
				$response['error'] = $block->name.' could not be saved.';
			
			echo json_encode($response);
			exit;
		}

		$form = new CActiveForm;
		$fields = array();

		foreach($contents as $index=>$content)
		{
			$fields[$content->name] = array(
				'label'=>CHtml::label(ucfirst($content->name), "Content[$index][string_value]"),
				'validation'=>$form->error($content,"[$index]string_value"),
			);

			switch ($content->type->name)
			{
				case 'singleline':
					$fields[$content->name]['input']=$form->textField($content,"[$index]string_value",array('size'=>60,'maxlength'=>140));
					break;

				case 'multiline':
					$fields[$content->name]['input']=$form->textArea($content,"[$index]string_value",array('rows' => 6, 'cols' => 50));
					break;

				case 'html':
					$fields[$content->name]['input']=$form->textArea($content,"[$index]string_value",array('class'=>'tinymce-editor'));
					break;

				case 'file':
					$fields[$content->name]['input']=$this->renderPartial('_fileField', array(
						'form'=>$form,
						'index'=>$index,
						'content'=>$content,
					), true, true);
					break;

				case 'date':
					$fields[$content->name]['input']=$this->createWidget('zii.widgets.jui.CJuiDatePicker',array(
					    'model'=>$content,
					    'attribute'=>"[$index]date_value",
					));
					break;

				case 'boolean':
					$fields[$content->name]['input']=$form->checkBox($content,"[$index]boolean_value");
					break;
				
				default:
					throw new CHttpException(500, 'Unknown content type "'.$content->type->name.'"');
			}
		}

		$this->performAjaxValidation($block);

		$this->renderPartial('update',array(
			'block'=>$block,
			'fields'=>$fields,
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
	public function actionList($list)
	{
		$id = str_replace(' ', '-', $list);

		$dataProvider=new CActiveDataProvider('Block', array(
		    'criteria'=>array(
		        'condition'=>'t.name LIKE "'.$list.' item%"',
		        'with'=>array('contents'),
		    ),
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));

		$this->renderPartial('listItems',array(
			'dataProvider'=>$dataProvider,
			'name'=>$list,
			'id'=>$id,
		));
	}

	public function actionArea($id)
    {
    	$model = Area::model()->findByPk($id);
    	$block = $model->blocks;

    	$this->renderPartial('areaBlocks');
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
