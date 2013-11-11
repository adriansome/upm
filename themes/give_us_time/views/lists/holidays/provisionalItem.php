<?php
// get all data for html below
$arrivalDate = DateTime::createFromFormat('d/m/Y', $data['arrival_date']);
$departureDate = DateTime::createFromFormat('d/m/Y', $data['departure_date']);
$status = $data['status'];
$no_bedrooms = intval($data['number_of_bedrooms']);
$no_sleeps = intval($data['sleeps_number']);


$listWidget = new ListWidget();
$listWidget->name = 'properties';
$listWidget->item_id = $data['property_id'];
$listWidget->init();
$attributes = $listWidget->itemAttributes();

$property = $listWidget->contents->rawData;

$property_type = $attributes['type']['values'][$property['type']];
$property_location = $attributes['location']['values'][$property['type']];
$property_url = '/properties?slug='.$property['slug'].'&h='.$data['block_id'];

?>
<!--<pre>
<?php //var_dump($data);?>
</pre>-->

<li style="clear:both;">
    <a href="<?php echo $property_url;?>" class="thumbnail">
        <img src="<?php echo $property['image_1']?>" alt="" />
    </a>
    <div class="column">
        <h2><?php echo $property_location?></h2>
        <p><?php echo "$no_bedrooms bed $property_type. Sleeps $no_sleeps"; ?></p>

        <div class="date-range">
            <div class="date">
                <div class="month"><?php echo $arrivalDate->format('M')?></div>
                <div class="day"><?php echo $arrivalDate->format('d')?></div>
            </div>
            to
            <div class="date">
                <div class="month"><?php echo $departureDate->format('M')?></div>
                <div class="day"><?php echo $departureDate->format('d')?></div>
            </div>
        </div>
    </div>
    <div class="column">
        <h2><?php echo $property_type?></h2>
        <p><?php echo $property['title']?></p>

        <h3>Description</h3>
        <p><?php echo $property['description']?></p>

        <?php if($status == 'provisionally-booked'): ?>
        
            <div class="status provisionally-booked">
                <span>Provisionally Booked</span>
                <a href="#" class="action-button cancel">Cancel</a>
            </div>
            <p>You are waiting for this holiday to be confirmed.</p>
        
        <?php endif; ?>
    </div>
</li>