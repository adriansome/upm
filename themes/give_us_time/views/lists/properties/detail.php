<?php

if (!isset($_GET['h']) || !(int)$_GET['h']) {
    Yii::app()->controller->redirect('search');
}
$holidayId = $_GET['h'];

$listWidget = new ListWidget();
$listWidget->name = 'properties';
$listWidget->init();

$attributes = $listWidget->itemAttributes();
$locationAttributes = array('' => 'Any Location');
$locationAttributes += $attributes['location']['values'];
unset($listWidget);

// Set location and date params
$selectedLocation = (isset($_GET['l']))
                    ? $_GET['l'] : '';
$selectedDate = (isset($_GET['d']))
                ? $_GET['d'] : '';

$propertyData = $this->contents->rawData;

// Load this specific holiday
$listWidget = new ListWidget();
$listWidget->name = 'holidays';
$listWidget->item_id = $holidayId;
$listWidget->init();
$holidayAttributes = $listWidget->itemAttributes();
$holidayData = $listWidget->contents;

// Holiday not found
if (!$holidayData) {
    throw new CHttpException(404, "Holiday listing not found");
}

$holidayData = $holidayData->rawData;

$arrival = date_parse_from_format('d/m/Y', $holidayData['arrival_date']);
$departure = date_parse_from_format('d/m/Y', $holidayData['departure_date']);
?>

<div class="constrained">

    <!-- Begin #sidebar -->
    <div id="sidebar" class="column span4">
        <?php
        Yii::app()->controller->renderPartial('webroot.themes.give_us_time.views.elements.search-bar', array(
            'selectedLocation' => $selectedLocation,
            'selectedDate' => $selectedDate,
            'locationAttributes' => $locationAttributes
        ));
        ?>
    </div>
    <!-- End #sidebar -->

    <!-- Begin #main-content -->
    <section id="main-content" class="column span12">
        <h1><?php echo Yii::app()->utility->get_formatted_date('d/m/Y', $holidayData['arrival_date']);
                echo ' - ' . Yii::app()->utility->get_formatted_date('d/m/Y', $holidayData['departure_date'], TRUE) ?>,
            <?php echo $propertyData['title'] . ', ' . $propertyData['area'] ?>
        </h1>
        <div class="inner-content">

			<h2>Holiday Details</h2>
			<div id="holiday-details">
				<div class="date-range">
					<div class="date">
						<div class="month"><?php echo date("F", mktime(0, 0, 0, $arrival['month'])); ?></div>
						<div class="day"><?php echo $arrival['day']; ?></div>
					</div>
					to
					<div class="date">
						<div class="month"><?php echo date("F", mktime(0, 0, 0, $departure['month'])); ?></div>
						<div class="day"><?php echo $departure['day']; ?></div>
					</div>
				</div>

				<div class="resort-info">
					<div class="resort-name"><?php echo $propertyData['title'] ?>, <?php echo $propertyData['area'] ?></div>
					<div class="resort-details"><?php
					echo $holidayData['number_of_bedrooms'] . ' bed ' .
						$attributes['type']['values'][$propertyData['type']] . '. ';
					 echo 'Sleeps ' . $holidayData['sleeps_number'];?></div>
				</div>
			</div>

            <div class="column image-column">
                <div id="resort-full-image">
                    <?php
                    if (isset($propertyData['image_1']) && !empty($propertyData['image_1'])):
                        $img_path = Yii::app()->basePath . '/..' . $propertyData['image_1'];
                        if (is_file($img_path)):?>
                            <img alt="" src="/thumbs<?php echo $propertyData['image_1']?>_450x310" />
                        <?php endif?>
                    <?php endif?>
                </div>
                <div id="resort-thumbnails">
                    <?php
                    for($i=1;$i<=5;$i++){
						if (isset($propertyData['image_'.$i]) && !empty($propertyData['image_'.$i])) {
							$img_path = Yii::app()->basePath . '/..' . $propertyData['image_'.$i];
							if (is_file($img_path)) {
								?>
								<!-- images/photos/album1/gh53.jpg_200x300.jpg -->
								<a href="/thumbs<?php echo $propertyData['image_'.$i] ?>_450x310"><img src="/thumbs<?php echo $propertyData['image_'.$i] . '_87x62' ?>" alt="" /></a>

								<?php
							}
						}
					}
                    ?>
                </div>

            </div>
            <div class="column full-details-column">
				<h2 class="property-name"><?php echo $propertyData['title'] ?> <span class="property-type">(<?php echo $this->attributes['type']['values'][$propertyData['type']] ?>)</span></h2>
				<div class="property-location"><?php echo $propertyData['area'] ?>, <?php echo $propertyData['city'] ?>, <?php echo $this->attributes['location']['values'][$propertyData['location']] ?></div>

				<?php
				if ($propertyData['description']) {
				?>
				<div class="property-description">
					<p><?php echo nl2br($propertyData['description']) ?></p>
				</div>
				<?php
				}
				?>

                <ul class="facilities">
                    <li class="disabled_access" data-tooltip="Disabled access"><span>Disabled access</span></li>
                    <li class="beach" data-tooltip="Beach"><span>Beach</span></li>
                    <li class="child_friendly" data-tooltip="Child-friendly"><span>Child-friendly</span></li>
                    <li class="cancellation_fee" data-tooltip="Cancellation Fee"><span>Cancellation Fee</span></li>
                </ul>

				<?php
				if ($propertyData['accessibility']) {
				?>
				<div class="property-accessibility">
					<h3>Accessibility Information</h3>
					<p><?php echo nl2br($propertyData['accessibility']) ?></p>
				</div>
				<?php
				}

				if ($propertyData['extras']) {
				?>
				<div class="property-additional-costs">
					<h3>Any extra costs that you could be required to pay</h3>
					<p><?php echo nl2br($propertyData['extras']) ?></p>
				</div>
				<?php
				}
				?>
            </div>

            <?php

            // Only show the provisional booking form for users
            if (Yii::app()->user->isUser() && $holidayData['status'] == 'available') {
                Yii::app()->controller->renderPartial('webroot.themes.give_us_time.views.lists.holidays.booking',
                array(
                    'holiday_id'  => $holidayId,
                    'attributes'  => $holidayAttributes,
                    'landlord_id' => $propertyData['user_id'],
                    'user_name'   => User::model()->findByPk(Yii::app()->user->id)->getFullname()
                ));
            }
            ?>

            <input type="hidden" id="holiday-dates"
                   data-start="<?php echo $holidayData['arrival_date'] ?>"
                   data-end="<?php echo $holidayData['departure_date'] ?>" />

        </div>
    </section>
    <!-- End #main-content -->
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
