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

            <?php $form = new BlockForm('user-photos');?>
            <pre>
            <?php $form->fetchFormParts();
            //var_dump($form->parts);
            ?>
            </pre>
            <form action="/user-photos/management/item" method="post" class="upload-form">
                <fieldset>
                    <h2>Choose image to upload</h2>
                    
                    <div class="form-column one-half">
                        <?php echo $form->parts['caption']['label']; ?>
                        <?php echo $form->parts['caption']['input']; ?>
                    </div>
                    <div class="form-column one-half">
                        <?php echo $form->parts['date']['label']; ?>
                        <?php echo $form->parts['date']['input']; ?>
                    </div>
                    <div class="form-column one-half">
                        <?php echo $form->parts['location']['label']; ?>
                        <?php echo $form->parts['location']['input']; ?>
                    </div>
                    <div class="form-column one-half">
                        <?php echo $form->parts['name']['label']; ?>
                        <?php echo $form->parts['name']['input']; ?>
                    </div>
                    
                    <?php for($i=1;$i<=10;$i++):?>
                    
                        <div class="form-column one-half">
                            <?php echo $form->parts["tag_$i"]['label']; ?>
                            <?php echo $form->parts["tag_$i"]['input']; ?>
                        </div>
                    
                    <?php endfor;?>
                    
                    <div class="form-column one-half" id="upload-images">
                        <?php echo $form->parts['photo']['label']; ?>
                        <?php echo $form->parts['photo']['input']; ?>
                        <span class="btn btn-success fileinput-button">
                            <span>Add An Image</span>
                            <input id="fileupload" type="file" name="files[]">
                        </span>

                        <div class="uploaded-images">
                            <div id="progress" class="progress">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                            <span id="error" class="error"></span>
                        </div>

                    </div>
                    <div class="form-column one-half">
                        <label>Captcha</label>
                        <input type="text" name="" />
                        <?php $this->widget('CCaptcha');?>
                    </div>
                    
                    <input type="hidden" name="Content[<?php echo array_search('live', array_keys($form->parts))?>][boolean_value]" value="0" />

                    <div class="form-row button-row">
                        <input type="submit" class="submit">
                    </div>

                </fieldset>
            </form>
        </div>
        <!-- End #main-content -->

    </div>
</div>
<!-- End #main -->

<script type="text/javascript">
    
    $(document).ready(function(){
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
                
                $(this).parent().parent().find('input[type=hidden]').val(filename);

                var $html = $("<div class='thumbnail'></div>");
                var $img = $("<img src='/thumbs"+filename+"_75x75' />");
                var $remove = $("<a href='"+ data.result.files[0].deleteUrl +"' class='remove'>Remove Image</a>");

                $html.append($img); 
                $html.append($remove);

                $('.uploaded-images').append($html);

                $('#progress').hide();
            },
        });  

        $('.remove').live('click', function(e){
            e.preventDefault();

            // remove image
            

            // remove input 
            $(this).parent().remove();
        });
        
        $('.submit').live('click', function(e){
            e.preventDefault();
            
        
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: $('form').serialize(),
                url: $('form').attr('action'),
                success: function(data) {
                    if(data.success)
                    {
                        alert('Your photo has been saved.');
                    }
                    else
                    {
                        alert('There was a problem saving your photo.');
                    }
                }
            });  
        });
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