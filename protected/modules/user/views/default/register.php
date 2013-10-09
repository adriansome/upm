
<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

require_once(Yii::app()->theme->basepath.'/views/elements/header.php');

Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.js')).'/register.js');
//Yii::app()->clientScript->registerScriptFile("/js/register.js");

?>
<div class="constrained">
	<div id="sidebar" class="column span4"></div>
	<section id="main-content" class="column span12">
		<h1>Registration for Give Us Time</h1>
	
		<div class="inner-content form-wrapper">
		<?php
		
		if (count($steps) > 1) {
		?>
		<ol class="form-steps">
			<?php
			$x = 0;
			foreach ($steps as $name => $step) {
				?>
				<li <?php if ($x == 0) echo 'class="active"'; ?>>
				<a data-step='<?php echo $name ?>' href='#'><?php echo $step['title']; ?></a></li>
				<?php
				$x++;
			}
			?>
		</ol>	
		<?php
		}
		
		// If steps have not been specified, output all fields in one step
		if (!isset($steps)) {
			$steps = array('');
		}
		$fields = $form_fields;
		$step_count = 0;
		$total_steps = count($steps);
		// Go through steps and output fields for each
		foreach ($steps as $step_name => $step) {
			// Set allowed field count for this step, or set to -1 for unlimited
			$field_count = isset($step['fields']) ? $step['fields'] : -1;
			$x = 0;
			echo "<div class='step {$step_name}";
			if ($step_count == 0) {
				echo ' active';
			}
			echo "'>";		

			
			// Reset fields for confirmation (unset fields that won't be output)
			if ($step_name == 'confirmation') {
				$fields = $form_fields;
				unset($fields['password1'], $fields['password2'], $fields['email_confirm']);
			}
						
			?>

			<p class="note"><?php echo $step['desc'] ?></p>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'registration-form-' . $step_name,
				'htmlOptions' => array(
					'class' => 'standard-form'
				),
				'enableAjaxValidation'=>false,
				'enableClientValidation' => true
			));
			?>

			<?php
			if ($step_name !== 'confirmation') {
				//echo $form->errorSummary($model);
			}
			$labels = $model->attributeLabels();
		
			CHtml::$afterRequiredLabel = ' <span>(required)</span>';
			
			// Output fields for this step
			foreach ($fields as $name => $properties) {
				if ($x == $field_count) {
					break;
				}

				?>
				<div class="form-row">
					<?php echo $form->labelEx($model, $name); ?>
					<div class="form-column-wrapper">
					<?php
					if ($step_name !== 'confirmation' || $name == 'date_terms_agreed' || $name == 'captcha_code') {
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
					} else {
						echo "<span></span>";
					}				
					?>
					</div>
				</div>
				<?php
				unset($fields[$name]);
				$x++;
			}
			
			$this->endWidget();
			?>
			<div class="form-row button-row">
				<form method="post">
				<?php
				if ($step_count >= 1) {
					echo "<a class='back' href='#'>Back</a>";
				}
				if ($total_steps == ($step_count + 1)) {
					?>
					
					<?php echo CHtml::submitButton('Submit'); ?>
					
					<?php
				} else {
					?>
					<a class="more">Next</a>
					<?php
				}
				?>
				<div class="hidden"></div>
				</form>
			</div>				
			<?php
			echo '</div>';
			$step_count++;
		}
		?>
	
		</div>
	</section>
</div>