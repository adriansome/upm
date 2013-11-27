<?php /* @var $this ListWidget */
if ($_POST['Search']['region']) {
    $locationText = $this->viewData['attributes']['region']['values'][$_POST['Search']['region']];    
} else if ($_POST['Search']['country']) {
    $locationText = $this->viewData['attributes']['country']['values'][$_POST['Search']['country']];
} else {
    $locationText = '';
}

$date = (isset($_POST['Search']['holiday'])) ? $_POST['Search']['holiday'] : FALSE;

$month = ($date) ? date('m', strtotime($date)) : '';
$dateText = ($date) ? date('F', strtotime($date)) : '';
$dateTextFull = ($date) ? date('F', strtotime($date)) : '';

$propertyData = $this->contents->getData();

// Init empty array for holiday items
// Contains all holiday data
$allHolidays = array();

// Get holidays for properties
foreach ($propertyData as $property) {

    $listWidget = new ListWidget();
    $listWidget->name = 'holidays';
    $listWidget->filters = array(
        'property_id' => array(
            'field_type' => 'string_value',
            'value' => $property['block_id'])
    );
    $listWidget->init();
    
    // Get all the holidays for this property specifically
    $holidays = $listWidget->contents->getData();
    
    // Loop over the holidays and pull out content
    foreach ($holidays as $index => $holiday) {
        // Go through properties and strip out those which don't match the specified dates
        // This would be much more efficient if it used a query (refactor at some point)
        // Check for booked holidays
        if ($holiday['status'] == 'booked') {
            continue;
        }
        
        // Convert to database format
        $arrivalParts = date_parse_from_format("d/m/Y", $holiday['arrival_date']);
        $departureParts = date_parse_from_format("d/m/Y", $holiday['departure_date']);
        $arrivalDate = implode('-', array($arrivalParts['year'], $arrivalParts['month'], $arrivalParts['day']));
        $userDate = new DateTime($date);
        $systemDate = new DateTime($arrivalDate);
        $today_date = new DateTime('now');
        
        // don't show holidays that started in the past
        if ($systemDate < $today_date) {
            continue;
        }
        
        if ($date) {
            // make sure either arrival or departure is in the month that's been chosen
            if($arrivalParts['month'] != $month && $departureParts['month'] != $month) {
                continue;
            }
        }

        $allHolidays[] = array(
            'holiday' => $holiday,
            'property' => $property,
            'id' => $property['block_id']
        );        
    }

}

unset($listWidget);
// Create a single data provider from holiday data
$dataProvider = new CArrayDataProvider($allHolidays);
?>
<h1>Results<?php echo ($dateText || $locationText) ? '&dash; ' : ' '; echo $dateText; echo ($dateText && $locationText) ? ', ' : ''; echo $locationText; ?></h1>
<!--<ul class="resort-listing search-listing">-->
    <?php
    $itemCount = count($allHolidays);
    $summaryText = "<p>We have {$itemCount} match";
    $summaryText .= ($itemCount > 1) ? 'es' : '';
    if ($dateText || $locationText) {
        $summaryText .= " for {$locationText}";
        if ($date) {
            $summaryText .= " the month of {$dateTextFull}</p>";
        }
    }
    $this->widget('zii.widgets.CListView', array(
            'id'=>'holidays',
            'dataProvider'=> $dataProvider,
            'itemView'=>'webroot.themes.give_us_time.views.lists.holidays.item',
            'itemsTagName' => 'ul',
            'itemsCssClass' => 'resort-listing search-listing',
            'summaryText'=> $summaryText,
			'emptyText' => 'No properties are available on the dates / locations you requested. Please try widening your search.',
            'template'=>'{summary} {items}',
            /*'pager'=>array(
                'class'=>'CLinkPager',
                'header'=>'',
            ),*/
            'viewData'=>array('attributes'=>$this->viewData['attributes'])
    ));
    ?>
<!--</ul>-->

