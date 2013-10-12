<?php
/* @var $this UserController */
/* @var $model User */

require_once(Yii::app()->theme->basepath.'/views/elements/header.php');

?>

<div class="constrained">
	<section id="main-content" class="column span12">
		<h1>Welcome to Give Us Time - <?php echo $model->fullname; ?></h1>
		
		<?php
		// Render properties if this is a landlord
		if (Yii::app()->user->isLandlord()) {
			?>
            <div class="properties-container"></div>
            <?php
		}
		?>
			<?php /*$form=$this->beginWidget('CActiveForm', array(
				'id'=> 'profile-form',
				'htmlOptions' => array(
					'class' => 'standard-form'
				),
				'enableAjaxValidation'=>false,
				'enableClientValidation' => true
			));
			
			// Output fields for this step
			foreach ($fields as $name => $properties) {
				if (isset($properties['on']) && !in_array($model->scenario, $properties['on'])) {
					continue;
				}
				?>
				<div class="form-row">
					<?php echo $form->labelEx($model, $name); ?>
					<div class="form-column-wrapper">
					<?php
					if (!isset($properties['type'])) {
						// Default to text if no type set
						$properties['type'] = 'text';
					}
					switch ($properties['type']) {
						case 'dropdown':
							$list = $name . '_dropdown';
							$listArray = $model->$list;
							$none = array('' => 'Please select...');
							$listArray = $none + $listArray;
							echo $form->dropDownList($model, $name, $listArray);
							break;
						case 'checkbox':
							echo $form->checkBox($model, $name);
							break;
						case 'textarea':
							echo $form->textArea($model, $name);
							break;
						case 'password':
							echo $form->passwordField($model, $name);
							break;
						case 'email':
							echo $form->emailField($model, $name);
							break;
						case 'captcha':
							$form->widget('CCaptcha');
							echo $form->textField($model, $name);
							break;
						default:
							echo $form->textField($model, $name);
							break;
					}
					echo (isset($properties['tooltip'])) ? $properties['tooltip'] : '';
					echo $form->error($model, $name);
					?>
					</div>
				</div>
				<?php
			}
			
		$this->endWidget();	*/
?>
	</section>
</div>

<script type="text/javascript">
    var responsiveFileManager = "<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('filemanager')); ?>/";
</script>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modal.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modalmanager.js'); ?>
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/adminzone.js'); ?>	
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('tinymce')).'/tinymce.min.js'); ?>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/properties.js"></script>