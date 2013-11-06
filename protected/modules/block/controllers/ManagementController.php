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
                'actions'=>array('index','create','update','delete','list','item'),
                'users'=>array('@'),
                'roles' => array('editor'),
            ),
            array('allow',
                'actions'=>array('index','create','update','delete','list', 'item'),
                'users'=>array('@'),
                'roles' => array('landlord'),
            ),
            array('allow',
                'actions' => array('update'),
                'users' => array('@'),
                'roles' => array('user')
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    protected function create($name, $scope, $attributes, $data=false, $url=false)
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
				$fieldName = $contents[$index]->getAttribute('name');
				$fieldType = array_keys($content);
				$value = array_values($content);

				if($fieldType[0]=='date_value'){
					$content[$fieldType[0]] = date('Y-m-d H:i:s', strtotime($value[0]));
				}
				// Use field as slug
				if ($fieldName == 'title') {
					$slugValue = array($fieldType[0] => Yii::app()->utility->string_to_slug($value[0]));
					// Modify slug data
					$slugContent = array(
						'field_type' 	=> $fieldType[0],
						'value'			=> Yii::app()->utility->string_to_slug($value[0]));
				} else if ($fieldName == 'user_id') {
					// Get field type
					$fieldType = array_keys($content);
					// Alter user ID value
					$content = array($fieldType[0] => Yii::app()->user->id);
				}
				
				$contents[$index]->attributes = $content;
				// If any content is not valid set $contentSaved flag to false.
				if(!$contents[$index]->validate())
					$contentValidates = false;
			}
			
			// Add slug field to content
			if (isset($slugValue) && isset($slugContent)) {
				foreach ($contents as $i => $content) {
					// Find the slug content part of the array
					if ($contents[$i]->name == 'slug') {
						$contents[$i]->attributes = $slugValue;
						$data['Content'][$i][$slugContent['field_type']] = $slugContent['value'];
					}
				}
				
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
            if(isset($attributes[$content->name]['label']) && !empty($attributes[$content->name]['label']))
            {
                $label = $attributes[$content->name]['label'];
            }
            else
            {
                $label = $content->name;
            }  

			$fields[$content->name] = array(
				'label'=>CHtml::label(ucfirst($label), "Content[$index][string_value]"),
				'validation'=>$form->error($content,"[$index]string_value"),
			);

			switch ($content->type->name)
			{
				case 'singleline':
					$fields[$content->name]['input']=$form->textField($content,"[$index]string_value",
							array('size'=>60,'maxlength'=>140, 'data-name'=>$content->name));
					break;

				case 'multiline':
					$fields[$content->name]['input']=$form->textArea($content,"[$index]string_value",array('rows' => 6, 'cols' => 50));
					break;

				case 'html':
					$fields[$content->name]['input']=$form->textArea($content,"[$index]string_value",array('class'=>'tinymce-editor'));
					break;

				case 'file':
					$fields[$content->name]['input']=$this->renderPartial('_imageField', array(
						'form'=>$form,
						'index'=>$index,
						'content'=>$content,
					), true, true);
					break;

				case 'date':
					$fields[$content->name]['input']=$this->createWidget('zii.widgets.jui.CJuiDatePicker',array(
                                            'model'=>$content,
					    'attribute'=>"[$index]date_value",
                                            'htmlOptions'=>array(
                                                'class'=>'datepicker'
                                            )
					));
					break;

				case 'list':
// 					$fields[$content->name]['input']=$form->listBox($content,"[$index]string_value",'',$attributes[$content->name]['values']);
					$fields[$content->name]['input']=CHtml::dropDownList('Content['.$index.'][string_value]','', $attributes[$content->name]['values']);
					break;

				case 'boolean':
					$fields[$content->name]['input']=$form->checkBox($content,"[$index]boolean_value");
					break;

				case 'hidden':
                                        $default = (isset($attributes[$content->name]['default'])) ? $attributes[$content->name]['default'] : '';
					// Don't display a label for a hidden field
					$fields[$content->name]['label'] = '';
					$fields[$content->name]['input']=$form->hiddenField($content,"[$index]string_value",
						array('data-name' => $content->name,
                                                    'value' => $default));
					break;				
				
				default:
					throw new CHttpException(500, 'Unknown content type "'.$content->type->name.'"');
			}
		}

		$this->performAjaxValidation($block);

		$this->renderPartial('createBlock',array(
			'block'=>$block,
			'fields'=>$fields,
			'url'=>$url,
		));
    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$list='')
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
				
				$fieldType = array_keys($content);
				$value = array_values($content);
				if($fieldType[0]=='date_value'){
					$content[$fieldType[0]] = date('Y-m-d H:i:s', strtotime($value[0]));
				}
				if ($contents[$index]->name == 'title') {
					// Take title field and convert to slug
					// Update the slug field from title
					$slugValue = array($fieldType[0] => Yii::app()->utility->string_to_slug($value[0]));
				}
				if ($contents[$index]->name == 'slug') {
					if (isset($slugValue)) {
						$content = $slugValue;
					}
				}
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
        
        if($list != '')
        {
            // get the attributes so we can populate any overriding labels
            $listWidget = new ListWidget();
            $listWidget->name = $list;
            $listWidget->init();

            $attributes = $listWidget->itemAttributes();
            unset($listWidget);            
        }

		foreach($contents as $index=>$content)
		{         
            if(isset($attributes[$content->name]['label']) && !empty($attributes[$content->name]['label']))
            {
                $label = $attributes[$content->name]['label'];
            }
            else
            {
                $label = $content->name;
            }
            
			$fields[$content->name] = array(
				'label'=>CHtml::label(ucfirst($label), "Content[$index][string_value]"),
				'validation'=>$form->error($content,"[$index]string_value"),
			); 

			switch ($content->type->name)
			{
				case 'singleline':
					$fields[$content->name]['input']=$form->textField($content,"[$index]string_value",
							array('size'=>60,'maxlength'=>140,'data-name'=>$content->name));
					break;

				case 'multiline':
					$fields[$content->name]['input']=$form->textArea($content,"[$index]string_value",array('rows' => 6, 'cols' => 50));
					break;

				case 'html':
					$fields[$content->name]['input']=$form->textArea($content,"[$index]string_value",array('class'=>'tinymce-editor'));
					break;

				case 'file':
					$fields[$content->name]['input']=$this->renderPartial('_imageField', array(
						'form'=>$form,
						'index'=>$index,
						'content'=>$content,
					), true, true);
					break;
					
				case 'list':
					$listWidget = new ListWidget();
					$listWidget->name = $list;
					$listWidget->init();
			
					$attributes = $listWidget->itemAttributes();
					unset($listWidget);
		
					$fields[$content->name]['input']=CHtml::dropDownList('Content['.$index.'][string_value]',$content->string_value, $attributes[$content->name]['values']);
// 					$fields[$content->name]['input']='<select><option>Test</option></select>';
					break;

				case 'date':
                                        $listWidget = new ListWidget();
					$listWidget->name = $list;
					$listWidget->init();
			
					$attributes = $listWidget->itemAttributes();
					unset($listWidget);
					$content->date_value = date($attributes[$content->name]['format'], strtotime($content->date_value));
					$fields[$content->name]['input']=$this->createWidget('zii.widgets.jui.CJuiDatePicker',array(
						'model'=>$content,
					    'attribute'=>"[$index]date_value",
					    'options'=>array(
							'dateFormat'=>'dd-mm-yy',
						),
						'htmlOptions'=>array(
                                'class'=>'datepicker'
                                )

					));
					break;

				case 'boolean':
					$fields[$content->name]['input']=$form->checkBox($content,"[$index]boolean_value");
					break;
				
				case 'hidden':
					// Don't display a label for a hidden field
					$fields[$content->name]['label'] = '';
					$fields[$content->name]['input']=$form->hiddenField($content,"[$index]string_value",
						array('data-name' => $content->name));
					break;					
				
				default:
					throw new CHttpException(500, 'Unknown content type "'.$content->type->name.'"');
			}
		}

		$this->performAjaxValidation($block);

		$this->renderPartial('updateBlock',array(
			'block'=>$block,
			'fields'=>$fields,
                        'list' => $list
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
	public function actionList($list, $themeView = null, array $params = array())
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
		
		$view = 'updateList';
		if ($themeView) {
                    $themeName = Yii::app()->theme->getName();
                    $view = 'webroot.themes.' . $themeName . '.views.templates.'. $list;		
		}
		
		$this->renderPartial($view, array(
                    'dataProvider'=>$dataProvider,
                    'params'=>$params,
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
		
		if(isset($_POST['Content'])) {
			$data = $_POST;
		}
		else {
			$data = false;
		}

		$url = '/'.$list.'/management/item';
		
		$this->create($name, $scope, $attributes, $data, $url);
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
		unset($nugget);

		$name = 'New Nugget';
		$scope = 'site';
		
		if(isset($_POST['Block']) && isset($_POST['Content']))
			$data = $_POST;
		else
			$data = false;

		$url = '/block/management/nugget/area/'.$area;
		
		$this->create($name, $scope, $attributes, $data, $url);
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
	
	/**
	 * Generate a slug for this item
	 * Checks for an existing item with the same slug and updates if clashing
	 *
	 * @param $rawSlug
	 * 		The text to be transformed
	 * @param $list
	 * 		The list this item applies to
	 * @param int $iteration
	 * 		How many times has this method been called?
	 * @return string
	 * 		The transformed slug text
	 */
	protected function getSlug($rawSlug, $list, $iteration = 0)
	{

		// Firstly convert text to slug
		$slugText = Yii::app()->utility->string_to_slug($rawSlug);
		
		$sql = "SELECT COUNT(b.`id`) AS slug_count "
			. "FROM block AS b "
			. "LEFT JOIN content AS c "
			. "ON c.`block_id` = b.`id` "
			. "WHERE b.`name` LIKE '{$list}%' "
			. "AND c.`name` = 'slug' "
			. "AND c.`string_value` = '{$slugText}'";
			
		
		$command = Yii::app()->db->createCommand($sql);

		$row = $command->queryRow();
		
		if (isset($row['slug_count']) && $row['slug_count'] >= 1) {
			if ($iteration == 1) {
				$slugText .= $iteration;
			} else if ($iteration > 1) {
				// Remove last character and replace with next iteration
				$slugText = substr($slugText, 0, -1);
				$slugText .= $iteration;
			}
			$slugText = $this->getSlug($slugText, $list, $iteration + 1);
		}
		
		return $slugText;
		
	}
}
