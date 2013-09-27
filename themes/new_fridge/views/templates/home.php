<?php
$this->pageTitle = $model->window_title;
?>

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

<?php $this->widget('NuggetArea',array(
	'name'=>'home nugget area',
)); ?>

<?php $this->widget('ListWidget',array(
	'type'=>'blog',
	'name'=>'blog',
	'scenario'=>'list',
	'pageSize'=>2,
)); ?>

<?php $this->widget('Carousel',array(
	'type'=>'carousel',
	'name'=>'home-carousel',
	'options'=>array(
		
	),
)); ?>
</div>