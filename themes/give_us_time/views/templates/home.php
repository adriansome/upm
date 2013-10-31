<?php $this->pageTitle = $model->window_title; ?>

<?php $this->bodyId = 'home'; ?>

<!-- Begin #home-upper-wrapper -->
<div id="home-upper-wrapper">
	<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<!-- Begin #home-upper -->
	<section id="home-upper" class="constrained">
		<div class="nugget" id="nugget-register">
			<h2>Register For Time</h2>
			<p>Get verified as service personnel before searching for a holiday.</p>
			<a href="/welcome-user/" class="more">Register</a>
		</div>

		<div class="nugget" id="nugget-search">
			<h2>Search For Time</h2>
			<p>Registered and verified? Search for a Give Us Time holiday.</p>
			<form id="search-form" action="/search" method="post">
			<div class="form-row">
				<?php
					$weeks[''] = 'Any Week';
					$weeks += Yii::app()->utility->get_week_options('M d, Y');

					echo CHtml::dropDownList('Search[holiday]','', $weeks);
				?>
			</div>
			<div class="form-row">
				<?php
					$listWidget = new ListWidget();
					$listWidget->name = 'properties';
					$listWidget->init();

					$attributes = $listWidget->itemAttributes();
					unset($listWidget);

					array_unshift($attributes['location']['values'],'Any Location');
					echo CHtml::dropDownList('Search[location]','', $attributes['location']['values']);
				?>
			</div>
			<div class="form-row">
				<input type="submit" class="more" value="Search" />
			</div>
			</form>
		</div>

		<div class="nugget" id="nugget-donate">
			<h2>Donate Time</h2>
			<p>Donate a holiday in your second home or timeshare to a military family.</p>
			<a href="/welcome-timedonor/" class="more">Donate</a>
		</div>
	</section>
	<!-- End #home-upper -->
</div>
<!-- End #home-upper-wrapper -->

<!-- Begin #home-nuggets -->
<section id="home-nuggets" class="constrained">
	<div class="nugget-wrapper">
		<?php $this->widget('Nugget',array(
			'name'=>'nugget-2col',
			'scope'=>'page',
		)); ?>
	</div>

	<div class="nugget-wrapper">
		<div class="nugget">
			<h2>Real Give Us Time Holidays</h2>
			<div id="photo-slideshow">
				<?php $this->widget('Carousel',array(
					'name'=>'holidays-carousel',
					'options'=>array(
						'items'	=> 1,
						'auto' => 3000,
					),
				)); ?>
			</div>
			<div class="slideshow-controls"></div>
			<a href="#" class="button-link">View holiday stories</a>
		</div>
	</div>

	<div class="nugget-wrapper">
		<?php $this->widget('Nugget',array(
			'name'=>'nugget-support',
			'scope'=>'page',
		)); ?>
	</div>
</section>
<!-- End #home-nuggets -->

<!-- Begin #message-from-liam -->
<section id="message-from-liam" class="constrained">
	<div class="column span4">
		<?php $this->widget('Image', array(
			'name'=>'message-from-liam-image',
			'scope'=>'page',
		)); ?>
	</div>

	<div class="text column span12">
		<h1>
			<?php $this->widget('SingleLineText', array(
				'name'=>'message-from-liam-heading',
				'scope'=>'page',
			)); ?>
		</h1>
		<a href="http://www.youtube.com/embed/4CVO2lRoL-Y?rel=0" class="video-trigger">
			<?php $this->widget('Image', array(
				'name'=>'video-thumbnail',
				'scope'=>'page',
			)); ?>
		</a>
		<?php $this->widget('RichText', array(
			'name'=>'message-from-liam-text',
			'scope'=>'page',
		)); ?>

		<?php $this->widget('HyperLink', array(
			'name'=>'message-from-liam-more-link',
			'scope'=>'page',
		)); ?>
	</div>

</section>
<!-- End #message-from-liam -->

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.magnific-popup.min.js"></script>

<script>
	$(document).ready(function() {
		$('.video-trigger').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});

		$("#photo-slideshow .slides").carouFredSel({
			items	: 1,
			auto	: 3000,
			pagination: ".slideshow-controls"
		});
	});
</script>
