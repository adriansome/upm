<?php 
$this->pageTitle = $model->window_title;
?>
<div class="container">
	<div id="content" class="span-16">
		<h1><?php echo $model->name; ?></h1>
		<?php $this->widget('SingleLineText',array(
			'name'=>'page text',
			'scope'=>'page',
		)); ?>
	</div><!-- content -->

	<div class="span-6">
		<p>
			<h2>Sidebar</h2>
			Sidebar content here
		</p>
	</div>
</div>