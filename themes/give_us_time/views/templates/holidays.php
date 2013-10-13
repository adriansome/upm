<?php
$this->widget('ListWidget',array(
    'name'=>'holidays',
    'scenario'=>'list',
    'filters' => array(
        'property_id' => array(
            'field_type' => 'string_value',
            'value' => $params['id']
        )
    )
));

/*
 * Take two dates and output them in a more human friendly way
 * 
 * @param string $start
 * @param string $end
 */
function output_holiday_dates($start, $end, $separator= ' - ') {

    $start_parts = date_parse_from_format('d/m/Y', $start);
    // Rearrange dates for strtotime
    $start = $start_parts['month'] . '/' . $start_parts['day'] . '/' . $start_parts['year'];
    $end_parts = date_parse_from_format('d/m/Y', $end);
    $end = $end_parts['month'] . '/' . $end_parts['day'] . '/' . $end_parts['year'];
    
    $show_both_years = FALSE;
    
    // First check the dates are both in the same year
    if (date('Y', strtotime($start)) !== date('Y', strtotime($end))) {
        $show_both_years = TRUE;
    }
    
    $date_format = 'd M';
    $end_format = $start_format = $date_format;
    if ($show_both_years) {
        $start_format .= ' Y';
    }
    $end_format .= ' Y';
    
    
    $date_string = date($start_format, strtotime($start)) . $separator 
                . date($end_format, strtotime($end));
 
    echo $date_string;
}
?>


