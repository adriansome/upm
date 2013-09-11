<?php
$this->layout = '//layouts/single';
$this->pageTitle = $model->window_title;
?>

<?php $this->beginClip('content'); ?>
   <h1><?php echo $model->name; ?></h1>
   <p>
		<?php $this->widget('SingleLineText',array(
			'name'=>'test text',
		)); ?>
   </p>
<?php $this->endClip(); ?>