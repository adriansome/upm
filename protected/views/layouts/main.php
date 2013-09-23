<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' ); ?>
	<?php require_once(Yii::app()->theme->basepath.'/views/elements/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap')); ?>/assets/css/bootstrap-wysihtml5.css"></link>
	<script src="<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap')); ?>/assets/js/wysihtml5-0.3.0.js"></script>
	<script src="<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap')); ?>/assets/js/bootstrap-wysihtml5.js"></script>
	<?php echo "\n"; ?>
</head>

<body>
	<?php  if(!Yii::app()->user->isGuest && in_array(Yii::app()->user->role, array('admin', 'editor'))):?>
		<!-- If admin or editor logged in load the javascript component and display adminzone menu view here -->
		<script>
		    var responsiveFileManager = "<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('filemanager')); ?>/";
		</script>
		
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('tinymce')).'/tinymce.min.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/adminzone.js'); ?>
		
		<?php $this->widget('AdminzoneMenu'); ?>
	<?php endif?>

	<?php require_once(Yii::app()->theme->basepath.'/views/elements/body.php'); ?>
	<?php echo "\n"; ?>
</body>

</html>