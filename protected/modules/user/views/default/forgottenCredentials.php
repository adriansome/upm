<?php
/* @var $this UserController */
$this->pageTitle = Yii::app()->name . ' - Forgotten Credentials';
$this->bodyId = 'page-login';
?>
<div id="content">
    <h1>Forgotten Credentials</h1>

    <p>	
        Please enter your registered e-mail address below:
    </p>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'credentials-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('class' => 'standard-form')
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="form-row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="form-row button-row">
        <?php echo CHtml::submitButton('Send Reminder'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>