<?php
/* @var $this UserController */
/* @var $model User */
?>

<div id="content">
	<h1>Update E-mail Address</h1>

	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'email-update-form',
		'enableAjaxValidation'=>false,
	)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<?php echo CHtml::label('New E-mail Address', 'User[email]'); ?>
			<?php echo $form->textField($model,'email'); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'currentPassword'); ?>
			<?php echo $form->passwordField($model,'currentPassword', array('value'=>'')); ?>
			<?php echo $form->error($model,'currentPassword'); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div>
</div>