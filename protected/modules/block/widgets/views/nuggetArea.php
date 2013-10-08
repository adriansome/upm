<div class="nuggetArea" id="<?php echo $this->id; ?>">
<?php foreach($this->blocks as $block): ?>
	<?php $block->run(); ?>
<?php endforeach; ?>
</div>