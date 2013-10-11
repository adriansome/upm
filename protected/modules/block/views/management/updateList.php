<?php
/* @var $this ManagementController */
/* @var $dataProvider CActiveDataProvider */

$this->beginWidget('TbModal', array('id'=>'list-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true', 'class'=>'wide'))); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><?php echo ucwords($name); ?> Management</h4>
</div>

<div class="modal-body">
    <?php $this->widget('TbButton', array(
        'type'=>'link',
        'label'=>'add',
        'url'=>Yii::app()->createUrl('/'.$name.'/management/item'),
        'htmlOptions'=>array(
            'data-toggle' => 'add-item',
            'data-target'=>'.item-view',
            'id'=>'add-root-item',
            'class'=>'add',
        ),
    )); ?>

	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_listItem',
		'viewData'=>array('listName'=>$name),
		'id'=>'listing',
	)); ?>

    <div class="item-view">
        <div class="item-header">
            <!-- List item header -->
        </div>
        <div class="item-form">
            <!-- List item form -->
        </div>
        <div class="item-buttons">
            <!-- Item form buttons -->
        </div>
    </div>
</div>

<div class="modal-footer">
    <?php $this->widget('TbButton', array(
        'type'=>'danger',
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array(
            'data-dismiss'=>'modal',
            'class'=>'close-modal',
        ),
    )); ?>
</div>
<?php $this->endWidget(); ?>
