<?php /* @var $this ListWidget */ ?>

<?php $this->widget('zii.widgets.CListView', array(
	'id'=>$this->id,
	'dataProvider'=>$this->contents,
	'itemView'=>'summary',
	'htmlOptions' => array(
		'class' => 'constrained'					   
	),
	'summaryText'=> 'News',
	'template'=>'{summary} {items} {pager}',
	'pager'=>array(
            'class'=>'CLinkPager',
            'header'=>'',
   	),
)); ?>