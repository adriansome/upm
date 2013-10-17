<?php $this->pageTitle = $model->window_title; ?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<div class="constrained">

		<!-- Begin #sidebar -->
		<div id="sidebar" class="column span4">
			<nav id="sub-navigation">
			<?php $this->widget('Menu',array(
				'id'=>'submenu'
			)); ?><!-- mainmenu -->
			</nav>

			<?php $this->widget('NuggetArea',array(
				'name'=>'nugget 1',
			)); ?>

			<?php $this->widget('NuggetArea',array(
				'name'=>'nugget 2',
			)); ?>

			<?php $this->widget('NuggetArea',array(
				'name'=>'nugget 3',
			)); ?>

		</div>
		<!-- End #sidebar -->

		<!-- Begin #main-content -->
		<section id="main-content" class="column span12">
			<h1><?php echo $model->name; ?></h1>
			<div class="inner-content">
				<?php $this->widget('RichText',array(
					'name'=>'main content area',
					'scope'=>'page',
				)); ?>
			</div>
		</section>
		<!-- End #main-content -->
	</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>
