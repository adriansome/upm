<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'User Profile',
);

$this->menu=array(
	array('label'=>'Update Account Details', 'url'=>array('update')),
	array('label'=>'Change E-mail Address', 'url'=>array('updateEmail')),
	array('label'=>'Change Password', 'url'=>array('updatePassword')),
	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete'),'confirm'=>'Are you sure you want to delete your account?')),
);

$this->beginClip('content');
?>

<h1><?php echo $model->fullname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		'username',
		'date_created',
	),
)); ?>

<?php $this->endClip(); ?>