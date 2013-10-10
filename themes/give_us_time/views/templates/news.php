<?php $this->pageTitle = $model->window_title; ?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

<div id="content">

<div>
<?php
$widgetOptions = array('name' => 'news');
if ($slug) {
	$widgetOptions += array(
		'scenario' => 'detail',
		'item_slug' => $slug
	);
} else if ($id) {
	$widgetOptions += array(
		'scenario' => 'detail',
		'item_id' => $id
	);
} else {
	$widgetOptions += array(
		'scenario' => 'list',
		'pageSize' => 4
	);
}

$this->widget('ListWidget', $widgetOptions); ?>
</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

</div>

