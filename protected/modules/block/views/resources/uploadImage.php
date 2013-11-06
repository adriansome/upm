<?php
/* @var $this ResourcesController */

$this->beginWidget('TbModal', array('id' => 'upload-images', 'htmlOptions' => array()));?>

<style>
    .modal-body img {margin:2px;}
    .modal-body img, .modal-header .close {cursor: pointer;}
    img.selected {opacity:0.5;border:solid 2px red;}
</style>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Browse images</h4>
    <input type="hidden" value="<?=$index?>" id="index" />
</div>
<div class="modal-body">
</div>

<div class="modal-footer">
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Select files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]" multiple>
    </span>
</div>
<?php

Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' ); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.ui.widget.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modal.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modalmanager.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.ui.widget.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.iframe-transport.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.fileupload.js');
?>
<?php Yii::app()->clientScript->registerScript('upload-image-script', "

     function updateImageList(){

        $.ajax({
            url: '/list/".$subfolder."',
            success: function(r) {
                $('#upload-images .modal-body').html(r);
            }
        });
        
     }

    updateImageList();
       
    $('#fileupload').fileupload({
        url: 'upload/".$subfolder."',
        dataType: 'json',
        done: function (e, data) {
            updateImageList();
        }
    });");?>

<?php $this->endWidget(); ?>
