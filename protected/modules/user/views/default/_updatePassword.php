<?php
/* @var $this UserController */
/* @var $model User */
?>

<div id="content">
	<h1>Update Password</h1>

	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'password-update-form',
		'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'standard-form'),
	)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php echo $form->errorSummary($model); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'currentPassword'); ?>
			<?php echo $form->passwordField($model,'currentPassword', array('value'=>'')); ?>
			<?php echo $form->error($model,'currentPassword'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'password1'); ?>
			<?php echo $form->passwordField($model,'password1'); ?>
			<?php echo $form->error($model,'password1'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'password2'); ?>
			<?php echo $form->passwordField($model,'password2'); ?>
			<?php echo $form->error($model,'password2'); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div>
</div>