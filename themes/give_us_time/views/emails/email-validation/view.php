
<h3>Hi <?php echo $params['fullname']; ?>,</h3>

<?php
if (isset($header)) {
    echo "<p>$header</p>";
}?>

<?php $url = $this->createAbsoluteUrl('/user/validate?uid=' . $params['uid']) ?>
<h3>Welcome and thank you for registering to use <?php echo Yii::app()->name ?></h3><br />
<p><?php echo CHtml::link('Please follow this link to activate your new user account on<br/>' .  Yii::app()->name, $url); ?></p>

<?php if (isset($footer)) {
    echo "<p>$footer</p>";
}
?>
