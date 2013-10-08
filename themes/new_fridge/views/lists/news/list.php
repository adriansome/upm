<?php /* @var $this ListWidget */ ?>

<?php $this->widget('zii.widgets.CListView', array(
	'id'=>$this->id,
	'dataProvider'=>$this->contents,
	'itemView'=>'summary',
	'summaryText'=> 'News {page} of {pages}',
	'template'=>'{summary} {items} {pager}',
	'pager'=>array(
            'class'=>'CLinkPager',
            'header'=>'',
   	),
)); ?>