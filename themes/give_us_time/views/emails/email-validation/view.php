<p>Hi <?php echo $params['fullname']; ?>,</p>

<?php
if (isset($header)) {
    echo "<p style='margin:20px 0 20px 0'>" . nl2br($header) . "</p>";
}?>

<?php $url = $this->createAbsoluteUrl('/user/validate?uid=' . $params['uid']) ?>

<p><?php echo CHtml::link('' .  Yii::app()->name, $url); ?></p>

<?php if (isset($footer)) {
    echo "<p style='margin:20px 0 20px 0'>" . nl2br($footer) . "</p>";
}
?>
