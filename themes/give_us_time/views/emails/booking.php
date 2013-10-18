<h3>Dear <?php echo $params['landlord_name'] ?>,</h3>

<p>Thank you for your generous offer for a weeks holiday in your property from 
the <?php echo $params['holiday_start']; ?> to <?php echo $params['holiday_end'] ?>.  
My family and I would very much like to secure this week.</p>
<?php
$total_people = $params['people'][0]['value'];
?>
<p>Total People: <?php echo $total_people ?></p>

<p>Person 1</p>
<ul>
    <li>Name: <?php echo $params['people'][1]['value'] ?></li>
</ul>

<?php
unset($params['people'][0], $params['people'][1]);

// Post data is annoyingly split into separate chunks, 3 rows make up one person
for ($i = 1; $i <= $total_people-1; $i++) {
    
    $index_start = ($i > 1) ? (($i * 3) - 1) : 2;
    echo "<p>Person " . ($i+1) . "</p>";
    echo "<ul>";
    $name = $index_start;
    $age = $index_start + 1;
    $relationship = $index_start + 2;
    echo "<li>Name: {$params['people'][$name]['value']}</li>";
    echo "<li>Age: {$params['people'][$age]['value']}</li>";
    echo "<li>Relationship: {$params['people'][$relationship]['value']}</li>";
    echo "</ul>";
    
}

?>

<p>Please confirm it is now booked under the following name, <?php echo $params['user_name']?>. 
I confirm I will supply my contact details including my name, address and 
mobile number once your confirmation has been received.</p>
<p>Yours sincerely.</p>
<p><?php echo $params['user_name']; ?></p>