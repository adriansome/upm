<form class="search nugget" id="search-form" action="/search" method="post">
<h1>Holiday search</h1>
    <fieldset>
        <div class="form-row">
        <?php
        echo CHtml::dropDownList('Search[country]',$selectedLocation, $locationAttributes);
        ?>
        </div>
        <div class="form-row">
            <?php
            $months[''] = 'Any Month';
            $months += Yii::app()->utility->get_month_options('F, Y');
            echo CHtml::dropDownList('Search[holiday]',$selectedDate, $months);
            ?>
        </div>
        <div class="form-row button-row">
                <input type="submit" value="Search" />
        </div>
    </fieldset>
</form>