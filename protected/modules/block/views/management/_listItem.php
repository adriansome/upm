<?php
/* @var $this ManagementController */
/* @var $data Block */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->contents[0]->string_value); ?></b>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'edit',
        'url'=>Yii::app()->createUrl('/block/management/update/id/'.$data->id),
        'htmlOptions'=>array(
            'data-id' => $data->id,
            'data-toggle' => 'edit-item',
			'data-target'=>'.item-view',
        	'id'=>'edit-block-'.$data->id,
            'class'=>'edit',
        ),
    )); ?>

    <?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'activate',
        'url'=>Yii::app()->createUrl('/block/management/activate'),
        'htmlOptions'=>array(
            'data-id' => $data->id,
            'data-toggle' => 'activate-item',
        	'id'=>'activate-block-'.$data->id,
            'class'=>'activate',
        ),
    )); ?>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'delete',
        'url'=>Yii::app()->createUrl('/block/management/delete'),
        'htmlOptions'=>array(
            'data-id' => $data->id,
            'data-toggle' => 'delete-item',
        	'id'=>'delete-block-'.$data->id,
            'class'=>'delete',
        ),
    )); ?>
</div>