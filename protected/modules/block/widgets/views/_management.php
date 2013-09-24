<?php 
$this->widget('TbButton',array(
    'type'=>'link',
    'label' => 'edit',
    'url' => Yii::app()->createUrl('/block/management/update/id/'.$this->id),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#block-management',
        'id'=>'edit-block-'.$this->id,
	),
));
?>