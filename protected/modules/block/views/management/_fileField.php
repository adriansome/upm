<?php echo $form->textField($content,"[$index]file_value",array('size'=>60,'maxlength'=>140)); ?>

<?php $this->widget('TbButton',array(
    'type'=>'success',
    'label' => 'Browse',
    'size' => 'small',
    'url' => '/site/filemanager',
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-index' => $index,
		'data-target'=>'#filemanager',
        'class'=>'launch-filemanager',
	),
)); ?>
