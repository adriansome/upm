<?php $this->layout = '//layouts/righty'; ?>

<?php $this->beginClip('content'); ?>
   <h1><?php echo $model->name; ?></h1>
   <p>
		<?php echo $model->meta_description; ?>
   </p>
<?php $this->endClip(); ?>

<?php $this->beginClip('sidebar1'); ?>
   <p>2col Side bar content</p>
<?php $this->endClip(); ?>