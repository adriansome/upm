<h3>Hi, <?php echo $fullname; ?></h3>
<p>You have recieved this e-mail because you or someone else has changed the e-mail address for your account on <?php echo Yii::app()->name; ?>.</p>
<p>If you did not make this change you may revert to the previously registered e-mail address by <?php echo CHtml::link('following this link', array('user/revertEmail', 'uid'=>$uid)); ?>.</p>