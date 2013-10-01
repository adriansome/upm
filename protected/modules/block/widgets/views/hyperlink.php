<?php $this->widget('TbButton', array(
	'type'=>'link',
    'label'=>$this->text,
    'url'=>$this->href,
    'htmlOptions'=>array(
    	'id'=>$this->id,
        'target'=>($this->target ? '_blank':'_self')
    ),
)); ?>