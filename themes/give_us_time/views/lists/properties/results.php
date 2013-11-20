<?php /* @var $this ListWidget */

if ($_POST['Search']['location']) {
    $locationText = $this->viewData['attributes']['location']['values'][$_POST['Search']['location']];
} else {
    $locationText = '';
}

$dateStart = (isset($_POST['Search']['holiday'])) ? $_POST['Search']['holiday'] : FALSE;

$dateText = ($dateStart) ? date('M d', strtotime($dateStart)) : '';
$dateTextFull = ($dateStart) ? date('M d Y', strtotime($dateStart)) : '';

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
        $arrivalDate = implode('-', array($arrivalParts['year'], $arrivalParts['month'], $arrivalParts['day']));
        $userDate = new DateTime($dateStart);
        $systemDate = new DateTime($arrivalDate);
        $today_date = new DateTime('now');
        
        // don't show holidays that started in the past
        if ($systemDate < $today_date) {
            continue;
        }
        
        if ($dateStart) {
            $diff = $userDate->diff($systemDate);

            // Make sure the holiday falls within  a week of the user's specified date
            // The holiday should either fall on, or 6 days after the chosen date
            if ($diff->days > 6 || $diff->invert == 1) {
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
        if ($dateStart) {
            $summaryText .= " beginning in the week of {$dateTextFull}</p>";
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

