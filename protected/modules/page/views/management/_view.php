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

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->date_updated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_active')); ?>:</b>
	<?php echo CHtml::encode($data->date_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->date_deleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_visible')); ?>:</b>
	<?php echo CHtml::encode($data->date_visible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_menu')); ?>:</b>
	<?php echo CHtml::encode($data->date_menu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_subpages')); ?>:</b>
	<?php echo CHtml::encode($data->date_subpages); ?>
	<br />

	*/ ?>

</div>