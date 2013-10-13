<?php
/* File for adding holidays / editing property info */
$data = $this->contents->getData();
?>
<h1><?php echo "{$data['title']}, {$data['area']}" ?></h1>
<input type="hidden" id="property-name" value="<?php echo $data['title'] ?>" />
<div class="holidays-container"></div>

<h2>Property Details: <?php echo $data['title'] ?></h2>

<p>
<a data-toggle="edit-item" class="more" href="<?php echo Yii::app()->createUrl('/block/management/update/id/' . $this->item_id . '/list/properties'); ?>">Edit Property</a>
</p>