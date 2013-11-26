<form class="search nugget" id="search-form" action="/search" method="post">
<h1>Holiday search</h1>
    <fieldset>

                <div class="form-row">
                    <?php
                        $months[''] = 'Any Month';
                        $months += Yii::app()->utility->get_month_options('F, Y');

                        echo CHtml::dropDownList('Search[holiday]','', $months);
                    ?>
                </div>

                <div class="form-row">
                    <?php
                        $listWidget = new ListWidget();
                        $listWidget->name = 'properties';
                        $listWidget->init();

                        $attributes = $listWidget->itemAttributes(array('withHolidays' => TRUE));
                        unset($listWidget);
                        $countries = array('Any Country') + $attributes['country']['values'];
                        echo CHtml::dropDownList('Search[country]','', $countries);
                    ?>
                </div>
                <div class="form-row hidden">
                    <?php
                        $regions = array('' => 'Any Region');
                        echo CHtml::dropDownList('Search[region]','', $regions);
                    ?>
                </div>                
                <div class="form-row">
                    <input type="submit" class="more" value="Search" />
                </div>
    </fieldset>
</form>