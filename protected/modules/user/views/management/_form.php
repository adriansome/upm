<?php
/* @var $this ManagmentController */
/* @var $model User */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerCss('user-management-form','
	div#content span#User_role input {
	    margin-left: 1em;
	}

	div#content span#User_role input:first-of-type {
	    margin-left: 0;
	}
	 
	div#content span#User_role label,
	div#content span#User_role input {
	    display: inline-block;
	}
');

$this->beginWidget('TbModal', array('id'=>'user-edit', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static'))); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Edit User</h4>
</div>
<div class="modal-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model,'lastname',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'lastname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role'); ?>
		<?php echo $form->radioButtonList($model,'role',
			array(
				'subscriber'=>'Subscriber', 'user'=>'User', 'editor'=>'Editor', 'admin'=>'Admin'
			),
			array(
				'separator'=>'','template' => '{input} {label}',
			)
		); ?>
		<?php echo $form->error($model,'role'); ?>
	</div>

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