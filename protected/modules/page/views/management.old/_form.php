<?php
/* @var $this ManagementController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
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
		<?php echo $form->labelEx($model,'layout'); ?>
		<?php echo $form->dropDownList($model,'layout', array('single','lefty','righty','triplets'), array('empty'=>' - ')); ?>
		<?php echo $form->error($model,'layout'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'window_title'); ?>
		<?php echo $form->textArea($model,'window_title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'window_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_keywords'); ?>
		<?php echo $form->textArea($model,'meta_keywords',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<?php echo $form->textArea($model,'meta_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'meta_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->