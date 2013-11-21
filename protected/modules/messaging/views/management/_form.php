<div class="form"> 
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'message-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
    ));

    echo $form->errorSummary($model);
    ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'header'); ?>
        <?php echo $form->textArea($model, 'header', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'header'); ?>
    </div>
    
    <div class="row">
        <p>&lt;FORM DATA INSERTED HERE&gt;</p>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'footer'); ?>
        <?php echo $form->textArea($model, 'footer', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'footer'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'recipient'); ?>
        <?php echo $form->textField($model, 'recipient'); ?>
        <?php echo $form->error($model, 'recipient'); ?>
    </div>     
    <?php
    $this->endWidget();
    ?>

</div>
