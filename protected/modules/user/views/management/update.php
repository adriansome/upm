<?php
/* @var $this ManagmentController */
/* @var $model User */
?>

<h1>Update <?php echo $model->fullname; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>