<?php /* @var $this ListWidget */ ?>
<a data-toggle="add-item" class="more" href="<?php echo Yii::app()->createUrl('/holidays/management/item'); ?>">Add Holiday</a>
<?php
$keys = array_keys($this->attributes);
$indexes = array(
    'status' => array_search('status', $keys),
    'booked_by' => array_search('booked_by', $keys)
);
?>
<input type="hidden" name="indexes" data-status="<?php echo $indexes['status'] ?>"
       data-bookedby="<?php echo $indexes['booked_by'] ?>" />
<?php

$this->widget('zii.widgets.CListView', array(
	'id'=>'holidays',
	'dataProvider'=>$this->contents,
	'itemView'=>'summary',
        'tagName' => 'ul',
		'emptyText' => 'You have no holiday weeks for this property.',
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