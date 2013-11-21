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

            <?php $fields = new BlockForm('user-photos');?>
            
            <?php $fields->fetchFormParts(); ?>
            <form action="/user-photos/management/item" method="post" class="upload-form">
                <fieldset>
                    <h2>Choose image to upload</h2>
                    
                    <div class="form-column one-half" id="caption">
                        <?php echo $fields->parts['caption']['label']; ?>
                        <?php echo $fields->parts['caption']['input']; ?>
                    </div>
                    <div class="form-column one-half" id="date">
                        <?php echo $fields->parts['date']['label']; ?>
                        <?php $date_index = array_search('date', array_keys($fields->parts))?>
                        <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                            'name'=>"Content[$date_index][date_value]",
                            'options'=>array(
                                'showAnim'=>'fold',
                            ),
                        ));?>
                    </div>
                    <div class="form-column one-half" id="location">
                        <?php echo $fields->parts['location']['label']; ?>
                        <?php echo $fields->parts['location']['input']; ?>
                    </div>
                    <div class="form-column one-half" id="name">
                        <?php echo $fields->parts['name']['label']; ?>
                        <?php echo $fields->parts['name']['input']; ?>
                    </div>
                    <?php $listWidget = new ListWidget();
                        $listWidget->name = 'user-photos';
                        $listWidget->init();
                        $attributes = $listWidget->itemAttributes();
                        unset($listWidget);?>
                    
                    <?php foreach($attributes as $attribute=>$data):
                        
                        if(substr($attribute,0,3) == 'tag'):?>
                    
                            <div class="form-column one-half tag">
                                <?php echo $fields->parts[$attribute]['label']; ?>
                                <?php echo $fields->parts[$attribute]['input']; ?>
                            </div>

                        <?php endif;
                        
                    endforeach;?>
                    
                    <div class="form-column one-half" id="upload-images">
                        <?php echo $fields->parts['photo']['label']; ?>
                        <?php echo $fields->parts['photo']['input']; ?>
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
                        <input type="text" id="captcha" name="Content[captcha_code]" />
                        <?php $this->widget('CCaptcha');?>
                    </div>
                    
                    <input type="hidden" name="Content[<?php echo array_search('live', array_keys($fields->parts))?>][boolean_value]" value="0" />

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
            
            // ensure required fields are present
            if($('#upload-images > input[type=hidden]').val() == '')
            {
                alert('You must supply a photo');
                return false;
            }
            
            //tags
            if($('input:checked').length == 0) {
                alert('You must assign at least one tag to your photo');
                return false;
            }
            
            //captcha
            
            if($('#captcha').val() == '')
            {
                alert('You must supply the captcha value');
                return false;
            }
            
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