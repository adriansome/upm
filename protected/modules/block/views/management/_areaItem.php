<?php
/* @var $this ManagementController */
/* @var $data Block */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->blocks[0]->name); ?></b>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'edit',
        'url'=>Yii::app()->createUrl('/block/management/update/id/'.$data->blocks[0]->id),
        'htmlOptions'=>array(
            'data-toggle' => 'list-item',
			'data-target'=>'.item-view',
        	'id'=>'edit-block-'.$data->blocks[0]->id,
            'class'=>'edit',
        ),
    )); ?>

    <?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'activate',
        'url'=>Yii::app()->createUrl('/block/management/activate/id/'.$data->blocks[0]->id),
        'htmlOptions'=>array(
        	'id'=>'activate-block-'.$data->blocks[0]->id,
            'class'=>'activate',
        ),
    )); ?>

	<?php $this->widget('TbButton', array(
		'type'=>'link',
        'label'=>'delete',
        'url'=>Yii::app()->createUrl('/block/management/delete/id/'.$data->blocks[0]->id),
        'htmlOptions'=>array(
        	'id'=>'delete-block-'.$data->blocks[0]->id,
            'class'=>'delete',
        ),
    )); ?>
</div>