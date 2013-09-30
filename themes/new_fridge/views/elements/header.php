<div id="header">
	<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
</div><!-- header -->

<?php $this->widget('Menu',array(
	'id'=>'mainmenu'
)); ?><!-- mainmenu -->