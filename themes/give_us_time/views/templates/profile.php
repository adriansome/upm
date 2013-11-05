<?php
/* @var $this UserController */
/* @var $model User */

require_once(Yii::app()->theme->basepath.'/views/elements/header.php');

?>

<div class="constrained">

	<!-- Begin #sidebar -->
	<div id="sidebar" class="column span4">
		<?php

			// If on Edit Property / Availability Page
			if (isset($id) && (int)$id) {
		?>
				<a href="/profile" class="back">Back to Properties</a>
		<?php
			}
		?>

		<nav id="sub-navigation">
		<?php $this->widget('Menu',array(
			'id'=>'submenu',
            'page_id' => $model->id
		)); ?><!-- mainmenu -->
		</nav>

		<?php $this->widget('NuggetArea',array(
			'name'=>'nugget area',
		)); ?>

	</div>
	<!-- End #sidebar -->

	<section id="main-content" class="column span12">
		<?php
		// Render properties if this is a landlord
		if (Yii::app()->user->isLandlord()) {
                    // Display properties list if not editing an existing property
                    if (isset($id) && (int)$id) {
                        ?>
                        <input type="hidden" id="get-params" data-id="<?php echo $id; ?>"/>
                        <?php
                        $this->widget('ListWidget',array(
                            'name'=>'properties',
                            'scenario'=>'edit',
                            'item_id' => $id,
                            'filters' => array(
                                'user_id' => array(
                                    'field_type' => 'string_value',
                                    'value' => Yii::app()->user->id
                                )
                            )
                        ));
                    } else {
                        ?>
                        <h1>Welcome back - <?php echo $model->fullname; ?></h1>
                        
                        <p>Thanks for visiting your Give Us Time profile.</p>
                        
                        <div class="details-container">
                            <h2>Your details</h2>
                            <p>
                            <?php echo "$model->title $model->firstname $model->lastname <br/>
                                $model->phone_number <br/>
                                $model->email <br/>
                                $model->address1, $model->address2 <br/>
                                $model->area, $model->city, <br/>
                                $model->county <br/>
                                $model->country. $model->postcode" ?>                        
                            </p>
                            <a data-toggle="edit-item" class="more" href="/user/management/item">Edit profile</a>

                        </div>
                        
                        <h2>Your properties</h2>                        
                        <div class="properties-container">
                        </div>
                        <br/>
                        <?php
                    }
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
         <p>Thank you for supporting Give Us Time. Your holiday donations are very much appreciated. Please continue to support military families during their holidays by giving them them privacy.</p>
	</section>
</div>

<script type="text/javascript">
    var responsiveFileManager = "<?php echo Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('filemanager'));?>";
</script>

<?php if (!Yii::app()->user->isAdmin()) { ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modal.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modalmanager.js'); ?>
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/adminzone.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('tinymce')).'/tinymce.min.js'); ?>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/properties.js"></script>

<?php
}
Yii::app()->clientScript->registerCssFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.css')).'/jquery.fileupload.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.ui.widget.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modal.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/bootstrap-modalmanager.js'); 
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.ui.widget.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.iframe-transport.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/jquery.fileupload.js');

require_once(Yii::app()->theme->basepath.'/views/elements/footer.php');
?>