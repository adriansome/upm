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
                'actions'=>array('index','create','update','delete','list',
                                'item', 'loadCountryList', 'loadRegionList',
                                'loadCountryRegion'),
                'users'=>array('@'),
                'roles' => array('landlord'),
            ),
            array('allow',
                'actions' => array('item','update'),
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
            $contentType = ContentType::model()->findByAttributes(array('name'=>$definition['type']));
            if ($contentType === null) {
                throw new Exception($definition['type'] . " is not a valid content type");
            }
			$contents[$i] = new Content;
			$contents[$i]->name = $attribute;
			$contents[$i]->block_id = $block->id;
			$contents[$i]->type_id = $contentType->id;
			$i++;
		}
		
		if(isset($data['Content']))
		{
			// Forever an optimist.. Presume everything will validate without error.
			$contentValidates = true;
			$response = array();
            $countryId = $regionId = 0;
			
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
				} else if ($fieldName == 'arrival_date') {
                    // check it's set after today         
                    $arrival_date = $content[$fieldType[0]];
                    if($content[$fieldType[0]] < date('Y-m-d H:m:s'))
                    {
                        $contentValidates = false;
                    }                
				} else if ($fieldName == 'departure_date') {
                    // check it's set after arrival
                    if($content[$fieldType[0]] < $arrival_date)
                    {
                        $contentValidates = false;                        
                    }
                } else if ($fieldName == 'country') {
                    $countryId = $value[0];
                } else if ($fieldName === 'region') {
                    $regionId = $value[0];
                }
				
				$contents[$index]->attributes = $content;
				// If any content is not valid set $contentSaved flag to false.
				if(!$contents[$index]->validate()) {
					$contentValidates = false;
                }
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
                // Check if this is a properties item and link ID to country / region
                if ($block->name === 'properties item') {
                    Yii::app()->db->createCommand()->insert('property_country',
                        array(
                            'property_id' => $block->id,
                            'country_id' => $countryId,
                            'region_id' => $regionId
                        )
                    );
                }

				$response['success'] = $block->name.' has been saved.';
			}
			else
				$response['error'] = $block->name.' contains invalid content';
			
			echo json_encode($response);
			exit;
		}

		$form = new CActiveForm;
		$fields = $sublists = array();

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

				case 'image':
					$fields[$content->name]['input']=$this->renderPartial('_imageField', array(
						'form'=>$form,
						'index'=>$index,
						'content'=>$content,
					), true, true);
					break;

				case 'file':
                    $fields[$content->name]['class'] = 'filemanager-row';
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
                                            'htmlOptions'=>array(
                                                'class'=>'datepicker'
                                            )
					));
					break;

				case 'list':
                    // Get values from database instead of a static list
                    if (isset($attributes[$content->name]['source']) && $attributes[$content->name]['source'] === 'db') {
                        if (isset($attributes[$content->name]['source_url'])) {
                            $actionUrl = 'action' . ucfirst($attributes[$content->name]['source_url']);
                            $attributes[$content->name]['values'] = $this->$actionUrl();
                        }
                    }
                    $htmlOptions = array();
                    // If a sublist has been specified, add it to array so it won't be displayed by default
                    if (isset($attributes[$content->name]['sublist'])) {
                        $sublist = $attributes[$content->name]['sublist'];
                        $sublists[] = $sublist;
                        $htmlOptions = array(
                            'data-child-list' => $sublist
                        );
                    }
                    if (in_array($content->name, $sublists)) {
                        $fields[$content->name]['class'] = 'hidden';
                        $htmlOptions['data-sublist'] = $content->name;
                    }
