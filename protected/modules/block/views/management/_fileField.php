<?php echo $form->textField($content,"[$index]file_value",array('size'=>60,'maxlength'=>140));

$this->widget('TbButton',array(
    'type'=>'success',
    'label' => 'Browse',
    'size' => 'small',
    'url' => '#',
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
        'class'=>'launch-filemanager',
	),
));
?>