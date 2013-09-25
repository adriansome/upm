<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' ); ?>
	<?php require_once(Yii::app()->theme->basepath.'/views/elements/head.php'); ?>
	<?php echo "\n"; ?>
</head>

<body<?php if(isset($this->bodyId)): ?> id="<?php echo $this->bodyId; ?>"<?php endif; ?>>
	<?php  if(!Yii::app()->user->isGuest && in_array(Yii::app()->user->role, array('admin', 'editor'))):?>
		<!-- If admin or editor logged in load the javascript component and display adminzone menu view here -->
		<script>
		    var responsiveFileManager = "<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('filemanager')); ?>/";
		</script>
		
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('tinymce')).'/tinymce.min.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap.assets.js')).'/bootstrap-modal.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap.assets.js')).'/bootstrap-modalmanager.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap.assets.js')).'/bootstrap-wysihtml5.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap.assets.js')).'/wysihtml5-0.3.0.js'); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap.assets.css')).'/bootstrap-wysihtml5.css'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/adminzone.js'); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.css')).'/adminzone.css'); ?>
		
		<?php $this->widget('AdminzoneMenu'); ?>
	<?php endif?>

	<?php require_once(Yii::app()->theme->basepath.'/views/elements/body.php'); ?>
	<?php echo "\n"; ?>
</body>

</html>
