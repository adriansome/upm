<?php
/* @var $this DefaultController */
/* @var $data User */
?>

<div class="view">
	<b><?php echo CHtml::encode($data->fullname); ?></b>
	
	<a class="btn edit" data-toggle="edit-item" href="<?php echo $this->createUrl('update', array('id'=>$data->id)) ?>">
		<span>edit</span>
	</a>
	
	<a class="btn credentialsReminder" data-toggle="" href="<?php echo $this->createUrl('sendCredentialsReminder', array('id'=>$data->id)) ?>">
		<span>reset passwd</span>
	</a>
	
	<a class="btn revertEmail" data-toggle="" href="<?php echo $this->createUrl('revertEmailAddress', array('id'=>$data->id)) ?>">
		<span>revertEmail</span>
	</a>
	
	<a class="btn reactivate" data-toggle="" href="<?php echo $this->createUrl('reactivate', array('id'=>$data->id)) ?>">
		<span>reactivate</span>
	</a>

	<a class="btn deactivate" data-toggle="" href="<?php echo $this->createUrl('deactivate', array('id'=>$data->id)) ?>">
		<span>deactivate</span>
	</a>

	<a class="btn delete" data-toggle="delete" href="<?php echo $this->createUrl('delete', array('id'=>$data->id)) ?>">
		<span>delete</span>
	</a>
</div>