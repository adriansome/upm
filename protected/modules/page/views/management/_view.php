<?php
/* @var $this ManagementController */
/* @var $data Page */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->name); ?></b>
	
	<a class="btn edit" href="<?php echo $this->createUrl('view', array('id'=>$data->id)) ?>">
		<span>edit</span>
	</a>
	
	<a class="btn addPage" href="<?php echo $this->createUrl('add', array('parent'=>$data->id)) ?>">
		<span>add</span>
	</a>

	<a class="btn delete" href="<?php echo $this->createUrl('delete', array('id'=>$data->id)) ?>">
		<span>delete</span>
	</a>
	
	<a class="btn revertEmail" href="<?php echo $this->createUrl('active', array('id'=>$data->id)) ?>">
		<span>active</span>
	</a>
	
	<a class="btn reactivate" href="<?php echo $this->createUrl('visible', array('id'=>$data->id)) ?>">
		<span>visible</span>
	</a>
</div>