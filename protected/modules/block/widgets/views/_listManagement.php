<?php 
$this->widget('TbButton',array(
    'type'=>'link',
    'label' => 'edit',
    'url' => Yii::app()->createUrl($this->id.'/management'),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#list-management',
        'id'=>'edit-'.$this->id,
        'class'=>'in-page-edit',
	),
));
?>
