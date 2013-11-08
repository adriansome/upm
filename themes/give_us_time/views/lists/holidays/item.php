<?php /* @var $data CArrayDataProvider */

$arrival = date_parse_from_format('d/m/Y', $data['holiday']['arrival_date']);
$departure = date_parse_from_format('d/m/Y', $data['holiday']['departure_date']);

?>
<li<?php if($data['holiday']['status'] == 'provisionally-booked') echo " class='provisionally-booked'" ?>>
        <div class="picture-frame">
<?php if (isset($data['property']['image_1']) && !empty($data['property']['image_1'])):?>
        <?php $img_path = Yii::app()->basePath . '/..' . $data['property']['image_1'];?>

        <?php if (is_file($img_path)):?>
                <?php echo '<a href="/properties?slug='.$data['property']['slug'].'"><img src="/thumbs'.$data['property']['image_1'].'_210x150" /></a>'?>
        <?php endif?>

<?php endif?>
        </div>

        <div class="listing-details-wrapper">
			<h2><?php echo $data['property']['title'] . ', ' . $data['property']['area'] . ', ' . $data['property']['country'] . ' (' . $attributes['location']['values'][$data['property']['location']] .  ')'; ?></h2>
			<p><?php
			echo $data['holiday']['number_of_bedrooms'] . ' bed ' .
			$attributes['type']['values'][$data['property']['type']] . '. ';
			echo 'Sleeps ' . $data['holiday']['sleeps_number'];
			?>
			</p>

			<div>
					<div class="column">
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
						<?php
						if ($data['property']['description']) {
							?>
							<!--<h3>Description</h3>-->
							<p><?php echo Yii::app()->utility->truncate_text($data['property']['description'], 450); ?></p>
							<?php
						}
						?>

						<?php
						$facilities = array(
							'wifi' => 'Wi-Fi',
							'gym' => 'Gym',
							'beach' => 'Beach',
							'swimming_pool' => 'Swimming Pool',
							'parking' => 'Parking',
							'disabled_access' => 'Disabled Access',
							'child_friendly' => 'Child-friendly',
							'dog_friendly' => 'Dog-friendly',
							'cancellation_fee' => 'Cancellation Fee'
						);

						$facilities_start = "<!--<h3>Facilities</h3>--><ul class='facilities'>";
						$facilities_end = "</ul>";
						$facilities_inner = '';

						foreach ($facilities as $id => $text) {
							if (isset($data['property'][$id]) && $data['property'][$id] == 1) {
								$facilities_inner  .= "<li class='{$id}' data-tooltip='{$text}'><span>{$text}</span></li>";
							}
						}

						if ($facilities_inner) {
							echo $facilities_start . $facilities_inner . $facilities_end;
						}

						$propertyUrl = '/properties?slug=' . $data['property']['slug']
									. '&h=' . $data['holiday']['block_id'];
						if (isset($_POST['Search']['location']) && $_POST['Search']['location']) {
							$propertyUrl .= '&l=' . $_POST['Search']['location'];
						}
						if (isset($_POST['Search']['holiday']) && $_POST['Search']['holiday']) {
							$propertyUrl .= '&d=' . $_POST['Search']['holiday'];
						}

						if ($data['holiday']['status'] == 'provisionally-booked') {
						?>
							<div class="status">Provisionally Booked</div>
						<?php
						} else {
						?>
							<a href="<?php echo $propertyUrl ?>" class="more">Full Details</a>
						<?php
						}
						?>

				</div>
			</div>
			</div>
</li>
