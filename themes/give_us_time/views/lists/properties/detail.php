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
$holidayData = $listWidget->contents;

// Holiday not found
if (!$holidayData) {
    throw new CHttpException(404, "Holiday item not found");
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
            <div class="column image-column">
                <div id="resort-full-image">
                    <?php
                    if (isset($propertyData['image']) && !empty($propertyData['image'])) {
                        $img_path = Yii::app()->basePath . '/..' . $propertyData['image'];
                        if (is_file($img_path)) {
                            echo "<img alt='' src='" . $propertyData['image'] .  "' />";                  
                        }
                    }
                    ?>
                </div>
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
                    <h2>Holiday Details</h2>
                    <div class="resort-info">
                        <div class="resort-name"><?php echo $propertyData['title'] ?>, <?php echo $propertyData['area'] ?></div>
                        <div class="resort-details"><?php 
                        echo $holidayData['number_of_bedrooms'] . ' bed ' . 
                            $attributes['type']['values'][$propertyData['type']] . '. ';   
                         echo 'Sleeps ' . $holidayData['sleeps_number'];?></div>
                    </div>                    
                </div>
            </div>
            <div class="column full-details-column">
                    <h2>Resort</h2>
                    <p><?php echo $propertyData['title']; ?></p>

                    <p><?php echo $propertyData['description']; ?></p>
            </div>

            <?php
            Yii::app()->controller->renderPartial('webroot.themes.give_us_time.views.lists.holidays.booking');
            ?>
            
        </div>
    </section>
    <!-- End #main-content -->
</div>
