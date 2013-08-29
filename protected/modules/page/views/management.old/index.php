<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'Manage Page', 'url'=>array('admin')),
);
?>

<h1>Pages</h1>

<?php $this->renderPartial('_search', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'id'=>'page-list'
)); ?>
