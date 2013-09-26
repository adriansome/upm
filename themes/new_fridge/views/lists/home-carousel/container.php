<?php $this->widget('zii.widgets.CListView', array(
	'id'=>$this->name,
	'dataProvider'=>$this->contents,
	'itemView'=>'slide',
	'template'=>'{items}',
	'htmlOptions'=>array(
		'class'=>'carousel'
	),
)); ?>