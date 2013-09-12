<?php
/* @var $this ManagementController */
/* @var $model Block */

$this->beginClip('content');
?>

<h1>Update Block <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->endClip(); ?>