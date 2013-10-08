<?php
/* @var $this UserController */
/* @var $model User */
?>

<div id="content">
	<h1><?php echo $model->fullname; ?></h1>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'email',
			'username',
			'date_created',
		),
	)); ?>
</div>