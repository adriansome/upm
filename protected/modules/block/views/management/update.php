<?php
/* @var $this ManagementController */
/* @var $model Block */

Yii::app()->clientScript->registerScript(
'block-management-bId-'.$this->id,
"
 $('document').ready(function() {
    $('#save-block-'".$this->id."').click(function(){
        console.log('start');
        $.ajax({
            type: 'POST',
        	url: 'process.php',
        	data: $('#block-form').serialize(),
            success: function(response){
            	console.log('here');
            },
        	error: function(){
            	alert('failure');
            }
        });
    });
});
"
);

$this->beginWidget('TbModal', array('id'=>'block-'.$block->id.'-management'));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Edit <?php echo $block; ?></h4>
</div>

<div class="modal-body">
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
	<?php $this->endWidget(); ?>
</div>

<div class="modal-footer">
    <?php $this->widget('TbButton', array(
    	'buttonType'=>'submitButton',
        'type'=>'primary',
        'label'=>'Save',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','id'=>'save-block-'.$this->id),
    )); ?>

    <?php $this->widget('TbButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal','id'=>'close-block-'.$this->id),
    )); ?>
</div>
<?php $this->endWidget(); ?>