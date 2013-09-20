<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<?php $this->widget('Menu',array(
		'id'=>'mainmenu'
	)); ?><!-- mainmenu -->

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Fanatic Design.<br/>
		All Rights Reserved.
	</div><!-- footer -->

</div><!-- page -->