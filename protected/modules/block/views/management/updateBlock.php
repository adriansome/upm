<?php
/* @var $this ManagementController */
/* @var $model Block */

$this->beginWidget('TbModal', array('id'=>'block-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static'))); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Edit <?php echo $block; ?></h4>
</div>

<div class="modal-body">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'block-form',
                'htmlOptions' => array(
                    'class' => 'standard-form'
                ),
		'enableAjaxValidation'=>true,
	)); ?>
	<?php foreach($fields as $field): 
                $class = (isset($field['class'])) ? " " . $field['class'] : '';   
        ?>
		<div class="row<?php echo $class ?>">
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
        'type'=>'danger',
        'label'=>'Discard',
        'url'=>'#',
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'class'=>'discard',
        ),
    )); ?>
    
    <?php $this->widget('TbButton', array(
        'type'=>'success',
        'label'=>'Save',
        'url'=>Yii::app()->createUrl('/block/management/update/id/'.$block->id.'/list/'.$list),
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'class'=>'save more',
        ),
    )); ?>


</div>
<?php $this->endWidget(); ?>
