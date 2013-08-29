<?php
$this->menu = array(
    array('label' => PageModule::t('Manage Menus'), 'url' => array('/menu')),
    array('label' => PageModule::t('Create New Menu'), 'url' => array('/menu/menu/create')),
);
?>

<h1> <?php echo Yii::t('app', 'Edit'); ?> <?php echo $model->name; ?> </h1>
<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('class' => 'button', 'submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
        )));

$this->renderPartial('_form', array(
    'model' => $model));
?>