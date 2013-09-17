<?php
/* @var $this ManagementController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php $this->beginClip('content'); ?>

<h1>Blocks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php $this->endClip(); ?>