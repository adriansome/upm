<?php

$listWidget = new ListWidget();
$listWidget->name = 'properties';
$listWidget->init();

$attributes = $listWidget->itemAttributes();
$locationAttributes = array('' => 'Any Location');
$locationAttributes += $attributes['country']['values'];
unset($listWidget);
?>


<div class="constrained">

    <!-- Begin #sidebar -->
    <div id="sidebar" class="column span4">
            <form class="search nugget" id="search-form" action="/search" method="post">
            <h1>Holiday search</h1>
                <fieldset>
                    <div class="form-row">
                    <?php


                    echo CHtml::dropDownList('Search[country]',$_POST['Search']['country'], $locationAttributes);
                    ?>
                    </div>
                    <div class="form-row">
                        <?php
                        $weeks[''] = 'Any Week';
                        $weeks += Yii::app()->utility->get_week_options('M d, Y');
                        echo CHtml::dropDownList('Search[holiday]',$_POST['Search']['holiday'], $weeks);
                        ?>
                    </div>
                    <div class="form-row button-row">
                            <input type="submit" value="Search" />
                    </div>
                </fieldset>
            </form>
    </div>
    <!-- End #sidebar -->

    <!-- Begin #main-content -->
    <section id="main-content" class="column span12">
        <?php
        $this->widget('ListWidget',array(
            'name'=>'properties',
            'scenario'=>'results',
            'filters' => $filters,
            'viewData'=>array('attributes'=>$attributes),
        )); 
        ?>
    </section>
    <!-- End #main-content -->
</div>