<?php
/* @var $this ManagementController */
/* @var $model Block */

$this->beginClip('content');
?>

<h1>Update <?php echo $block; ?></h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'block-form',
	'enableAjaxValidation'=>true,
)); ?>

<?php foreach($fields as $field): ?>
	<div class="row">
		<?php echo $field['label']; ?>
		<?php
			if(is_object($field['input'])) 
				$field['input']->run();
			else
				echo $field['input'];
		?>
		<?php echo $field['validation']; ?>
	</div>
<?php endforeach; ?>

<div class="row buttons">
	<?php echo CHtml::submitButton('Save'); ?>
</div>

<?php $this->endWidget(); ?>

<?php $this->endClip(); ?>