<?php $this->pageTitle = $model->window_title; ?>

<?php $this->bodyId = 'home'; ?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<!-- Begin #slider -->
	<div id="slider">

		<?php $this->widget('Carousel',array(
			'name'=>'home-carousel',
			'options'=>array(
				'items'	=> 1,
				'auto' => 3000,
			),
		)); ?>

		<div class="constrained">
			<div class="controls">
				<a class="previous">Previous</a>

				<span class="pagination"></span>

				<a class="next">Next</a>
			</div>
		</div>

	</div>
	<!-- End #slider -->

	<!-- Begin #home-nuggets -->
	<section id="home-nuggets">
		<div class="constrained">
			<div class="column one-quarter">
				<?php $this->widget('Nugget',array(
					'name'=>'nugget1',
					'scope'=>'page',
				)); ?>
			</div>

			<div class="column one-quarter">
				<?php $this->widget('Nugget',array(
					'name'=>'nugget2',
					'scope'=>'page',
				)); ?>
			</div>

			<div class="column one-quarter">
				<?php $this->widget('Nugget',array(
					'name'=>'nugget3',
					'scope'=>'page',
				)); ?>
			</div>

			<div class="column one-quarter">
				<?php $this->widget('Nugget',array(
					'name'=>'nugget4',
					'scope'=>'page',
				)); ?>
			</div>
		</div>
	</section>
	<!-- End #home-nuggets -->

	<!-- Begin #photo-steam -->
	<section id="photo-stream">
		<div class="constrained">
			<div class="panel">
				<h2>Photo Stream</h2>
				<h3>Choose tags:</h3>
				<ul class="tags">
					<li><label>Birds (64) <input type="checkbox" /></label></li>
					<li><label>Insects (64) <input type="checkbox" /></label></li>
					<li><label>Plants (64) <input type="checkbox" /></label></li>
					<li><label>Landscapes (64) <input type="checkbox" /></label></li>
				</ul>
				<div class="number-of-results">Displaying 64 images</div>

				<h3>Get Involved</h3>
				<p>Taken a great photograph at Avalon Marshes? Upload it to our Photo Stream.</p>
				<a href="upload-photo" class="view-more">Upload Photo</a>
			</div>

			<div class="photos" id="photos">
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/insect-full.jpg" class="insect photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/insect-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" class="plant photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/landscape-full.jpg" class="landscape photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/landscape-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/landscape-full.jpg" class="landscape photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/landscape-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/insect-full.jpg" class="insect photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/insect-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" class="plant photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" class="plant photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" class="plant photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" class="plant photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/plant-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/landscape-full.jpg" class="landscape photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/landscape-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/insect-full.jpg" class="insect photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/insect-full.jpg" alt="" /></a>
				<a data-rel="lightbox:photos" href="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" class="bird photo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/example-content/bird.jpg" alt="" /></a>
			</div>

		</div>
	</section>
	<!-- End #photo-stream -->

	<!-- Begin #home-lower -->
	<div id="home-lower">
		<div class="constrained">
			<div class="column one-half">
				<div class="twitter container">
					<h2>Twitter</h2>
					<!--
					<ul class="tweets">
						<li><p class="js-tweet-text tweet-text">GPS devices charged and ready for hire. Time to explore the marshes. <a href="/search?q=%23Geocaching&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>Geocaching</b></a> <a href="/search?q=%23nature&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>nature</b></a> <a href="/search?q=%23halfterm&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>halfterm</b></a> <a href="http://t.co/pjZzoJm6lu" rel="nofollow" dir="ltr" data-expanded-url="http://tinyurl.com/p8xo9r7" class="twitter-timeline-link" target="_blank" title="http://tinyurl.com/p8xo9r7"><span class="tco-ellipsis"></span><span class="js-display-url">tinyurl.com/p8xo9r7</span><span class="invisible"></span><span class="tco-ellipsis"><span class="invisible">&nbsp;</span></span></a></p></li>
						<li><p class="js-tweet-text tweet-text"><a href="/SomersetWT" class="twitter-atreply pretty-link" dir="ltr"><s>@</s><b>SomersetWT</b></a> <a href="/Hawkandowluk" class="twitter-atreply pretty-link" dir="ltr"><s>@</s><b>Hawkandowluk</b></a> <a href="/RSPBSouthWest" class="twitter-atreply pretty-link" dir="ltr"><s>@</s><b>RSPBSouthWest</b></a> <a href="/NESouthWest" class="twitter-atreply pretty-link" dir="ltr"><s>@</s><b>NESouthWest</b></a> 127 applicants for apprenticeship scheme! V excited to have 2 starting with us v soon</p></li>
						<li><p class="js-tweet-text tweet-text">Or you can download the Geocaching activity here - <a href="http://t.co/qg4IB4DNbG" rel="nofollow" dir="ltr" data-expanded-url="http://docs.com/XAO4" class="twitter-timeline-link" target="_blank" title="http://docs.com/XAO4"><span class="tco-ellipsis"></span><span class="js-display-url">docs.com/XAO4</span><span class="invisible"></span><span class="tco-ellipsis"><span class="invisible">&nbsp;</span></span></a>. More info re. GPS hire on FB. <a href="/search?q=%23Geocaching&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>Geocaching</b></a> <a href="/search?q=%23wildlife&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>wildlife</b></a> <a href="/search?q=%23halfterm&amp;src=hash" data-query-source="hashtag_click" class="twitter-hashtag pretty-link js-nav" dir="ltr"><s>#</s><b>halfterm</b></a></p></li>
					</ul>
					-->

					<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/AvalonMarshes" data-widget-id="402791803570491393" data-chrome="nofooter transparent noheader noborder" data-tweet-limit="3">Tweets by @AvalonMarshes</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>



					<div class="social-media-links">
						<a href="https://twitter.com/AvalonMarshes" class="twitter" title="Follow us on Twiter">Twitter</a>
						<a href="https://www.facebook.com/pages/Avalon-Marshes/352136078173165" class="facebook" title="Find us on Facebook">Facebook</a>
						<a href="#" class="gplus" title="Find us on Google+">Google+</a>
					</div>
				</div>
			</div>

			<div class="column one-half">
				<div class="signup container">
					<h2>Newsletter</h2>
					<input type="email" placeholder="Enter your email to receive our newsletter" />
					<input type="submit" value="Sign up"/>
				</div>

				<div class="partners container">
					<h2>Our Partners</h2>
					<?php $this->widget('RichText', array(
						'name'=>'our partners',
						'scope'=>'page',
					)); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End #home-lower -->

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.isotope.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.carouFredSel-6.2.1.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/prettyCheckable.js"></script>

	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/lightcase.js"></script>
	<script>
		$(document).ready(function($) {
			$('a[data-rel^=lightbox]').lightcase('init');
		});
	</script>

	<script>
		$(document).ready(function() {

			$("#slider .slides").carouFredSel({
				responsive: true,
				auto: 8000,
				scroll: {
					fx: "scroll"
				},
				items: {
					visible: 1
				},
				pagination: "#slider .pagination",
				prev: "#slider .previous",
				next: "#slider .next"
			});

			$("#photo-stream .tags input[type=checkbox]").prettyCheckable();
		});
	</script>
