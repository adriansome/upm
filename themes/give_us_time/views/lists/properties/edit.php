<?php
/* File for adding holidays / editing property info */
$data = $this->contents->rawData;
?>
<h1><?php echo "{$data['title']}, {$data['area']}" ?></h1>
<input type="hidden" id="property-params" data-name="<?php echo $data['title'] ?>" />
<input type="hidden" id="landlord-params" data-name="<?php echo Yii::app()->user->firstname . ' ' . Yii::app()->user->lastname ?>"
       data-email="<?php echo Yii::app()->user->email ?>" />
<div class="holidays-container"></div>

<h2>Property Details: <?php echo $data['title'] ?></h2>

<div class="property-details">
    <div class="column image-column">
        <?php if (isset($data['image']) && !empty($data['image'])):?>
                <?php $img_path = Yii::app()->basePath . '/..' . $data['image'];?>
                <?php if (is_file($img_path)):?>
                        <?php echo '<img src="'.$data['image'].'" /></a>'?>
                <?php endif?>
        <?php endif?>
    </div>

    <div class="column full-details-column">
        <h2>Resort</h2>
        <p><?php echo $data['title'] ?></p>

        <?php
        if ($data['description']) {
        ?>
            <h2>Description</h2>
            <p><?php echo $data['description'] ?></p>
        <?php
        }
        ?>

        <?php
        if ($data['additional_info']) {
        ?>
            <h2>Additional Info</h2>
            <p><?php echo $data['additional_info'] ?></p>
        <?php
        }
        ?>

    </div>
</div>
<p>
<a data-toggle="edit-item" class="more" href="<?php echo Yii::app()->createUrl('/block/management/update/id/' . $this->item_id . '/list/properties'); ?>">Edit</a>
</p>