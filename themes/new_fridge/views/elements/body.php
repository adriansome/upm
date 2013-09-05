<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/home'), 'active'=>($_SERVER['REQUEST_URI'] == '/home')),
				array('label'=>'Contact', 'url'=>array('/contact'), 'active'=>(isset(Yii::app()->controller->module) && Yii::app()->controller->module->id=='contact')),
				array('label'=>'Register', 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest, 'active'=>(isset(Yii::app()->controller->module) && Yii::app()->controller->module->id=='user' && Yii::app()->controller->action->id=='register')),
				array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest, 'active'=>(isset(Yii::app()->controller->module) && Yii::app()->controller->module->id=='user' && Yii::app()->controller->action->id=='login')),
				array('label'=>'User Profile', 'url'=>array('/user/profile'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>(isset(Yii::app()->controller->module) && Yii::app()->controller->module->id=='user' && Yii::app()->controller->action->id=='profile')),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Fanatic Design.<br/>
		All Rights Reserved.
	</div><!-- footer -->

</div><!-- page -->