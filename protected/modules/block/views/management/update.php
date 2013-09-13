<?php
/* @var $this ManagementController */
/* @var $model Block */

$this->beginWidget('TbModal', array('id'=>'block-'.$block->id.'-management'));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Edit <?php echo $block; ?></h4>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'block-form',
	'enableAjaxValidation'=>true,
)); ?>

<div class="modal-body">
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
</div>

<div class="modal-footer">
    <?php $this->widget('TbButton', array(
    	'buttonType'=>'submitButton',
        'type'=>'primary',
        'label'=>'Save',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
    <?php $this->widget('TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','id'=>'#btn-close-modal'),
    )); ?>
</div>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>