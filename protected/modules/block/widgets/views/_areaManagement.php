<?php 
$this->widget('TbButton',array(
    'type'=>'link',
    'label' => 'edit',
    'url' => Yii::app()->createUrl('/block/management/area/'.$this->dbID),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#area-management',
        'id'=>'edit-nugget-area',
        'class'=>'in-page-edit',
	),
));
?>
