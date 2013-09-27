<?php
/* @var $this ManagementController */
/* @var $data Block */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->name); ?></b>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'edit',
        'url'=>Yii::app()->createUrl('/block/management/update/id/'.$data->id),
        'htmlOptions'=>array(
            'data-toggle' => 'list-item',
			'data-target'=>'.item-view',
        	'id'=>'edit-block-'.$data->id,
            'class'=>'edit',
        ),
    )); ?>

    <?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'activate',
        'url'=>Yii::app()->createUrl('/block/management/activate/id/'.$data->id),
        'htmlOptions'=>array(
        	'id'=>'activate-block-'.$data->id,
            'class'=>'activate',
        ),
    )); ?>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'delete',
        'url'=>Yii::app()->createUrl('/block/management/delete/id/'.$data->id),
        'htmlOptions'=>array(
        	'id'=>'delete-block-'.$data->id,
            'class'=>'delete',
        ),
    )); ?>
</div>