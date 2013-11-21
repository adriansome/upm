<?php
/* @var $this ManagmentController */
/* @var $model User */
$this->beginWidget('TbModal', array('id'=>'update-messaging', 'htmlOptions'=>array('data-keyboard'=>'false', 'data-backdrop'=>'static', 'data-locked'=>'true'))); ?>

<div class="modal-header">
    <h4>Message Details</h4>
</div>

<div class="modal-body">

<?php
echo "<p>From: " . $model->from_email . "</p>";
echo "<p>To: " . $model->recipients . "</p>";
echo "<p>Subject: " . $model->subject . "</p>";
echo "<p>Message: " . $model->message .  "</p>";
?>
</div>

<?php $this->endWidget(); ?>
?>