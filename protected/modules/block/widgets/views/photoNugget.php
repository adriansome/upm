<div class="nugget photo-nugget" id="<?php echo $this->id; ?>">

	<?php if($this->image_src): ?>
		<div class="picture-frame">
			<?php echo CHtml::image($this->image_src, $this->image_alt, array('title'=>$this->image_title)); ?>
		</div>
	<?php endif; ?>
</div>