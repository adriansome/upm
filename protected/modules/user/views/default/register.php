
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

                if ( Yii::app()->request->getQuery('type') == 'landlord') {
                ?>
                    <form class="standard-form" method="post" action="/login">
                        <h3>Already registered?</h3>
                        <p>Log in to Give Us Time.</p>

                        <fieldset>
                            <div class="form-row">
                                <label>Username</label>
                                <input type="text" name="LoginForm[username]" />
                            </div>
                            <div class="form-row">
                                <label>Password</label>
                                <input type="password" name="LoginForm[password]" />
                            </div>
                            <div class="form-row button-row">
                                <input type="submit" value="Login" />
                            </div>
                        </fieldset>
                    </form>
                    <h3 class="form-heading">Register as a new user</h3>
                <?php
                }

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
				'enableAjaxValidation'=>true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                    'validateOnChange' => true,
                                    'afterValidate' => 'js:updateStep'
                                ),
				'enableClientValidation' => true
			));
			?>

			<?php
			$labels = $model->attributeLabels();

			CHtml::$afterRequiredLabel = ' <span>(required)</span>';

			// Output fields for this step
			foreach ($fields as $name => $properties) {
				if ($x == $field_count) {
					break;
				}

				?>
				<div class="form-row">
                                    <?php
                                    $labelHtml = '';
                                    // Output link to terms and conditions
                                    if ($name == 'date_terms_agreed') {
                                        if (Yii::app()->request->getQuery('type') == 'landlord') {
                                            $labelHtml = array(
                                                'class' => 'terms landlord'
                                            );
                                        } else {
                                            $labelHtml = array(
                                                'class' => 'terms user'
                                            );
                                        }
                                    }
                                    echo $form->labelEx($model, $name, $labelHtml);
                                    ?>
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
                                                            $form->widget('CCaptcha', array(
                                                                'buttonLabel' => false
                                                            ));
                                                            echo $form->textField($model, $name);
                                                            echo "<a id='yw0_button' class='captcha_link' href='/user/captcha/?refresh=1'>Try a different code</a>";
                                                            break;
                                                    default:
                                                            echo $form->textField($model, $name);
                                                            break;
						}
						echo (isset($properties['tooltip'])) ? $properties['tooltip'] : '';
						echo $form->error($model, $name);
					} else {
						echo '<span class="form-value"></span>';
					}
					?>
					</div>
				</div>
				<?php
				unset($fields[$name]);
				$x++;
			}
			?>
			<div class="form-row button-row">
				<?php
				if ($step_count >= 1) {
					echo "<a class='back' href='#'>Back</a>";
				}

                                $buttonText = ($total_steps === ($step_count + 1)) ? 'Submit' : 'Next'
                                ?>

                                <a class="more"><?php echo $buttonText ?></a>
                        </div>
			<?php
			echo '</div>';
			$step_count++;

			$this->endWidget();

		}
                ?>
                <input type="hidden" id="reg-type" value="<?php echo Yii::app()->request->getQuery('type', 'user'); ?>" />
                <form method="post">
                <div id="ajax-register" class="hidden">
                </div>
                </form>

		</div>
	</section>
</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>
