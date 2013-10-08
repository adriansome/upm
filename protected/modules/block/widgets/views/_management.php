<?php 
$this->widget('TbButton',array(
    'type'=>'link',
    'label' => 'edit',
    'url' => Yii::app()->createUrl('/block/management/update/'.$this->dbID),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#block-management',
        'id'=>'edit-block-'.$this->id,
        'class'=>'in-page-edit',
	),
));
?>
