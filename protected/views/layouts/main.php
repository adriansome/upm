<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' ); ?>
	<?php require_once(Yii::app()->theme->basepath.'/views/elements/htmlHead.php'); ?>
	<?php echo "\n"; ?>
</head>

<body<?php if(isset($this->bodyId)): ?> id="<?php echo $this->bodyId; ?>"<?php endif; ?>>
	<!-- If admin or editor logged in load the javascript component and display adminzone menu view here -->
	<?php  if(!Yii::app()->user->isGuest && in_array(Yii::app()->user->role, array('admin', 'editor'))):?>
		<!-- Set file path of the responsive filemanager component for use by tinymce -->
		<script>
		    var responsiveFileManager = "<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('filemanager')); ?>/";
		</script>
		
		<!-- Import 3rd party vendors js and css files. -->
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('tinymce')).'/tinymce.min.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap.assets.js')).'/bootstrap-wysihtml5.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap.assets.js')).'/wysihtml5-0.3.0.js'); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('bootstrap.assets.css')).'/bootstrap-wysihtml5.css'); ?>

		<!-- Import application components js and css files. -->
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modal.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modalmanager.js'); ?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/adminzone.js'); ?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.css')).'/adminzone.css'); ?>
		
		<?php Yii::app()->clientScript->registerScriptFile($this->module->getAssets() . "/js/json/json2.min.js"); ?>
		<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
		<?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>
		<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getModule('page')->getAssets() . '/js/nestedsortable/jquery.ui.nestedSortable.js');?>
		<?php Yii::app()->clientScript->registerCssFile(Yii::app()->getModule('page')->getAssets() . '/js/nestedsortable/nestedSortable.css');?>

		<!-- Display the flash message element -->
		<div id="flashMessage" display="none"></div>

		<!-- Display the adminzone menu widget -->
		<?php $this->widget('AdminzoneMenu'); ?>
	<?php endif?>
	
	<?php echo $content; ?>
	
	<?php echo "\n"; ?>
</body>

</html>
