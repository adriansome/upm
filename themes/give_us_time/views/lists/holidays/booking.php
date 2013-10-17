<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/booking.js"></script>

<form action="#" method="post" class="standard-form">
        <h2>Make A Provisional Booking</h2>
        <p>To make a provisional booking we need to know who is travelling with you on the holiday.</p>

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
                        <input type="text" />
                </div>
        </fieldset>
        <fieldset class="hidden extra-person">
                <legend>Person 2</legend>

                <div class="form-row">
                        <label>Name <span class="required">(required)</span></label>
                        <input type="text">
                </div>

                <div class="form-row">
                        <label>Age <span class="required">(required)</span></label>
                        <input type="text">
                </div>

                <div class="form-row">
                        <label>Relationship to you <span class="required">(required)</span></label>
                        <input type="text">
                </div>
        </fieldset>
        <div class="form-row">
                <div class="form-column-wrapper">
                        <p>We would like all members of Give Us Time to write a short holiday story after returning from their holiday.</p>
                        <label>I agree to write a short holiday story when I return <input type="checkbox" /></label>
                </div>
        </div>

        <div class="form-row button-row">
            <a href="#" class="more">Provisionally Book</a>
        </div>
</form>