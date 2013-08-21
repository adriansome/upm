<h3>Hi, <?php echo $fullname; ?></h3>
<p>You have recieved this e-mail because we have received a reminder request for your login credentials on <?php echo Yii::app()->name; ?>.</p>
<p>If you did not make this request please disregard this message.</p>
<p>Your Username is: <?php echo $username; ?></p>
<p>You may use the following link to reset your account password for until <?php echo $uidExpires; ?>.<br /> 
<?php echo CHtml::link('Reset my password for '.Yii::app()->name, array('/user/resetPassword', 'uid'=>$uid)); ?></p>