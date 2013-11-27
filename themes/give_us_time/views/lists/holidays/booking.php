<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/booking.js"></script>
<?php

$keys = array_keys($attributes);
$indexes = array(
    'status' => array_search('status', $keys),
    'booked_by' => array_search('booked_by', $keys)
);

?>

	<form id="provisional-booking" action="/block/management/update/<?php echo $holiday_id; ?>" method="post" class="standard-form">
        <h2>Make A Provisional Booking</h2>
        <p>To make a provisional booking we need to know who is travelling with you on the holiday.</p>
        <input type="hidden" id="indexes" data-status="<?php echo $indexes['status'] ?>"
       data-bookedby="<?php echo $indexes['booked_by'] ?>" />
        <input type="hidden" id="booked-by" value="<?php echo Yii::app()->user->id; ?>" />
        <input type="hidden" id="landlord-data"
               data-id="<?php echo $landlord_id ?>"/>
        <div class="form-row">
            <label>How many people are going on the holiday including you? <span class="required">(required)</span></label>
            <select name="total_people" class="short"> <!-- Should this just be a text input to allow for greater flexibility? -->
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
        </div>
        <fieldset>
            <legend>Person 1</legend>

            <div class="form-row">
				<label>Name</label>
				<input name="name" readonly="readonly" value="<?php echo $user_name ?>" type="text" />
            </div>
        </fieldset>

        <div class="form-row">
			<div class="form-column-wrapper">
				<p>We would like all Give Us Time holiday users to write a short holiday story after returning from their holiday.</p>
				<label>I agree to write a short holiday story when I return <input type="checkbox" /></label>
			</div>
		</div>

        <div class="form-row button-row">
            <a href="#" class="more">Provisionally Book</a>
            <div class="error"></div>
        </div>
	</form>

<fieldset class="hidden extra-person">
    <legend>Person <span class="person_no"></span></legend>

    <div class="form-row">
            <label>Name <span class="required">(required)</span></label>
            <input name="name" type="text">
    </div>

    <div class="form-row">
            <label>Age <span class="required">(required)</span></label>
            <input name="age" type="text">
    </div>

    <div class="form-row">
            <label>Relationship to you <span class="required">(required)</span></label>
            <input name="relationship" type="text">
        </div>
</fieldset>