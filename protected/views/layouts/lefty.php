<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-6">
		<?php if(isset($this->clips['sidebar1'])):
			echo $this->clips['sidebar1'];
		else:
		?>
		<p>
			<h2>Sidebar</h2>
			Sidebar content here
		</p>
		<?php endif; ?>
	</div>
	<div id="content" class="span-16">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
