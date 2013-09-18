<?php /* @var $this ListWidget */ ?>
<?php $this->widget('zii.widgets.CListView', array(
	'id'=>$this->type,
	'dataProvider'=>$this->contents,
	'itemView'=>'summary',
)); ?>