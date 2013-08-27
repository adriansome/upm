<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'User Profile'=>array('/user/profile'),
	'Update',
);

$this->menu=array(
	array('label'=>'Update Account Details', 'url'=>array('update')),
	array('label'=>'Change Password', 'url'=>array('updatePassword')),
	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete'),'confirm'=>'Are you sure you want to delete your account?')),
);
?>

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
		<?php echo CHtml::label('Password', 'User[password]'); ?>
		<?php echo $form->passwordField($model,'password', array('value'=>'')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>