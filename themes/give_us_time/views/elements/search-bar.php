<form class="search nugget" id="search-form" action="/search" method="post">
<h1>Holiday search</h1>
    <fieldset>
        <div class="form-row">
        <?php
        echo CHtml::dropDownList('Search[location]',$selectedLocation, $locationAttributes);
        ?>
        </div>
        <div class="form-row">
            <?php
            $weeks[''] = 'Any Week';
            $weeks += Yii::app()->utility->get_week_options('M d, Y');
            echo CHtml::dropDownList('Search[holiday]',$selectedDate, $weeks);
            ?>
        </div>
        <div class="form-row button-row">
                <input type="submit" value="Search" />
        </div>
    </fieldset>
</form>