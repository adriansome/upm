<?php 
$this->widget('TbButton',array(
    'type'=>'link',
    'label' => 'edit',
    'url' => Yii::app()->createUrl('/block/management/list/'.$this->name),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#'.str_replace(' ', '-', $this->name).'-list-management',
        'id'=>'edit-block-'.str_replace(' ', '-', $this->name),
	),
));
?>