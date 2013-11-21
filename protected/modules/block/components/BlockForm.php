<?php

class BlockForm
{
    public $attributes;
    public $name;
    public $scope;
    public $url;
    public $parts = array();
    
    
    public function __construct($item = '')
    {
        if(!empty($item))
        {
            $listWidget = new ListWidget();
            $listWidget->name = $item;
            $listWidget->init();
            $this->name = $item.' item';
            $this->scope = 'section';

            $this->attributes = $listWidget->itemAttributes();
            unset($listWidget);
            
            $this->url = '/'.$item.'/management/item';
        }
    }
    
    public function fetchFormParts()
    {     
    	$block = new Block;
		$block->name = $this->name;
		$block->scope = $this->scope;

		$contents = array(); $i = 0;

		foreach($this->attributes as $attribute=>$definition)
		{
			$contents[$i] = new Content;
			$contents[$i]->name = $attribute;
			$contents[$i]->block_id = $block->id;
			$contents[$i]->type_id = ContentType::model()->findByAttributes(array('name'=>$definition['type']))->id;
			$i++;
		}
        
        $form = new CActiveForm;

		foreach($contents as $index=>$content)
		{            
            if(isset($this->attributes[$content->name]['label']) && !empty($this->attributes[$content->name]['label']))
            {
                $label = $this->attributes[$content->name]['label'];
            }
            else
            {
                $label = $content->name;
            }  

			$this->parts[$content->name] = array(
				'label'=>CHtml::label(ucfirst($label), "Content[$index][string_value]"),
				'validation'=>$form->error($content,"[$index]string_value"),
			);

			switch ($content->type->name)
			{
				case 'singleline':
					$this->parts[$content->name]['input']=$form->textField($content,"[$index]string_value",
							array('size'=>60,'maxlength'=>140, 'data-name'=>$content->name));
					break;

				case 'multiline':
					$this->parts[$content->name]['input']=$form->textArea($content,"[$index]string_value",array('rows' => 6, 'cols' => 50));
					break;

				case 'html':
					$this->parts[$content->name]['input']=$form->textArea($content,"[$index]string_value",array('class'=>'tinymce-editor'));
					break;

				case 'image':
					$this->parts[$content->name]['input']=$form->hiddenField($content, "[$index]file_value");
					break;

				case 'file':
                    //TODO
					/*$this->parts[$content->name]['input']=$this->renderPartial('_fileField', array(
						'form'=>$form,
						'index'=>$index,
						'content'=>$content,
					), true, true);*/
					break;

				case 'date':
                    //TODO
					/*$this->parts[$content->name]['input']=Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker',array(
                                            'model'=>$content,
					    'attribute'=>"[$index]date_value",
                                            'htmlOptions'=>array(
                                                'class'=>'datepicker'
                                            )
					));*/
					break;

				case 'list':
					$this->parts[$content->name]['input']=CHtml::dropDownList('Content['.$index.'][string_value]','', $this->attributes[$content->name]['values']);
					break;

				case 'boolean':
					$this->parts[$content->name]['input']=$form->checkBox($content,"[$index]boolean_value");
					break;

				case 'hidden':
                    $default = (isset($this->attributes[$content->name]['default'])) ? $this->attributes[$content->name]['default'] : '';
					// Don't display a label for a hidden field
					$this->parts[$content->name]['label'] = '';
					$this->parts[$content->name]['input']=$form->hiddenField($content,"[$index]string_value",
						array('data-name' => $content->name, 'value' => $default));
					break;				
				
				default:
					throw new CHttpException(500, 'Unknown content type "'.$content->type->name.'"');
			}
		}        
    }

}

?>
