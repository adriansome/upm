<?php
/* @var $this DefaultController */
/* @var $model Page */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile($this->module->getAssets().'/js/search.js');
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'id'=>'page-search-form',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'searchTerm'); ?>
		<?php echo $form->textField($model,'searchTerm'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->