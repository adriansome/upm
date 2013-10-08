<?php $this->widget('CarouselView', array(
	'id'=>$this->name,
	'dataProvider'=>$this->contents,
	'itemView'=>'slide',
	'template'=>'{items}',
	'htmlOptions'=>array(
		'class'=>'carousel'
	),
)); ?>