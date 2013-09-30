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

    protected function create($name, $scope, $attributes, $data=false)
    {
    	$block = new Block;
		$block->name = $name;
		$block->scope = $scope;

		$contents = array(); $i = 0;

		foreach($attributes as $attribute=>$definition)
		{
			$contents[$i] = new Content;
			$contents[$i]->name = $attribute;
			$contents[$i]->block_id = $block->id;
			$contents[$i]->type_id = ContentType::model()->findByAttributes(array('name'=>$definition['type']))->id;
			$i++;
		}

		if(isset($data['Content']))
		{
			// Forever an optimist.. Presume everything will validate without error.
			$contentValidates = true;
			$response = array();

			foreach($data['Content'] as $index => $content)
			{
				$contents[$index]->attributes = $content;
				
				// If any content is not valid set $contentSaved flag to false.
				if(!$contents[$index]->validate())
					$contentValidates = false;
			}

			if($contentValidates)
			{
				$block->save();
				foreach($data['Content'] as $index => $content)
				{
					$contents[$index]->block_id = $block->id;
					$contents[$index]->save();
				}

				$response['success'] = $block->name.' has been saved.';
			}
			else
				$response['error'] = $block->name.' contains invalid content';
			
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

		$this->renderPartial('createBlock',array(
			'block'=>$block,
			'fields'=>$fields,
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

		$this->renderPartial('updateBlock',array(
			'block'=>$block,
			'fields'=>$fields,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		if(isset($_POST['ajax']))
		{
			$response =array();

			if($this->loadModel($_POST['id'])->delete())
				$response['success'] = 'Block has been deleted.';
			else
				$response['error'] = 'Unable to delete block.';
		}
		else
			$response['error'] = 'Invalid request';

		echo json_encode($response);
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

		$this->renderPartial('updateList',array(
			'dataProvider'=>$dataProvider,
			'name'=>$list,
			'id'=>$id,
		));
	}

	public function actionItem($list)
	{
		$listWidget = new ListWidget();
		$listWidget->name = $list;
		$listWidget->init();

		$name = $list.' item';
		$scope = 'section';
		
		$attributes = $listWidget->itemAttributes();
		unset($listWidget);

		if(isset($_POST['Content']))
			$data = $_POST;
		else
			$data = false;
		
		$this->create($name, $scope, $attributes, $data);
	}

	public function actionArea($id)
    {
    	$area = Area::model()->findByPk($id)->name;
    	$areaID = str_replace(' ', '-', $area);

		$dataProvider=new CActiveDataProvider('Block', array(
		    'criteria'=>array(
		    	'join'=>'LEFT JOIN area_block AS a ON a.block_id = t.id',
		        'condition'=>'a.area_id = '.$id,
		    ),
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));

    	$this->renderPartial('updateArea',array(
    		'dataProvider'=>$dataProvider,
			'name'=>$area,
			'id'=>$areaID,
    	));
    }

    public function actionNugget($area)
	{
		$nugget = new Nugget;
		$attributes = $nugget->attributes();
		exit('<pre>'.print_r($attributes,true).'</pre>');
		
		// $block = new Block;

		// if(isset($_POST['Block']))
		// {
		// 	$block->name = $_POST['Block']['name'];
		// 	$block->scope = $_POST['Block']['scope'];

		// }
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
