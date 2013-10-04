<?php /* @var $this ListWidget */ ?>
<?php $this->widget('zii.widgets.CListView', array(
	'id'=>$this->id,
	'dataProvider'=>$this->contents,
	'itemView'=>'summary',
	'summaryText'=>'Post {page} of {pages}',
	'template'=>'{summary} {items} {pager}',
	'pager'=>array(
            'class'=>'CLinkPager',
            'header'=>'',
            /*'maxButtonCount',
            'cssFile',
            'firstPageCssClass',
            'firstPageLabel',
            'lastPageCssClass',
            'lastPageLabel',
            'prevPageCssClass',
            'prevPageLabel',
            'nextPageCssClass',
            'nextPageLabel',
            'selectedPageCssClass',*/
   	),
)); ?>