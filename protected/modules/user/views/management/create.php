<?php
/* @var $this ManagmentController */
/* @var $model User */

$this->breadcrumbs=array(
	'User Management'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
);
?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>