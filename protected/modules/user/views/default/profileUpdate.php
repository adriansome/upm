<?php
/* @var $this ManagmentController */
/* @var $model User */
$this->beginWidget('TbModal', array('id'=>'update-user-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true'))); ?>

<div class="modal-header">
    <h4>Update <?php echo $model->fullname; ?></h4>
</div>

<div class="modal-body">

	<?php echo $this->renderPartial('_profile', array('model'=>$model)); ?>

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
        'url'=>Yii::app()->createUrl('/user/profileupdate'),
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'data-target'=>'user-list',
            'class'=>'save list',
        ),
    )); ?>
</div>

<?php $this->endWidget(); ?>
