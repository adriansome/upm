<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateCreated'); ?>
		<?php echo $form->textField($model,'dateCreated'); ?>
		<?php echo $form->error($model,'dateCreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateUpdated'); ?>
		<?php echo $form->textField($model,'dateUpdated'); ?>
		<?php echo $form->error($model,'dateUpdated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateActive'); ?>
		<?php echo $form->textField($model,'dateActive'); ?>
		<?php echo $form->error($model,'dateActive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateDeleted'); ?>
		<?php echo $form->textField($model,'dateDeleted'); ?>
		<?php echo $form->error($model,'dateDeleted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->