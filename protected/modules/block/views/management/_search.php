<?php
/* @var $this ManagementController */
/* @var $model Block */
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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'scope'); ?>
		<?php echo $form->textField($model,'scope',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_id'); ?>
		<?php echo $form->textField($model,'page_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_updated'); ?>
		<?php echo $form->textField($model,'date_updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_active'); ?>
		<?php echo $form->textField($model,'date_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_deleted'); ?>
		<?php echo $form->textField($model,'date_deleted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->