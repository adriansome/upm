<?php /* @var $this ListWidget */ ?>
<a data-toggle="add-item" class="more" href="<?php echo Yii::app()->createUrl('/properties/management/item'); ?>">Add new property</a>
<?php
$this->widget('zii.widgets.CListView', array(
	'id'=>'properties',
	'dataProvider'=>$this->contents,
	'itemView'=>'summary',
	'htmlOptions' => array(
		'class' => 'constrained'					   
	),
	//'summaryText'=> 'Properties',
	'template'=>'{items}',
	/*'pager'=>array(
            'class'=>'CLinkPager',
            'header'=>'',
   	),*/
));
?>
