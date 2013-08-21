<?php
/* @var $this UsersController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oldEmail')); ?>:</b>
	<?php echo CHtml::encode($data->oldEmail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('permissions')); ?>:</b>
	<?php echo CHtml::encode($data->permissions); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode($data->lastname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateTermsAgreed')); ?>:</b>
	<?php echo CHtml::encode($data->dateTermsAgreed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateUpdated')); ?>:</b>
	<?php echo CHtml::encode($data->dateUpdated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateLastLogin')); ?>:</b>
	<?php echo CHtml::encode($data->dateLastLogin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->dateCreated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateValidationEmailSent')); ?>:</b>
	<?php echo CHtml::encode($data->dateValidationEmailSent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activationCode')); ?>:</b>
	<?php echo CHtml::encode($data->activationCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateEmailValidated')); ?>:</b>
	<?php echo CHtml::encode($data->dateEmailValidated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateAccountExpire')); ?>:</b>
	<?php echo CHtml::encode($data->dateAccountExpire); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateRevert')); ?>:</b>
	<?php echo CHtml::encode($data->dateRevert); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateReset')); ?>:</b>
	<?php echo CHtml::encode($data->dateReset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->dateDeleted); ?>
	<br />

	*/ ?>

</div>