<?php 
/* @var $this ManagmentController */
/* @var $model User */
/* @var $form CActiveForm */
  
Yii::app()->clientScript->registerCss('user-management-form',' 
    div#content span#User_role input { 
        margin-left: 1em; 
    } 
  
    div#content span#User_role input:first-of-type { 
        margin-left: 0; 
    } 
       
    div#content span#User_role label, 
    div#content span#User_role input { 
        display: inline-block; 
    } 
'); 
  
  
 $form=$this->beginWidget('CActiveForm', array( 
    'id'=>'user-form', 
    'enableAjaxValidation'=>false, 
)); ?> 
  
    <p class="note">Fields with <span class="required">*</span> are required.</p> 
  
    <?php echo $form->errorSummary($model); ?> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'title'); ?> 
        <?php echo $form->textField($model,'title'); ?> 
        <?php echo $form->error($model,'title'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'initial'); ?> 
        <?php echo $form->textField($model,'initial'); ?> 
        <?php echo $form->error($model,'initial'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'firstname'); ?> 
        <?php echo $form->textField($model,'firstname',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'firstname'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'lastname'); ?> 
        <?php echo $form->textField($model,'lastname',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'lastname'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'address1'); ?> 
        <?php echo $form->textField($model,'address1',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'address1'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'address2'); ?> 
        <?php echo $form->textField($model,'address2',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'address2'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'area'); ?> 
        <?php echo $form->textField($model,'area',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'area'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'city'); ?> 
        <?php echo $form->textField($model,'city',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'city'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'county'); ?> 
        <?php echo $form->textField($model,'county',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'county'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'postcode'); ?> 
        <?php echo $form->textField($model,'postcode',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'postcode'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'country'); ?> 
        <?php echo $form->textField($model,'country',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'country'); ?> 
    </div> 
  
    <div class="row"> 
        <?php echo $form->labelEx($model,'phone_number'); ?> 
        <?php echo $form->textField($model,'phone_number',array('size'=>40,'maxlength'=>40)); ?> 
        <?php echo $form->error($model,'phone_number'); ?> 
    </div> 
  
<?php $this->endWidget(); ?> 