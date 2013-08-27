<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'User Profile'=>array('/user/profile'),
	'Update',
);

$this->menu=array(
	array('label'=>'Change E-mail Address', 'url'=>array('updateEmail')),
	array('label'=>'Change Password', 'url'=>array('updatePassword')),
	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete'),'confirm'=>'Are you sure you want to delete your account?')),
);
?>

<h1>Update Account Details</h1>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-update-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname'); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname'); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>

