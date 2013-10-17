<?php

if (isset($slug) && $slug) {

    $this->pageTitle = $model->window_title;

    require_once(Yii::app()->theme->basepath.'/views/elements/header.php');
    ?>


    <div id="content">

    <div>
    <?php
    $widgetOptions = array(
        'name' => 'properties',
        'scenario' => 'detail',
        'item_slug' => $slug        
    );

    $this->widget('ListWidget', $widgetOptions); ?> 
    </div>
    </div>
    <?php 
    require_once(Yii::app()->theme->basepath.'/views/elements/footer.php');
    
    
} else {

$this->widget('ListWidget',array(
    'name'=>'properties',
    'scenario'=>'list',
    'filters' => array(
        'user_id' => array(
            'field_type' => 'string_value',
            'value' => Yii::app()->user->id
        )
    )
)); 

}
?>


