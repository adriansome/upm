<?php
/* @var $this ManagmentController */
/* @var $model User */

$this->breadcrumbs=array(
	'User Management'
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>User Management</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fullname',
		'email',
		'oldEmail',
		'username',
		'permissions',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
