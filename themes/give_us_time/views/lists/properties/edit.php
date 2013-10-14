<?php
/* File for adding holidays / editing property info */
$data = $this->contents->getData();

?>
<h1><?php echo "{$data['title']}, {$data['area']}" ?></h1>
<input type="hidden" id="property-params" data-name="<?php echo $data['title'] ?>" />
<input type="hidden" id="landlord-params" data-name="<?php echo Yii::app()->user->firstname . ' ' . Yii::app()->user->lastname ?>"
       data-email="<?php echo Yii::app()->user->email ?>" />
<div class="holidays-container"></div>

<h2>Property Details: <?php echo $data['title'] ?></h2>

<p>
<a data-toggle="edit-item" class="more" href="<?php echo Yii::app()->createUrl('/block/management/update/id/' . $this->item_id . '/list/properties'); ?>">Edit Property</a>
</p>