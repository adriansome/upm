<h3>Hi, <?php echo $fullname; ?></h3>
<p><?php echo CHtml::link('Please follow this link to activate your new user account on '.Yii::app()->name, array('/user/validate', 'uid'=>$uid)); ?></p>