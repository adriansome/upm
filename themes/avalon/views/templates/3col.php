<?php
	$this->pageTitle = $model->window_title;
	//$this->bodyId = 'colour-scheme1';
?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<!-- Begin #banner -->
	<div class="banner">
		<div class="constrained">
			<h1>
			<?php
			//echo $model->name;
				$this->widget('SingleLineText', array(
				'name'=>'page heading',
				'scope'=>'page',
			)); ?>
			</h1>
		</div>
	</div>
	<!-- End #banner -->

	<!-- Begin #main -->
	<div id="main">
		<div class="constrained">

			<!-- Begin #sub-navigation -->
			<div class="column" id="sub-navigation">
			<?php $this->widget('Menu',array(
				'id'=>'submenu'
			)); ?><!-- submenu -->
			</div>
			<!-- End #sub-navigation -->

			<!-- Begin #main-content -->
			<div class="column" id="main-content">
				<?php $this->widget('RichText',array(
					'name'=>'main content area',
					'scope'=>'page',
				)); ?>
			</div>
			<!-- End  #main-content -->

			<!-- Begin #nuggets -->
			<aside class="column" id="nuggets">
				<?php $this->widget('NuggetArea',array(
					'name'=>'nugget area',
				)); ?>


				<?php $this->widget('Nugget',array(
					'name'=>'nugget',
					'scope'=>'page',
				)); ?>

				<div class="image-nugget-wrapper">
					<?php $this->widget('PhotoNugget',array(
						'name'=>'picture nugget',
						'scope'=>'page',
					)); ?>
				</div>	

				<div class="checklist-nugget">
					<h2>Wildlife Check List</h2>
					<ul class="checklist">
						<li>Bittern / Heron</li>
						<li>Pollarded Willow</li>
						<li>Dragonfly</li>
						<li>Otter</li>
					</ul>
				</div>

			</aside>
			<!-- End #nuggets -->
		</div>
	</div>
	<!-- End #main -->

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>