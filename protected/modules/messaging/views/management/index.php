<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */
$this->beginWidget('TbModal', array('id'=>'message-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true', 'class'=>'wide')));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Message Centre</h4>
</div>

<div class="modal-body">
    
    <h3>Message Templates</h3>
    
	<a class="add btn btn-link" data-toggle="default-action" data-target=".item-view" href="<?php echo $this->createUrl('create'); ?>">Add Template</a>
	<br/><br/>
    
    <h3>Message List</h3>

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
