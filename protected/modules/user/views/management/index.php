	<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->beginWidget('TbModal', array('id'=>'user-management', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true', 'class'=>'wide')));
?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Users</h4>
</div>

<div class="modal-body">

<p></p><a class="button" data-toggle="default-action" data-target=".item-view" href="<?php echo $this->createUrl('create'); ?>">
Add a User</a></p>

<?php $this->renderPartial('_search', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'id'=>'user-list'
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
