<?php $this->pageTitle = $model->window_title; ?>

<?php $this->bodyId = 'home'; ?>

<!-- Begin #home-upper-wrapper -->
<div id="home-upper-wrapper">
	<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<!-- Begin #home-upper -->
	<section id="home-upper" class="constrained">
		<div class="nugget" id="nugget-register">
			<h2>Register</h2>
			<p>You need to be registered and verified to use this site. Click below to begin. </p>
			<a href="#" class="more">Register to use site</a>
		</div>

		<div class="nugget" id="nugget-search">
			<h2>Holiday Search</h2>
			<p>Once registered and verified, search here for a holiday.</p>
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
			<p>If you would like to donate a week of holiday time, click below.</p>
			<a href="#" class="more">Donate holiday time</a>			
		</div>
	</section>
	<!-- End #home-upper -->
</div>
<!-- End #home-upper-wrapper -->

<!-- Begin #home-nuggets -->
<section id="home-nuggets" class="constrained">
	<div class="nugget nugget-2col">
		<h2>Welcome to Give Us Time</h2>
		<div class="thumbnail"><img src="example-content/nugget-family.jpg" alt="" /></div>
		<div class="text">
			<p>Give Us Time provides holidays to help families adjust to life after combat. This is possible thanks to generously donated week-long holidays in second homes, holiday homes and timeshares across the UK and beyond.</p>
			<a href="#" class="button-link">More about us</a>
		</div>
	</div>

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
		<div class="pictureframe">
			<img src="example-content/liam-fox.jpg" alt="Photo of Liam Fox" />
		</div>
	</div>

	<div class="text column span7">
		<h1>A message from Liam Fox</h1>
		<p>During my time as Secretary of State for Defence I was extremely heartened to see how we improved the treatment of those who had been physically injured in combat. Medical improvements in prosthetics, better physiotherapy and improved social attitudes all contributed to a better chance of rehabilitation. In terms of psychological trauma, the invisible scars of war, we are making progress though perhaps at a slower rate.</p>

		<p>One of the areas where I think there remains room for improvement is the integration of service families into this equation. As a doctor working with the Armed Forces I learned the importance of seeing our personnel not as isolated individuals but as members of a wider family and community dynamic.</p>
		<p><img src="images/liam-signature.png" alt="Signed Liam Fox" /></p>

		<a href="#" class="button-link">Read more</a>
	</div>

	<div class="video column span5">
		<a href="http://www.youtube.com/embed/4CVO2lRoL-Y?rel=0" class="video-trigger">
			<img src="example-content/video.jpg" alt="" />
		</a>
	</div>
</section>
<!-- End #message-from-liam -->

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

<script src="/themes/mps/js/jquery.magnific-popup.min.js"></script>

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
	});

</script>