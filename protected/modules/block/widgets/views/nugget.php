<div class="nugget" id="<?php echo $this->id; ?>">
	<h2>
		<?php if($this->headerLink): ?>
			<?php echo CHtml::link($this->title, $this->href, array('target'=>($this->target ? '_blank':'_self'))); ?>
		<?php else: ?>
			<?php echo $this->title; ?>
		<?php endif; ?>
	</h2>
	
	<?php 
		if(!empty($this->image_src))
			echo CHtml::image($this->image_src, $this->image_alt, array('title'=>$this->image_title));
	?>

	<?php if($this->text != ''): ?>
		<p><?php echo $this->text; ?></p>
	<?php endif; ?>

	<?php 
	if($this->contentLink)
	{
		$this->widget('TbButton',array(
		    'type'=>'link',
		    'label' => $this->link_text,
		    'url' => $this->href,
			'htmlOptions'=>array(
				'title'=>$this->link_title,
				'target'=>($this->target ? '_blank':'_self')
			),
		));
	}
	?>
</div>