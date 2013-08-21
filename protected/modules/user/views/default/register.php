<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Register'=>array('/user/register'),
);
?>

<h1>New User Registration</h1>

<div class="form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>