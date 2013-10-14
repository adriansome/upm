<h3>Hi, <?php echo $fullname; ?></h3>
<?php $url = $this->createAbsoluteUrl('/user/validate?uid=' . $uid) ?>
<p><?php echo CHtml::link('Please follow this link to activate your new user account on '.Yii::app()->name, $url); ?></p>