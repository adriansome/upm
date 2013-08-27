<?php $this->beginContent('//layouts/main'); ?>

<div class="container">
	
	<div id="content" class="span-16">
	
		<?php echo $content; ?>
	
	</div><!-- content -->
	
	<div class="span-6">

		<?php if(isset($this->clips['sidebar1'])): ?>
			
			<?php echo $this->clips['sidebar1']; ?>
		
		<?php else: ?>
		
			<?php $this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget(); ?>
		
		<?php endif; ?>

	</div>
	
</div>

<?php $this->endContent(); ?>