<?php
/* @var $this ResourcesController */

$this->beginWidget('TbModal', array('id' => 'upload-images', 'htmlOptions' => array('class' => 'modal-scrollable')));?>

<style>
    .modal-body img {margin:2px;}
    .modal-body img, .modal-header .close {cursor: pointer;}
    img.selected {opacity:0.5;border:solid 2px red;}
</style>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Your images</h4>
    <input type="hidden" value="<?php echo $index ?>" id="index" />
</div>
<div class="modal-body">
    <p>You have not yet uploaded any images. Click 'Upload image' to continue.</p>
</div>

<div class="modal-footer">
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <p class="info">The maximum file size for uploads is 5 MB </p>
    <p style="color:red;" id="error"></p>
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Upload image</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]">
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
            
                if(r.length > 0){
                    $('#upload-images .modal-body').html(r);
                }
            }
        });
        
     }

    updateImageList();
       
    $('#fileupload').fileupload({
        url: 'upload/".$subfolder."',
        dataType: 'json',
        add: function(e, data){
            $('#progress').show();
            data.submit();
        },
        progress: function(e, data){
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );            
        },
        fail: function(e, data){
            $('#progress').hide();
            $('#error').html('Your image could not be uploaded.');
        },
        done: function (e, data) {
            updateImageList();
            $('#progress').hide();
        },
    });");?>

<?php $this->endWidget(); ?>
