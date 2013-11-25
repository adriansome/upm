<h3>Hi, <?php echo $fullname; ?></h3>
<p>You have received this e-mail because we have received a request to delete your account on <?php echo Yii::app()->name; ?>.</p>
<p>If you did not make this request you may cancel it by <?php echo CHtml::link('following this link', array('user/revertDeletion', 'uid'=>$uid)); ?>.</p>