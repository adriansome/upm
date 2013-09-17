<?php 
$this->widget('TbButton',array(
    'type'=>'primary',
    'label' => 'edit',
    'size' => 'small',
    'url' => Yii::app()->createUrl('/block/management/update/id/'.$this->id),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#block-'.$this->id.'-management',
        'id'=>'edit-block-'.$this->id,
	),
));
?>