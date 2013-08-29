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
		<?php echo $form->textField($model,'layout',array('size'=>30,'maxlength'=>30)); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_updated'); ?>
		<?php echo $form->textField($model,'date_updated'); ?>
		<?php echo $form->error($model,'date_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_active'); ?>
		<?php echo $form->textField($model,'date_active'); ?>
		<?php echo $form->error($model,'date_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_deleted'); ?>
		<?php echo $form->textField($model,'date_deleted'); ?>
		<?php echo $form->error($model,'date_deleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_visible'); ?>
		<?php echo $form->textField($model,'date_visible'); ?>
		<?php echo $form->error($model,'date_visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_menu'); ?>
		<?php echo $form->textField($model,'date_menu'); ?>
		<?php echo $form->error($model,'date_menu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_subpages'); ?>
		<?php echo $form->textField($model,'date_subpages'); ?>
		<?php echo $form->error($model,'date_subpages'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->