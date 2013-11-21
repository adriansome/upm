<?php
/* @var $this ManagmentController */
/* @var $model User */
$this->beginWidget('TbModal', array('id'=>'update-messaging', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true'))); ?>

<div class="modal-header">
    <h4>Edit Template</h4>
</div>

<div class="modal-body">

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'create'
));
?>
</div>

<div class="modal-footer">
    <?php $this->widget('TbButton', array(
        'type'=>'success',
        'label'=>'Save',
        'url'=>Yii::app()->createUrl('/messaging/management/edit/'.$model->name),
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'class'=>'save list',
        ),
    )); ?>

    <?php $this->widget('TbButton', array(
        'type'=>'danger',
        'label'=>'Discard',
        'url'=>'#',
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'class'=>'discard',
        ),
    )); ?>
</div>

<?php $this->endWidget(); ?>
