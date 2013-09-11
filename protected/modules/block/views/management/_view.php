<?php
/* @var $this ManagementController */
/* @var $data Block */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('scope')); ?>:</b>
	<?php echo CHtml::encode($data->scope); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('page_id')); ?>:</b>
	<?php echo CHtml::encode($data->page_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->date_updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_active')); ?>:</b>
	<?php echo CHtml::encode($data->date_active); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->date_deleted); ?>
	<br />

	*/ ?>

</div>