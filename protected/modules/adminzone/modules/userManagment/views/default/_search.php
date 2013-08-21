<?php
/* @var $this UsersController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oldEmail'); ?>
		<?php echo $form->textField($model,'oldEmail',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'permissions'); ?>
		<?php echo $form->textField($model,'permissions',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateTermsAgreed'); ?>
		<?php echo $form->textField($model,'dateTermsAgreed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateUpdated'); ?>
		<?php echo $form->textField($model,'dateUpdated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateLastLogin'); ?>
		<?php echo $form->textField($model,'dateLastLogin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateCreated'); ?>
		<?php echo $form->textField($model,'dateCreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateValidationEmailSent'); ?>
		<?php echo $form->textField($model,'dateValidationEmailSent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activationCode'); ?>
		<?php echo $form->textField($model,'activationCode',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateEmailValidated'); ?>
		<?php echo $form->textField($model,'dateEmailValidated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateAccountExpire'); ?>
		<?php echo $form->textField($model,'dateAccountExpire'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateRevert'); ?>
		<?php echo $form->textField($model,'dateRevert'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateReset'); ?>
		<?php echo $form->textField($model,'dateReset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateDeleted'); ?>
		<?php echo $form->textField($model,'dateDeleted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->