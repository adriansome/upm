<?php /* @var $this ListWidget */ ?>
<a data-toggle="add-item" class="more" href="<?php echo Yii::app()->createUrl('/holidays/management/item'); ?>">Add Holiday</a>
<?php
$this->widget('zii.widgets.CListView', array(
	'id'=>'holidays',
	'dataProvider'=>$this->contents,
	'itemView'=>'summary',
        'tagName' => 'ul',
	'htmlOptions' => array(
		'class' => 'booking-listing constrained'					   
	),
	//'summaryText'=> 'Properties',
	'template'=>'{items}',
	/*'pager'=>array(
            'class'=>'CLinkPager',
            'header'=>'',
   	),*/
));
?>