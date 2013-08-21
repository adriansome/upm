<h3>Hi, <?php echo $fullname; ?></h3>
<p>You have recieved this e-mail because you or someone else has change the password for your account on <?php echo Yii::app()->name; ?>.</p>
<p>If you did not make this change you may reset your account password by <?php echo CHtml::link('following this link', array('user/revertPassword', 'uid'=>$uid)); ?>.</p>