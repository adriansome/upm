<?php
/* @var $this ManagmentController */
/* @var $model User */
$this->beginWidget('TbModal', array('id'=>'update-user-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true'))); ?>

<div class="modal-header">
    <h4>Add a User</h4>
</div>

<div class="modal-body">

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'buttons' => 'add'
));
?>
</div>

<div class="modal-footer">
    <?php $this->widget('TbButton', array(
        'type'=>'success',
        'label'=>'Save',
        'url'=>Yii::app()->createUrl('/user/management/create/'),
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'data-target'=>'user-list',
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
