<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
if ($page) {
    $this->bodyId = $page . '-login';
} else {
    $this->bodyId = 'page-login';
}
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);

?>
<div id="page-login">
<div id="content">
	<h1>Login</h1>

	<p>
		<?php
		if(!empty($referer))
		{
			if(!empty($email))
                            $data = array('email'=>$email);

			$this->renderPartial('_'.$referer, $data);
		}
		?>

		Please fill out the following form with your login credentials:
	</p>

	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
                'htmlOptions' => array(
                    'class' => 'standard-form'
                ),
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<div class="form-row">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="form-row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="row rememberMe">
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>

		<div class="form-row button-row">
			<p class="hint">
				<?php echo CHtml::link('Forgotten Username Or Password?', $this->createUrl('/user/default/forgottenCredentials')); ?>
			</p>
			<?php echo CHtml::submitButton('Login'); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>
</div>