// 					$fields[$content->name]['input']=$form->listBox($content,"[$index]string_value",'',$attributes[$content->name]['values']);
					$fields[$content->name]['input']=CHtml::dropDownList('Content['.$index.'][string_value]','', $attributes[$content->name]['values'], $htmlOptions);

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
			'url'=>$url
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
        $sublists = array();

		if(isset($_POST['Content']))
		{
			// Forever an optimist.. Presume everything will save without error.
			$contentSaved = true;
			$response = array();
            $countryId = $regionId = null;
			
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
				} else if ($contents[$index]->name == 'arrival_date') {
                    // check it's set after today         
                    $arrival_date = $content[$fieldType[0]];
                    if($content[$fieldType[0]] < date('Y-m-d H:m:s'))
                    {
                        $contentSaved = false;
                    }                
				} else if ($contents[$index]->name == 'departure_date') {
                    // check it's set after arrival
                    if($content[$fieldType[0]] < $arrival_date)
                    {
                        $contentSaved = false;                        
                    }
                } else if ($contents[$index]->name == 'country') {
                    // Check if this is a properties item and link ID to country / region
                    if ($block->name === 'properties item') {
                        Yii::app()->db->createCommand()->update('property_country',
                            array(
                                'country_id' => $value[0],
                            ),
                            'property_id=' . $block->id
                        );
                    }
                } else if ($contents[$index]->name === 'region') {
                    if ($block->name === 'properties item') {
                        Yii::app()->db->createCommand()->update('property_country',
                            array(
                                'region_id' => $value[0]
                            ),
                            'property_id=' . $block->id
                        );
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

				case 'image':
					$fields[$content->name]['input']=$this->renderPartial('_imageField', array(
						'form'=>$form,
						'index'=>$index,
						'content'=>$content,
					), true, true);
					break;

				case 'file':
                    $fields[$content->name]['class'] = 'filemanager-row';
					$fields[$content->name]['input']=$this->renderPartial('_fileField', array(
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

                    // Get values from database instead of a static list
                    if (isset($attributes[$content->name]['source']) && $attributes[$content->name]['source'] === 'db') {
                        if (isset($attributes[$content->name]['source_url'])) {
                            $actionUrl = 'action' . ucfirst($attributes[$content->name]['source_url']);
                            $attributes[$content->name]['values'] = $this->$actionUrl();
                        }
                    }
                    $htmlOptions = array();
                    // If a sublist has been specified, add it to array so it won't be displayed by default
                    if (isset($attributes[$content->name]['sublist'])) {
                        $sublist = $attributes[$content->name]['sublist'];
                        $sublists[] = $sublist;
                        $htmlOptions = array(
                            'data-child-list' => $sublist
                        );
                    }
                    if (in_array($content->name, $sublists)) {
                        $fields[$content->name]['class'] = 'hidden';
                        $htmlOptions['data-sublist'] = $content->name;
                    }                    
					$fields[$content->name]['input']=CHtml::dropDownList('Content['.$index.'][string_value]',$content->string_value, $attributes[$content->name]['values'], $htmlOptions);
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
     * Activate this block
     * If this block is a nugget, add it to the current page
     * 
     * @param int $id
     *      The ID of the block to activate
     */
    public function actionActivate($id, $area=null)
    {
		if(isset($_POST['ajax']))
		{
			$response =array();
            
            // Special case for nuggets
			if (null !== $area) {
                // Create area to block link
                $areaBlock = new AreaBlock();
                $areaBlock->block_id = $id;
                $areaBlock->area_id = $area;
                $areaBlock->save();
            }
            $response['success'] = 'This block has been activated.';
		}
		else
			$response['error'] = 'Invalid request';
        
        echo json_encode($response);
        
    }
    
    /**
     * Deactivate this block
     * If this block is a nugget, remove it from the current page
     * 
     * @param int $id
     *      The ID of the block to activate
     */
    public function actionDeactivate($id, $area=null)
    {
		if(isset($_POST['ajax']))
		{
			$response =array();
            
            // Special case for nuggets
			if (null !== $area) {
                // Remove area to block link
                $areaBlock = AreaBlock::model();
                $areaBlock->deleteByPk(array(
                    'block_id' => $id,
                    'area_id' => $area
                ));
            }
            $response['success'] = 'This block has been deactivated.';
		}
		else
			$response['error'] = 'Invalid request';
        
        echo json_encode($response);
        
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

        // Pull out all nuggets that are set to site wide
		$dataProvider=new CActiveDataProvider('Block', array(
		    'criteria'=>array(
		        'condition'=>'name LIKE "%nugget%" AND `scope` = "site" AND `date_deleted` IS NULL',
		    ),
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));

        // Get all blocks assigned to this area
        $areaBlocks = AreaBlock::model()->findAllByAttributes(array(
            'area_id' => $id
        ));
        
        $tempData = $assignedBlocks = array();
        
        foreach ($areaBlocks as $areaBlock) {
            $assignedBlocks[$areaBlock->block_id] = $areaBlock;
        }
        
        if (!empty($assignedBlocks)) {
            $firstAssignedBlockId = reset($assignedBlocks)->block_id;
        } else {
            $firstAssignedBlockId = null;
        }
        
        // Sort items so that assigned blocks are output first
        $data = $dataProvider->getData();
        foreach ($data as $index => $block) {
            if (isset($assignedBlocks[$block->id])) {
                $tempData[] = $block;
                // Remove from current data array
                unset($data[$index]);
            }
        }
        
        $sortedData = array_merge($tempData, $data);

        if (!empty($data)) {
            $unassignedBlock = current(array_values($data));
            $firstUnassignedBlockId = $unassignedBlock->id;
        } else {
            $firstUnassignedBlockId = null;
        }

        // Put data arrays back together with assigned blocks first
        $dataProvider->setData($sortedData);
        
    	$this->renderPartial('updateArea',array(
    		'dataProvider'=>$dataProvider,
			'name'=>$area,
			'id'=>$areaID,
            'areaId'=>$id,
            'assignedBlocks'=>$assignedBlocks,
            'firstAssignedBlockId' => $firstAssignedBlockId,
            'firstUnassignedBlockId' => $firstUnassignedBlockId
    	));
    }

    public function actionNugget($area)
	{
		$nugget = new Nugget;
		$attributes = $nugget->attributes();

		unset($nugget);

		$name = 'nugget';
		$scope = 'site';
		
		if(isset($_POST['Content']))
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
     * Load country list
     */
    public function actionLoadCountryList()
    {
        $params = array(
            'table' => 'country',
            'key' => 'id',
            'value' => 'name'
        );
        $values = $this->_getDbValues($params);
        
        if (isset($_POST['ajax'])) {
            echo json_encode(array('values' => $values));
        } else {
            return $values;
        }
       
    }
    
    /**
     * Load region list
     */
    public function actionLoadRegionList()
    {        
        $params = array(
            'table' => 'region',
            'key' => 'id',
            'value' => 'name'
        );
        $values = $this->_getDbValues($params);
        
        if (isset($_POST['ajax'])) {
            echo json_encode(array('values' => $values));
        } else {
            return $values;
        }
       
    }
    
    /**
     * Load regions specific to a given country
     */
    public function actionLoadCountryRegion()
    {
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;
        
        
        $command = Yii::app()->db->createCommand()
                    ->select('r.id, r.name')
                    ->from('country_region cr')
                    ->join('region r', 'cr.region_id=r.id')
                    ->where('cr.country_id=?', array($id));    

        $rows = $command->queryAll();
        
        foreach ($rows as $row) {
            $values[$row['id']] = $row['name'];
        }
        
        if (isset($_POST['ajax'])) {
            if (!empty($values)) {
                echo json_encode(array('values' => $values));
            }
        } else {
            return $values;
        }
       
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
    
    /**
     * Retrievs a list of values from the database
     * @param array $params
     *      The parameters array for retrieving values
     *      [table] => The table to retrieve data from
     *      [field] => The field to use as the value field
     */
    private function _getDbValues(array $params = array())
    {
        if (!isset($params['table']) || !isset($params['value'])) {
            throw new Exception("A table and value field must be set for this list");
        }
        $fields = $params['value'];
        if (isset($params['key'])) {
            $fields .= ", " . $params['key'];
        }
        $command = Yii::app()->db->createCommand();
        $command->select($fields)->from($params['table']);
        if (isset($params['condition'])) {
            $command->where($params['condition']);
        }
        $rows = $command->queryAll();
        $values = array();

        if (!empty($rows)) {
            foreach ($rows as $row) {
                if (isset($params['key'])) {
                    $values[$row[$params['key']]] = $row[$params['value']];
                } else {
                    $values[] = $row[$params['value']];
                }
            }
        }
        return $values;
        
    }
}
