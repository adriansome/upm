<?php
/* @var $this ManagmentController */
/* @var $model User */

$this->breadcrumbs=array(
	'User Management'=>array('index'),
	$model->fullname
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1><?php echo $model->fullname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		'oldEmail',
		'permissions',
		'username',
		'dateTermsAgreed',
		'dateUpdated',
		'dateLastLogin',
		'dateCreated',
		'dateValidationEmailSent',
		'activationCode',
		'dateEmailValidated',
		'dateAccountExpire',
		'dateRevert',
		'dateReset',
		'dateDeleted',
		'resetCode',
		'revertCode',
	),
)); ?>
