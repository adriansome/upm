<?php 
$this->widget('TbButton',array(
    'type'=>'link',
    'label' => 'edit',
    'url' => Yii::app()->createUrl($this->name.'/management'),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#'.str_replace(' ', '-', $this->name).'-management',
        'id'=>'edit-block-'.str_replace(' ', '-', $this->name),
	),
));
?>