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
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php
        //show all menu items but current one
        $allModels = Page::model()->findAll();
        foreach ($allModels as $key => $aModel) {
            if ($aModel->id == $model->id)
                unset($allModels[$key]);
        }
        echo $form->dropDownList($model, 'parent_id', CHtml::listData($allModels, 'id', 'name'), array('empty' => 'None'));
        ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div><!-- row -->

        <div class="row">
        <?php echo $form->labelEx($model, 'layout'); ?>
        <?php echo $form->dropDownList($model, 'layout', $this->pageLayouts, array('empty'=>' - ')); ?>
        <?php echo $form->error($model, 'layout'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'link'); ?>
        <?php echo $form->textField($model, 'link', array('size' => 60)); ?>
        <?php echo $form->error($model, 'link'); ?>
        <br/>
        <p class="hint">
            Please use either a dash ( - ) or an underscore ( _ ) in place of spaces.
        </p>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'role'); ?>
        <?php echo $form->radioButtonList($model,'role',
            array(
                'all'=>'All', 'guest'=>'Guest', 'subscriber'=>'Subscriber', 'user'=>'User', 'editor'=>'Editor', 'admin'=>'Admin'
            ),
            array(
                'separator'=>'&nbsp;&nbsp;','template' => '{input} {label}',
            )
        ); ?>
        <?php echo $form->error($model, 'role'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'meta_description'); ?>
        <?php echo $form->textArea($model, 'meta_description', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'meta_description'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'meta_keywords'); ?>
        <?php echo $form->textArea($model, 'meta_keywords', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'meta_keywords'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'date_active'); ?>
        <?php echo $form->checkBox($model, 'active', array('value'=>true)) ; ?>
        <?php echo $form->error($model, 'date_active'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'date_visible'); ?>
        <?php echo $form->checkBox($model, 'visible', array('value'=>true)) ; ?>
        <?php echo $form->error($model, 'date_visible'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'date_subpages'); ?>
        <?php echo $form->checkBox($model, 'allowSubpages', array('value'=>true)) ; ?>
        <?php echo $form->error($model, 'date_subpages'); ?>
    </div><!-- row -->

    <div class="row">
        <?php echo $form->labelEx($model, 'target'); ?>
        <?php echo $form->checkBox($model, 'target', array('value' => '_blank')); ?>
        <?php echo $form->error($model, 'target'); ?>
    </div>

    <div class="row buttons">
        <?php
        echo CHtml::submitButton('Save');
        echo CHtml::Button('Cancel', array(
            'submit' => 'javascript:history.go(-1)'));
        ?>
    </div>
    <?php
    $this->endWidget();
    ?>
</div>