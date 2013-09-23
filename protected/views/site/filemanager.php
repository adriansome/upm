<?php $this->beginWidget('TbModal', array('id'=>'filemanager', 'htmlOptions'=>array('style'=>'width:765px; height:550px;', 'data-keyboard'=>'false', 'data-backdrop'=>'false'))); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>File Manager</h4>
</div>

<div class="modal-body" style="max-height:none; padding:0; border-radius:0 0 6px 6px;">
	<iframe  width="765" height="491" frameborder="0" scrolling="no" 
		src="<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('filemanager')); ?>/dialog.php?type=2&lang=eng&field_id=Content_0_file_value">
	</iframe>
</div>

<?php $this->endWidget(); ?>
