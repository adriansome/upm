<?php
/* @var $this ManagementController */
/* @var $model Block */
/* @var $form CActiveForm */
?>

<div class="form">

<?php ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scope'); ?>
		<?php echo $form->textField($model,'scope',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'scope'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_id'); ?>
		<?php echo $form->textField($model,'page_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'page_id'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->