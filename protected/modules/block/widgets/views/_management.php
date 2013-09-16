<?php 
Yii::app()->clientScript->registerScript(
    'block-'.$this->id.'-management-trigger',
    "$(document).ready(function() {
        $('#edit-block-".$this->id."').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            if (url.indexOf('#') == 0) {
                $(url).modal('open');
            } else {
                $.get(url,function(response) {
                    $(response).modal();
                }).success(function() {
                    $('#block-".$this->id."-management').live('hidden',function() {
                        $('#block-".$this->id."-management').remove();
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