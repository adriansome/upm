<?php 
$this->widget('TbButton',array(
    'type'=>'link',
    'label' => 'edit',
    'url' => Yii::app()->createUrl('#'),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#block-'.$this->id.'-management',
        'id'=>'edit-block-'.$this->id,
	),
));
?>