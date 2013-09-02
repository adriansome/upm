<h1>Edit <?php echo $model->name; ?> </h1>

<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('class' => 'button', 'submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
)));

$this->renderPartial('_form', array('model' => $model));
?>