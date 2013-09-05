<?php
/* @var $this ManagmentController */
/* @var $model User */

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
);

$this->beginClip('content');
?>

<h1>Create User</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endClip(); ?>