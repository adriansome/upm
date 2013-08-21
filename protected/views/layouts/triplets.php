<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-4">
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
	<div id="content" class="span-14">
		<?php echo $content; ?>
	</div><!-- content -->
	<div class="span-4">
		<?php if(isset($this->clips['sidebar2'])):
			echo $this->clips['sidebar2'];
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
