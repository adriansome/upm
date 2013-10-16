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
        // This would be much more efficient to be done with a query (refactor at some point)
        if ($dateStart) {
            // Convert to database format
            $arrivalParts = date_parse_from_format("d/m/Y", $holiday['arrival_date']);
            $arrivalDate = implode('-', array($arrivalParts['year'], $arrivalParts['month'], $arrivalParts['day']));
            $userDate = new DateTime($dateStart);
            $systemDate = new DateTime($arrivalDate);
            $diff = $userDate->diff($systemDate);

            // Make sure the holiday falls within  a week of the user's specified date
            if ($diff->days > 7 || $diff->invert == 1) {
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
<ul class="resort-listing search-listing">
    <?php
    $itemCount = count($allHolidays);
    $summaryText = "<p>We have {$itemCount} match";
    $summaryText .= ($itemCount > 1) ? 'es' : '';
    $summaryText .= " for {$locationText}";
    if ($dateStart) {
        $summaryText .= " beginning in the week of {$dateTextFull}</p>";
    }
    $this->widget('zii.widgets.CListView', array(
            'id'=>'holidays',
            'dataProvider'=> $dataProvider,
            'itemView'=>'webroot.themes.give_us_time.views.lists.holidays.item',
            'htmlOptions' => array(
                    'class' => 'constrained'					   
            ),
            'summaryText'=> $summaryText,
            'template'=>'{summary} {items}',
            /*'pager'=>array(
                'class'=>'CLinkPager',
                'header'=>'',
            ),*/
            'viewData'=>array('attributes'=>$this->viewData['attributes'])
    ));
    ?>
</ul>

