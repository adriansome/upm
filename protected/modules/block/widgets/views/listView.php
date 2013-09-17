<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$this->contents,
	'itemView'=>'blogItem',
	'id'=>'blog-listing'
)); ?>