<?php
$this->pageTitle = $model->window_title;
?>

<?php require_once(Yii::app()->theme->basepath . '/views/elements/header.php'); ?>
<style>
    <?php include Yii::app()->theme->basepath . '/css/image-upload.css'; ?>
</style>
<!-- Begin #banner -->
<div class="banner">
    <div class="constrained">
        <h1>
            <?php
            $this->widget('SingleLineText', array(
                'name' => 'page heading',
                'scope' => 'page',
            ));
            ?>
        </h1>
    </div>
</div>
<!-- End #banner -->

<!-- Begin #main -->
<div id="main">
    <div class="constrained">

        <!-- Begin #main-content -->
        <div class="column span13" id="main-content">

            <p><span class="highlighted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu nisl dui. Quisque ullamcorper tempor purus quis dapibus. Morbi scelerisque eros quis elit aliquet suscipit. Nulla venenatis dictum ipsum id fringilla. Nulla facilisi. Integer risus sapien, fringilla eu magna vel, porttitor aliquam.</span></p>

            <?php $form = new BlockForm('user-photos');
            $form->fetchFormParts();
            ?>

            <form action="/user-photos/management/item" method="post" class="upload-form">
                <fieldset>
                    <h2>Choose image to upload</h2>
                    <div class="form-column one-half">
                        <?php echo $form->parts[0]['label']; ?>
<?php echo $form->parts[0]['input']; ?>
                    </div>
                    <div class="form-column one-half">
                        <?php echo $form->parts[1]['label']; ?>
<?php echo $form->parts[1]['input']; ?>
                    </div>
                    <div class="form-column one-half">
                        <?php echo $form->parts[2]['label']; ?>
<?php echo $form->parts[2]['input']; ?>
                    </div>
                    <div class="form-column one-half">
                        <?php echo $form->parts[3]['label']; ?>
<?php echo $form->parts[3]['input']; ?>
                    </div>
                    <div class="form-column one-half">
                        <?php echo $form->parts[4]['label']; ?>
<?php echo $form->parts[4]['input']; ?>
                    </div>
                    <div class="form-column one-half" id="upload-images">
                        <input type="hidden" id="image_index" value="14" /><!--todo: get this from block-->
                        <?php echo $form->parts[14]['label']; ?>
                        <?php echo $form->parts[14]['input']; ?>

                    </div>

<?php echo $form->parts[15]['input']; ?>

                    <div class="form-row button-row">
                        <input type="submit">
                    </div>

                </fieldset>
            </form>
        </div>
        <!-- End #main-content -->

    </div>
</div>
<!-- End #main -->

<script type="text/javascript">
        $('#fileupload').fileupload({
        url: 'upload/assets/source',
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
            // get name of new file
            var filename = '/assets/source/' + data.result.files[0].name;

            var $html = $("<div class='thumbnail'></div>");
            var $img = $("<img src='/thumbs"+filename+"_75x75' />");
            var $remove = $("<a href='"+ data.result.files[0].deleteUrl +"' class='remove'>Remove Image</a>");
            var $input = $("<input type='hidden' name='Content["+$('#image_index').val()+"][file_value]' value='"+filename+"' />");

            $html.append($img); 
            $html.append($remove);
            $html.append($input);

            $('.uploaded-images').append($html);

            $('#progress').hide();
        },
    });  
</script>
<?php 
Yii::app()->clientScript->registerCssFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.css')) . '/jquery.fileupload.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.ui.widget.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.ui.widget.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.iframe-transport.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.fileupload.js');
?>
<?php require_once(Yii::app()->theme->basepath . '/views/elements/footer.php'); ?>