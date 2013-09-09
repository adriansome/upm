<?php
/* @var $this UserController */
$this->pageTitle=Yii::app()->name . ' - Forgotten Credentials';
$this->breadcrumbs=array(
	'Login'=>array('login'),
	'Forgotten Credentials'
);

$this->beginClip('content');
?>

<h1>Forgotten Credentials</h1>

<p>	
	Please enter your registered e-mail address below:
</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'credentials-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Send Reminder'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php $this->endClip(); ?>