<?php 
Yii::app()->clientScript->registerScript(
    'block-management-trigger',
    "$(document).ready(function() {
        $('[data-toggle=\"modal\"]').click(function(e) {
            e.preventDefault();
            
            var url = $(this).attr('href');
            var id = $(this).attr('id');
            var target = $(this).attr('data-target');

            if (url.indexOf('#') == 0) {
                $(url).modal('open');
            } else {
                $.get(url,function(response) {
                    $(response).modal();
                }).success(function() {
                    $(target).live('hidden',function() {
                        $(target).remove();
                    });
                });
            }
        });
    });"
);

$this->widget('TbButton',array(
    'type'=>'primary',
    'label' => 'edit',
    'size' => 'small',
    'url' => Yii::app()->createUrl('/block/management/update/id/'.$this->id),
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-target'=>'#block-'.$this->id.'-management',
        'id'=>'edit-block-'.$this->id,
	),
));
?>