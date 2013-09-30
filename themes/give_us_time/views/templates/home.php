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

<?php $this->widget('Image',array(
	'name'=>'test image block',
	'scope'=>'page',
)); ?>

<?php $this->widget('NuggetArea',array(
	'name'=>'home nugget area',
)); ?>

<?php $this->widget('ListWidget',array(
	'name'=>'blog',
	'scenario'=>'list',
	'pageSize'=>2,
)); ?>

<?php $this->widget('Carousel',array(
	'name'=>'home-carousel',
	'options'=>array(

	),
)); ?>
</div>

<script src="/themes/mps/js/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function() {

		$("#photo-slideshow .slides").carouFredSel({
			items	: 1,
			auto	: 3000,
			pagination: ".slideshow-controls"
		});

		$('.video-trigger').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,

			fixedContentPos: false
		});			
	});

</script>