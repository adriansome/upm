<?php
/* @var $this ManagmentController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oldEmail'); ?>
		<?php echo $form->textField($model,'oldEmail',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'oldEmail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'permissions'); ?>
		<?php echo $form->textField($model,'permissions',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'permissions'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateTermsAgreed'); ?>
		<?php echo $form->textField($model,'dateTermsAgreed'); ?>
		<?php echo $form->error($model,'dateTermsAgreed'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateUpdated'); ?>
		<?php echo $form->textField($model,'dateUpdated'); ?>
		<?php echo $form->error($model,'dateUpdated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateLastLogin'); ?>
		<?php echo $form->textField($model,'dateLastLogin'); ?>
		<?php echo $form->error($model,'dateLastLogin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateCreated'); ?>
		<?php echo $form->textField($model,'dateCreated'); ?>
		<?php echo $form->error($model,'dateCreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateValidationEmailSent'); ?>
		<?php echo $form->textField($model,'dateValidationEmailSent'); ?>
		<?php echo $form->error($model,'dateValidationEmailSent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activationCode'); ?>
		<?php echo $form->textField($model,'activationCode',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'activationCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateEmailValidated'); ?>
		<?php echo $form->textField($model,'dateEmailValidated'); ?>
		<?php echo $form->error($model,'dateEmailValidated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateAccountExpire'); ?>
		<?php echo $form->textField($model,'dateAccountExpire'); ?>
		<?php echo $form->error($model,'dateAccountExpire'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateRevert'); ?>
		<?php echo $form->textField($model,'dateRevert'); ?>
		<?php echo $form->error($model,'dateRevert'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateReset'); ?>
		<?php echo $form->textField($model,'dateReset'); ?>
		<?php echo $form->error($model,'dateReset'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateDeleted'); ?>
		<?php echo $form->textField($model,'dateDeleted'); ?>
		<?php echo $form->error($model,'dateDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resetCode'); ?>
		<?php echo $form->textField($model,'resetCode',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'resetCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'revertCode'); ?>
		<?php echo $form->textField($model,'revertCode',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'revertCode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->