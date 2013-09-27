<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Users</h1>

<?php $this->renderPartial('_search', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'id'=>'user-list'
)); ?>