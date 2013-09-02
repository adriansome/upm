<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
		<?php 
		if(isset($this->clips['content'])):
			echo $this->clips['content'];
		else:	
		?>
			<h2>Main Content</h2>
			Main content here
		<?php endif; ?>
	</div><!-- content -->
<?php $this->endContent(); ?>