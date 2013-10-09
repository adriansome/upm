<?php $this->pageTitle = $model->window_title; ?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

<div id="content">
    
<div>
<?php $this->widget('ListWidget',array(
	'name'=>'properties',
	'scenario'=>'list',
    'pageSize' => 4
)); ?>
</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

</div>

