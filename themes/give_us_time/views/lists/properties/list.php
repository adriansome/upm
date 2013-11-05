<?php /* @var $this ListWidget */ ?>
<ul class="booking-listing">
<?php
$this->widget('zii.widgets.CListView', array(
	'id'=>'properties',
	'dataProvider'=>$this->contents,
	'itemView'=>'summary',
	'emptyText'=> 'You have not yet added any properties. Get started by clicking "Add new property".',
	'template'=>'{items}',
	/*'pager'=>array(
            'class'=>'CLinkPager',
            'header'=>'',
   	),*/
));
?>
</ul>
<a data-toggle="add-item" class="more" href="<?php echo Yii::app()->createUrl('/properties/management/item'); ?>">Add new property</a>
