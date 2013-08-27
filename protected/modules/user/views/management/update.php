<?php
/* @var $this ManagmentController */
/* @var $model User */

$this->breadcrumbs=array(
	'User Management'=>array('index'),
	$model->fullname=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update <?php echo $model->fullname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>