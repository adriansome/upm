<?php
/* @var $this UserController */
$this->pageTitle=Yii::app()->name . ' - Password Reset Expired';
$this->breadcrumbs=array(
	'Password Reset',
);

$this->beginClip('content');
?>

<h1>Password Reset Expired</h1>

<p>
	It seems you have missed the time period this link was valid for.<br /> 
	If you still need to reset your account password please <?php echo CHtml::link('follow this link', array('/user/forgottenCredentials')); ?>.
</p>
<?php $this->endClip(); ?>