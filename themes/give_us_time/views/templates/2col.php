<?php $this->pageTitle = $model->window_title; ?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<div class="constrained">

		<!-- Begin #sidebar -->
		<div id="sidebar" class="column span4">
			<nav id="sub-navigation">
				<?php $this->widget('Menu',array(
					'id'=>'submenu'
				)); ?><!-- mainmenu -->

<!--
				<ul>
					<li><a href="#">Item One</a></li>
					<li><a href="#">Item Two</a></li>
					<li><a href="#">Item Three</a></li>
					<li><a href="#">Item Four</a></li>
				</ul>
-->				
			</nav>

			<?php $this->widget('NuggetArea',array(
				'name'=>'nugget area',
			)); ?>

<!--
			<article class="nugget">
				<h2>Support Us</h2>
				<div class="pictureframe">
					<img src="example-content/nugget3.png" alt=="" />
				</div>
				<div class="text">
					<p>Text about giving money to support the charity Text about giving money to support the charity Text about giving money to support the charity.</p>
				</div>
				<a href="#" class="button-link">Donate money</a>
			</article>

			<article class="nugget">
				<h2>Donate Time</h2>
				<div class="pictureframe">
					<img src="example-content/nugget-inside.jpg" alt=="" />
				</div>
				<div class="text">
					<p>If you would like to donate a week of holiday time, click below.</p>
				</div>
				<a href="#" class="button-link">Donate holiday time</a>
			</article>
-->			
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