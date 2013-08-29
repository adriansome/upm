<?php
/* @var $this ManagementController */
/* @var $data Page */
?>

<div class="view">
	<b><?php if(isset($data->parent_id)) echo CHtml::encode($data->parent->name).' - '; echo CHtml::encode($data->name); ?></b>
	
	<a class="btn edit" href="<?php echo $this->createUrl('update', array('id'=>$data->id)) ?>">
		<span>edit</span>
	</a>
	
	<?php if(isset($data->date_subpages)): ?>
	<a class="btn addPage" href="<?php echo $this->createUrl('create', array('parent'=>$data->id)) ?>">
		<span>add</span>
	</a>
	<?php endif; ?>

	<?php if(Yii::app()->user->isAdmin()): ?>
	<a class="btn delete" href="<?php echo $this->createUrl('delete', array('id'=>$data->id)) ?>">
		<span>delete</span>
	</a>
	<?php endif; ?>
	
	<a class="btn active" href="<?php echo $this->createUrl('active', array('id'=>$data->id)) ?>">
		<span>active</span>
	</a>
	
	<a class="btn visible" href="<?php echo $this->createUrl('visible', array('id'=>$data->id)) ?>">
		<span>visible</span>
	</a>
</div>