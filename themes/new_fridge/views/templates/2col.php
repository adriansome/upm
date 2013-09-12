<?php 
$this->layout = '//layouts/righty';
$this->pageTitle = $model->window_title;
?>

<?php $this->beginClip('content'); ?>
   <h1><?php echo $model->name; ?></h1>
	   <?php $this->widget('SingleLineText',array(
			'name'=>'page text',
			'scope'=>'page',
		)); ?>
<?php $this->endClip(); ?>

<?php $this->beginClip('sidebar1'); ?>
   <p>2col Side bar content</p>
<?php $this->endClip(); ?>