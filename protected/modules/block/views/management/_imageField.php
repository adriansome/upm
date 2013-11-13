<?php echo $form->textField($content,"[$index]file_value",array('size'=>60,'maxlength'=>140)); 

$subfolder = isset($_SESSION['subfolder']) ? $_SESSION['subfolder'] : '';

$this->widget('TbButton',array(
     'type'=>'success',
     'label' => 'Browse',
     'size' => 'small',
     'url' => "/browse/$index/assets/source/$subfolder",
     'htmlOptions'=>array(
         'data-toggle' => 'modal',
         'data-index' => $index,
         'data-target'=>'#filemanager',
         'class'=>'launch-filemanager button-link',
     ),
 )); 

?>
