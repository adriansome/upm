<div class="nugget" id="<?php echo $this->id; ?>">
	<?php if($this->title): ?>
	<h2>
		<?php if($this->title_is_link): ?>
			<?php echo CHtml::link($this->title, $this->href, array('target'=>($this->target ? '_blank':'_self'))); ?>
		<?php else: ?>
			<?php echo $this->title; ?>
		<?php endif; ?>
	</h2>
	<?php endif; ?>
	
	<?php if($this->image_src): ?>
		<div class="picture-frame">
			<?php echo CHtml::image($this->image_src, $this->image_alt, array('title'=>$this->image_title)); ?>
		</div>
	<?php endif; ?>

	<?php if($this->text): ?>
		<p><?php echo $this->text; ?></p>
	<?php endif; ?>

	<?php if($this->link_in_body): ?>
	<?php $this->widget('TbButton',array(
		    'type'=>'link',
		    'label'=>$this->link_text,
		    'url'=>$this->href,
			'htmlOptions'=>array(
				'title'=>$this->link_title,
				'target'=>($this->target ? '_blank':'_self')
			),
		)); ?>
	<?php endif; ?>
</div>