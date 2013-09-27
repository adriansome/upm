<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div id="content">
	<h1>Registration Successful</h1>

	<p>
		Please verify your e-mail address by following the link sent to <?php echo $email; ?><br />
		If the E-mail cannot be found in your inbox please also check your spam/junk mail folder.<br />
		If you did not receive the message please request a resend by <?php echo CHtml::link('following this link', array('registrationSuccess', 'resend'=>true)); ?>.
	</p>
</div>