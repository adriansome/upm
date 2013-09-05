<?php
/* @var $this ManagmentController */
/* @var $model User */

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
);

$this->beginClip('content');
?>

<h1>Update <?php echo $model->fullname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endClip(); ?>