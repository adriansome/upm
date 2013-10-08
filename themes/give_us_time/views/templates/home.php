<?php $this->pageTitle = $model->window_title; ?>

<?php $this->bodyId = 'home'; ?>

<!-- Begin #home-upper-wrapper -->
<div id="home-upper-wrapper">
	<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<!-- Begin #home-upper -->
	<section id="home-upper" class="constrained">
		<div class="nugget" id="nugget-register">
			<h2>Service Personnel Registration</h2>
			<p>You need to be registered and verified<br/> to use this site. Click below to begin. </p>
			<a href="#" class="more">Register to use site</a>
		</div>

		<div class="nugget" id="nugget-search">
			<h2>Holiday Search</h2>
			<p>Once registered and verified,<br/> search here for a holiday.</p>
			<div class="form-row">
				<select>
					<option>Choose When</option>
				</select>
			</div>
			<div class="form-row">			
				<select>
					<option>Choose Where</option>
				</select>
			</div>
			<div class="form-row">
				<input type="submit" class="more" value="Search For Holiday" />
			</div>
		</div>

		<div class="nugget" id="nugget-donate">
			<h2>Donate Time</h2>
			<p>If you would like to donate a week<br/> of holiday time, click below.</p>
			<a href="#" class="more">Donate holiday time</a>			
		</div>
	</section>
	<!-- End #home-upper -->
</div>
<!-- End #home-upper-wrapper -->

<!-- Begin #home-nuggets -->
<section id="home-nuggets" class="constrained">
	<?php $this->widget('Nugget',array(
		'name'=>'nugget-2col',
		'scope'=>'page',
	)); ?>

	<div class="nugget">
		<h2>View Our Holiday Stories</h2>
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
		<a href="#" class="button-link">Read holiday stories</a>
	</div>

	<?php $this->widget('Nugget',array(
		'name'=>'nugget-support',
		'scope'=>'page',
	)); ?>		
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