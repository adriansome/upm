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
    
    <div class="list-view">
        <h4>Message Templates</h4>

        <?php
        // Output templates
        foreach ($templates as $id => $template) {
            echo "<div class='template'>";
            echo $template['name']; ?><a data-target=".item-view" 
               data-toggle="edit-item" href="<?php 
                echo Yii::app()->createUrl(Yii::app()->getModule('messaging')->id 
                    . '/management/edit/' . $id); ?>">
                <i class="icon-edit"></i>
            </a>
            <?php
            echo "</div>";
        }
        ?>
        <h4>Message List</h4>
        <?php
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_listItem',
            'id'=>'listing',
            'htmlOptions' => array(
                'class' => ''
            )
        )); 
        ?>

        
    
    </div>

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
