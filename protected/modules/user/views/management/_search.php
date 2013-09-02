<?php
/* @var $this DefaultController */
/* @var $model User */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile($this->module->getAssets().'/js/search.js');
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'id'=>'user-search-form',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'searchTerm'); ?>
		<?php echo $form->textField($model,'searchTerm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'role'); ?>
		<?php echo $form->dropDownList($model,'role', array(
			'subscriber'=>'Subscriber',
			'user'=>'User',
			'editor'=>'Editor',
			'admin'=>'Admin'
		),
		array('empty'=>'Any')
		); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->