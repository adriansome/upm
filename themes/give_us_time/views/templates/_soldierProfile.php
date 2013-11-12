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
?>


<!-- todo ...
<h2>Your Holiday Story</h2>

<div class="inner-content">
    <p>We would like you to complete a short holiday story, and upload a picture, so that we can show the people who donate holidays. It's great for them to see that they provided a break that was valued by you.</p>

    <p>Please tell us about your holiday, even if it is only a short summary:</p>
    <form action="#" method="post">

        <div class="form-row">
            <textarea id="redactor" name="content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in diam dignissim, consectetur lectus sed, tincidunt quam. Fusce eu hendrerit tortor. Curabitur in tempor lectus. Donec non nisi vitae tortor euismod tempus id vel turpis. Nullam sed odio quam. Etiam eu dolor vel nisl auctor hendrerit. Ut eu diam pharetra ligula ultrices congue in nec nisl. Pellentesque condimentum quam ac orci luctus, non tempus mauris tincidunt. Morbi scelerisque lorem non dolor viverra blandit.</p>
            </textarea>
        </div>

        <div class="form-row">
            <h3>Add An Image</h3>
            
            <input type="file" />

            <div class="uploaded-images">
                <div class="thumbnail">
                    <img src="example-content/resort-thumbnail.jpg" alt="" />
                    <a class="remove" title="Remove Image">Remove Image</a>
                </div>
                <div class="thumbnail">
                    <img src="example-content/resort-thumbnail.jpg" alt="" />
                    <a class="remove" title="Remove Image">Remove Image</a>
                </div>
                <div class="thumbnail">
                    <img src="example-content/resort-thumbnail.jpg" alt="" />
                    <a class="remove" title="Remove Image">Remove Image</a>
                </div>
            </div>
        </div>

        <p>Your holiday story will be reviewed by Give Us Time. We will publish your story to our website shortly. </p>
        <div class="form-row">
            <label>Please tick this box to agree that you are happy to have your story published on our public website: <input type="checkbox" /></label>
        </div>
        <div class="form-row button-row">
            <input type="submit" value="Save" />
        </div>
    </form>
</div>-->