<?php /* @var $data CArrayDataProvider */ 

$arrival = date_parse_from_format('d/m/Y', $data['holiday']['arrival_date']);
$departure = date_parse_from_format('d/m/Y', $data['holiday']['departure_date']);

?>
<li>
<?php if (isset($data['property']['image']) && !empty($data['property']['image'])):?>
        <?php $img_path = Yii::app()->basePath . '/..' . $data['property']['image'];?>
        <?php if (is_file($img_path)):?>
                <?php echo '<a href="/properties?slug='.$data['property']['slug'].'" class="thumbnail"><img src="'.$data['property']['image'].'" /></a>'?>
        <?php endif?>
<?php endif?>
        <div class="column">
        <h2><?php echo $attributes['location']['values'][$data['property']['location']]; ?></h2>
            <p><?php 
            echo $data['holiday']['number_of_bedrooms'] . ' bed ' . 
            $attributes['type']['values'][$data['property']['type']] . '. ';   
            echo 'Sleeps ' . $data['holiday']['sleeps_number'];
            ?>
            </p>

            <div class="date-range">
                    <div class="date">
                        <div class="month"><?php echo date("F", mktime(0, 0, 0, $arrival['month'])); ?></div>
                        <div class="day"><?php echo $arrival['day'] ?></div>
                    </div>

                    to

                    <div class="date">
                        <div class="month"><?php echo date("F", mktime(0, 0, 0, $departure['month'])); ?></div>
                        <div class="day"><?php echo $departure['day'] ?></div>
                    </div>
            </div>
        </div>
        <div class="column">
                <h2>Resort</h2>
                <p><?php echo $data['property']['title'] ?></p>
                
                <?php
                if ($data['property']['description']) {
                    ?>
                    <h3>Description</h3>
                    <p><?php echo $data['property']['description'] ?></p>                
                    <?php
                }
                ?>


                <?php
                $facilities = array(
                    'disabled_access' => 'Disabled Access',
                    'beach' => 'Beach',
                    'child_friendly' => 'Child-friendly',
                    'cancellation_fee' => 'Cancellation Fee'
                );

                $outputHeading = TRUE;
                $facilityOutput = FALSE;
                $x = 1;
                foreach ($facilities as $id => $text) {
                    if ($x == count($facilities) && $facilityOutput) {
                        echo "</ul>";
                    }
                    $x++;
                    if ($data['property'][$id] == 0) {
                        continue;
                    }
                    if ($outputHeading) {
                        $facilityOutput = TRUE;
                        echo "<h3>Facilities</h3>";
                        echo "<ul class='facilities'>";
                        $outputHeading = FALSE;
                    }
                    echo "<li class='{$id}' data-tooltip='{$text}'><span>{$text}</span></li>";
                }
                ?>


                <a href="/properties?slug=<?php echo $data['property']['slug']; ?>" class="more">Full Details</a>
        </div>
</li>
