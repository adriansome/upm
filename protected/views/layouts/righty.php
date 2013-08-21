<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div id="content" class="span-16">
		<?php echo $content; ?>
	</div><!-- content -->
	<div class="span-6">
		<?php if(isset($this->clips['sidebar1'])): ?>
			<?php echo $this->clips['sidebar1']; ?>
		<?php else: ?>
			<p>
				<h2>Sidebar</h2>
				Sidebar content here
			</p>
		<?php endif; ?>
	</div>
</div>
<?php $this->endContent(); ?>