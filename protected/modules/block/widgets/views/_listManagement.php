<?php 
$this->widget('TbButton',array(
    'type'=>'link',
    'label' => 'edit',
    'url' => Yii::app()->createUrl($this->id.'/management'),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#'.$this->id.'-management',
        'id'=>'edit-'.$this->id,
	),
));
?>