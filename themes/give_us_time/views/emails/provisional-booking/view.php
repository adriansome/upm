<p>Dear <?php echo $params['recipient_name'] ?>,</p>

<?php
if (isset($header)) {
    echo "<p styles='margin:20px 0 20px 0;'>$header</p>";
} ?>

<p>The holiday dates are from <?php echo $params['holiday_start']; ?> to <?php echo $params['holiday_end'] ?> </p>
<p>Requested by <?php echo $params['user_name']?>.</p>
<p>The resort is <?php echo $params['property_name'] ?>.</p>

<?php
$total_people = $params['people'][0]['value'];
?>
<p>Total People: <?php echo $total_people ?></p>

<p>Person 1</p>
<ul  styles="margin:20px 0 20px 0;">
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

if (isset($footer)) {
    echo "<p styles='margin:20px 0 20px 0;'>$footer</p>";
}
?>
