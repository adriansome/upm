<?php $this->pageTitle = $model->window_title; ?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

<div id="content">
<h1>
	<?php $this->widget('SingleLineText',array(
		'name'=>'test text',
		'scope'=>'page',
	)); ?>
</h1>

<p>
	<?php $this->widget('RichText',array(
		'name'=>'test text block',
		'scope'=>'page',
	)); ?>
</p>

<h2>
	<?php $this->widget('SingleLineText',array(
		'name'=>'test heading',
		'scope'=>'page',
	)); ?>
</h2>

<p>
	<?php $this->widget('MultiLineText',array(
		'name'=>'test text block 2',
		'scope'=>'page',
	)); ?>
</p>

<div>
<?php $this->widget('Image',array(
	'name'=>'test image block',
	'scope'=>'page',
)); ?>
</div>

<div>
<?php $this->widget('NuggetArea',array(
	'name'=>'home nugget area',
)); ?>
</div>

<div>
<?php $this->widget('ListWidget',array(
	'name'=>'blog',
	'scenario'=>'list',
	'pageSize'=>2,
)); ?>
</div>

<div>
<?php $this->widget('Carousel',array(
	'name'=>'home-carousel',
	'options'=>array(

	),
)); ?>
</div>

<<<<<<< Updated upstream
<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>
=======
</div>
>>>>>>> Stashed changes
