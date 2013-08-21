<?php
/* @var $this ManagementController */
/* @var $data Page */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('layout')); ?>:</b>
	<?php echo CHtml::encode($data->layout); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('window_title')); ?>:</b>
	<?php echo CHtml::encode($data->window_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keywords); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->dateCreated); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('dateUpdated')); ?>:</b>
	<?php echo CHtml::encode($data->dateUpdated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateActive')); ?>:</b>
	<?php echo CHtml::encode($data->dateActive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->dateDeleted); ?>
	<br />

	*/ ?>

</div>