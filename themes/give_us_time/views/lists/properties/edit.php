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

<div class="inner-content landlord-property-details">
	<a data-toggle="edit-item" class="action-button edit" href="<?php echo Yii::app()->createUrl('/block/management/update/id/' . $this->item_id . '/list/properties'); ?>">Edit</a>
	<div class="property-details">
		<div class="column image-column">
			<div id="resort-full-image">
			<?php if (isset($data['image_1']) && !empty($data['image_1'])):?>
					<?php $img_path = Yii::app()->basePath . '/..' . $data['image_1'];?>
					<?php if (is_file($img_path)):?>
							<?php echo '<img src="/thumbs'.$data['image_1'].'_450x310" /></a>'?>
					<?php endif?>
			<?php endif?>
				</div>
                <div id="resort-thumbnails">
                    <?php
                    for($i=1;$i<=5;$i++){
						if (isset($data['image_'.$i]) && !empty($data['image_'.$i])) {
							$img_path = Yii::app()->basePath . '/..' . $data['image_'.$i];
							if (is_file($img_path)) {
								?>
								<a href="/thumbs<?php echo $data['image_'.$i] ?>_450x310"><img src="/thumbs<?php echo $data['image_'.$i] . '_87x62' ?>" alt="" /></a>

								<?php
							}
						}
					}
                    ?>
                </div>
		</div>

		<div class="column full-details-column">
			<h2 class="property-name"><?php echo $data['title'] ?> <span class="property-type">(<?php echo $this->attributes['type']['values'][$data['type']] ?>)</span></h2>
			<div class="property-location"><?php echo $data['area'] ?>, <?php echo $data['city'] ?>, <?php echo $this->attributes['country']['values'][$data['country']] ?></div>

			<?php
			if ($data['description']) {
			?>
			<div class="property-description">
				<p><?php echo nl2br($data['description']) ?></p>
			</div>
			<?php
			}
			?>

	<?php
					$facilities = array(
						'wifi' => 'Wi-Fi',
						'gym' => 'Gym',
						'beach' => 'Beach',
						'swimming_pool' => 'Swimming Pool',
						'parking' => 'Parking',
						'disabled_access' => 'Disabled Access',
						'child_friendly' => 'Child-friendly',
						'dog_friendly' => 'Dog-friendly',
						'cancellation_fee' => 'Cancellation Fee'
					);

					$facilities_start = "<ul class='facilities'>";
					$facilities_end = "</ul>";
					$facilities_inner = '';

					foreach ($facilities as $id => $text) {
						if (isset($data[$id]) && $data[$id] == 1) {
							$facilities_inner  .= "<li class='{$id}' data-tooltip='{$text}'><span>{$text}</span></li>";
						}
					}

					if ($facilities_inner) {
						echo $facilities_start . $facilities_inner . $facilities_end;
					}
	?>


			<?php

			if ($data['accessibility']) {
			?>
			<div class="property-accessibility">
				<h3>Accessibility Information</h3>
				<p><?php echo nl2br($data['accessibility']) ?></p>
			</div>
			<?php
			}

			if ($data['extras']) {
			?>
			<div class="property-additional-costs">
				<h3>Any extra costs that you could be required to pay</h3>
				<p><?php echo nl2br($data['extras']) ?></p>
			</div>
			<?php
			}

			?>

		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	$("#resort-thumbnails a").click(function () {
		var newSrc = $(this).attr("href");
		$("#resort-full-image img").attr("src", newSrc);
		return false;
	});
});
</script>