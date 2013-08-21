<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div id="content" class="span-11">
		<?php echo $content; ?>
	</div><!-- content -->
	<div class="span-11">
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
</div>
<?php $this->endContent(); ?>
