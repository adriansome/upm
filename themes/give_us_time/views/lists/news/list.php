<?php /* @var $this ListWidget */ ?>
<h1>News</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'id'=>$this->id,
    'dataProvider'=>$this->contents,
    'itemView'=>'summary',
    'template'=>'{items} {pager}',
    'pager'=>array(
        'class'=>'CLinkPager',
        'header'=>'',
    ),
)); ?>