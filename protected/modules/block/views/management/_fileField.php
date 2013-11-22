<a class="update-thumb" href="<?php echo $content->attributes['file_value']?>" target="_blank" ><img src="/thumbs/<?php echo $content->attributes['file_value']?>_100x100" /></a>
<?php echo $form->hiddenField($content,"[$index]file_value",array('size'=>60,'maxlength'=>140));?>
<?php

$this->widget('TbButton',array(
    'type'=>'success',
    'label' => 'Browse',
    'size' => 'small',
    'url' => '/site/filemanager',
	'htmlOptions'=>array(
		'data-toggle' => 'modal',
		'data-index' => $index,
		'data-target'=>'#filemanager',
        'class'=>'launch-filemanager button-link',
	),
)); ?>