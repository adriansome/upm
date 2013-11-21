<?php
/* @var $this ManagementController */
/* @var $data Block */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->subject); ?></b>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'view',
        'url'=>Yii::app()->createUrl('/messaging/management/view/'.$data->id),
        'htmlOptions'=>array(
            'data-id' => $data->id,
			'data-target'=>'.item-view',
            'data-toggle'=>'edit-item',
        	'id'=>'view-message-'.$data->id,
            'class'=>'edit',
        ),
    )); ?>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'delete',
        'url'=>Yii::app()->createUrl('/messaging/management/delete/'.$data->id),
        'htmlOptions'=>array(
            'data-id' => $data->id,
            'data-toggle' => 'delete-item',
        	'id'=>'delete-block-'.$data->id,
            'class'=>'delete',
        ),
    )); ?>
</div>