<?php

$listWidget = new ListWidget();
$listWidget->name = 'holidays';
$listWidget->init();
$attributes = $listWidget->itemAttributes();
unset($listWidget);

$keys = array_keys($attributes);
$indexes = array(
    'status' => array_search('status', $keys),
    'booked_by' => array_search('booked_by', $keys)
);

?>

<h1>Welcome <?php echo $model->title, ' ', $model->lastname ?></h1>

<?php if($model->attributes['active'] == '0') :?>
    
    <p>You will be unable to search for holidays until your account has been activated.</p>

<?php endif;?>

<h2>Your Provisional Holiday Booking</h2>
        
<input type="hidden" id="indexes" data-status="<?php echo $indexes['status'] ?>"
       data-bookedby="<?php echo $indexes['booked_by'] ?>" />
<?php

$this->widget('ListWidget', array(
    'name' => 'holidays',
    'scenario' => 'provisional',
    'filters' => array(
        'booked_by' => array(
            'field_type' => 'string_value',
            'value' => Yii::app()->user->id,
        )
    )
));

$listWidget = new ListWidget();
$listWidget->name = 'stories';
$listWidget->init();
$attributes = $listWidget->itemAttributes();
unset($listWidget);

$keys = array_keys($attributes);
$indexes = array(
    'full_name' => array_search('full_name', $keys),
    'status' => array_search('status', $keys),
    'holiday_story' => array_search('holiday_story', $keys),
    'full_image' => array_search('full_image', $keys),
    'title' => array_search('title', $keys),
    'size_of_group' => array_search('size_of_group', $keys),
    'start_date' => array_search('start_date', $keys),
    'end_date' => array_search('end_date', $keys),
);

?>

<h2>Your Holiday Story</h2>

<div class="inner-content">
    <p>We would like you to complete a short holiday story, and upload a picture, so that we can show the people who donate holidays. It's great for them to see that they provided a break that was valued by you.</p>

    <p>Please tell us about your holiday, even if it is only a short summary:</p>
    
    <form action="/stories/management/item" method="post" id="story">
        <input type="hidden" name="Content[<?php echo $indexes['full_name'] ?>][string_value]" value="<?php echo $model->fullname?>" />
        <input type="hidden" name="Content[<?php echo $indexes['status'] ?>][string_value]" value="submitted" />
        <input type="hidden" name="Content[<?php echo $indexes['title'] ?>][string_value]" value="" />
        <input type="hidden" name="Content[<?php echo $indexes['size_of_group'] ?>][string_value]" value="" />
        <input type="hidden" name="Content[<?php echo $indexes['start_date'] ?>][date_value]" value="" />
        <input type="hidden" name="Content[<?php echo $indexes['end_date'] ?>][date_value]" value="" />
        <input type="hidden" id="image_index" value="<?php echo $indexes['full_image'] ?>" />

        <div class="form-row">
            <textarea id="redactor" name="Content[<?php echo $indexes['holiday_story'] ?>][string_value]" class="tinymce-editor"></textarea>
        </div>

        <div class="form-row" id="upload-images">
            
            <span class="btn btn-success fileinput-button">
                <i class="glyphicon glyphicon-plus"></i>
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

        <p>Your holiday story will be reviewed by Give Us Time. We will publish your story to our website shortly. </p>
        <div class="form-row">
            <label>Please tick this box to agree that you are happy to have your story published on our public website: <input required type="checkbox" /></label>
        </div>
        <div class="form-row button-row">
            <input type="submit" value="Save" />
        </div>
    </form>
</div>
<?php 

Yii::app()->clientScript->registerCssFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.css')) . '/jquery.fileupload.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.ui.widget.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.ui.widget.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.iframe-transport.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.fileupload.js');
?>