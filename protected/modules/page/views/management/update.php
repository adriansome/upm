<?php
/* @var $this ManagmentController */
/* @var $model User */
$this->beginWidget('TbModal', array('id'=>'update-user-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true'))); ?>

<div class="modal-header">
    <h4>Update <?php echo $model->name; ?></h4>
</div>

<div class="modal-body">

<?php
//$this->widget('zii.widgets.CMenu', array(
//    'items' => array(
//        array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('class' => 'button', 'submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
//)));

$this->renderPartial('_form', array('model' => $model));
?>
</div>

<div class="modal-footer">
    <?php $this->widget('TbButton', array(
        'type'=>'success',
        'label'=>'Save',
        'url'=>Yii::app()->createUrl('/page/management/update/id/'.$model->id),
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'data-target'=>'page-management',
            'data-href'=>'/page/management',
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
