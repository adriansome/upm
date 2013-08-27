<?php
/* @var $this ManagmentController */
/* @var $model User */

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
);
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
