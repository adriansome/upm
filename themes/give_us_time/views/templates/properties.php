<?php
$this->widget('ListWidget',array(
    'name'=>'properties',
    'scenario'=>'list',
    'filters' => array(
        'user_id' => array(
            'field_type' => 'string_value',
            'value' => Yii::app()->user->id
        )
    )
)); ?>


