<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'menu-item-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'link'); ?>
        <?php echo $form->textField($model, 'link', array('size' => 60)); ?>
        <?php echo $form->error($model, 'link'); ?>
        <br/>
        <p class="hint">
            Use - OR _ in place of spaces.
        </p>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'enabled'); ?>
        <?php echo $form->checkBox($model, 'enabled'); ?>
        <?php echo $form->error($model, 'enabled'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'role'); ?>
        <?php
        echo CHtml::checkBoxList(get_class($model) . '[role]', explode(',', $model->role), $model->roles, array('selected' => 'all'));
        ?>
        <?php echo $form->error($model, 'role'); ?>
    </div><!-- row -->


    <div class="row">
        <?php echo $form->labelEx($model, 'Open in new tab?'); ?>
        <?php echo CHtml::checkBox('Page[target]', $model->target == '_blank', array('value' => '_blank')); ?>
        <?php echo $form->error($model, 'target'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php
        //show all menu items but current one
        $allModels = Page::model()->findAll();
        foreach ($allModels as $key => $aModel) {
            if ($aModel->id == $model->id)
                unset($allModels[$key]);
        }
        echo $form->dropDownList($model, 'parent', CHtml::listData($allModels, 'id', 'name'), array('prompt' => 'None'));
        ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div><!-- row -->

    <div class="row buttons">
        <?php
        echo CHtml::submitButton(Yii::t('app', 'Save'));
        echo CHtml::Button(Yii::t('app', 'Cancel'), array(
            'submit' => 'javascript:history.go(-1)'));
        ?>
    </div>
    <?php
    $this->endWidget();
    ?>
</div>