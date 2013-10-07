<?php
/* @var $this DefaultController */
/* @var $data User */
// Check whether user has been validated
$emailValidated = ($data->getAttribute('date_email_validated') !== NULL);
?>

<div class="view">
	<b><?php echo CHtml::encode($data->fullname); ?></b>
	
	<div class="buttons">
		<a class="" data-toggle="default-action" data-target=".item-view" href="<?php echo $this->createUrl('update', array('id'=>$data->id)) ?>">
			<i class="icon-edit"></i>
		</a>
		
		<a class="" data-toggle="toggle-action" data-id="<?php echo $data->id?>" data-target="user-list" href="<?php echo $this->createUrl('sendCredentialsReminder', array('id'=>$data->id)) ?>">
			<i class="icon-user"></i>
		</a>
		
		<a class="" data-toggle="toggle-action" data-id="<?php echo $data->id?>" data-target="user-list" href="<?php echo $this->createUrl('revertEmailAddress', array('id'=>$data->id)) ?>">
			<i class="icon-envelope"></i>
		</a>
		<?php if (!$emailValidated):?>
		<a class="" data-toggle="toggle-action" data-id="<?php echo $data->id?>" data-target="user-list" href="<?php echo $this->createUrl('reactivate', array('id'=>$data->id)) ?>">
			<i class="icon-ok"></i>
		</a>
		<?php else:?>
		<a class="" data-toggle="toggle-action" data-id="<?php echo $data->id?>" data-target="user-list" href="<?php echo $this->createUrl('deactivate', array('id'=>$data->id)) ?>">
			<i class="icon-off"></i>
		</a>
		<?php endif ?>
		<a class="" data-toggle="toggle-action" data-id="<?php echo $data->id?>" data-target="user-list" href="<?php echo $this->createUrl('delete', array('id'=>$data->id)) ?>">
			<i class="icon-remove-circle"></i>
		</a>
	</div>
</div>
