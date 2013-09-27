<?php
/* @var $this ManagementController */
/* @var $dataProvider CActiveDataProvider */

$this->beginWidget('TbModal', array('id'=>'area-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true'))); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><?php echo ucwords($name); ?></h4>
</div>

<div class="modal-body">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_areaItem',
		'id'=>$id.'-blocks',
	)); ?>

    <div class="item-view">
        <?php $this->widget('TbAlert', array(
            'block'=>true, // display a larger alert block?
            'fade'=>true, // use transitions?
            'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
            'alerts'=>array( // configurations per alert type
                'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
            ),
        )); ?>
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