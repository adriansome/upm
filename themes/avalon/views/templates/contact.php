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
			<div class="column span3" id="sub-navigation">
				<?php $this->widget('Menu',array(
					'id'=>'submenu'
				)); ?><!-- submenu -->
			</div>
			<!-- End #sub-navigation -->

			<!-- Begin #main-content -->
			<div class="column span13" id="main-content">

				<div id="map"></div>

				<div class="row">
					<div class="column span6">
						<h2>Enquiries</h2>
				
						<p>If you have a general query or comment or aren't sure who your question should be directed to please fill out the form below and one of our team will get back to you as soon as possible</p>

						<form action="#" method="post">
							<div class="form-row">
								<div class="form-column">
									<input type="text" placeholder="Name">
								</div>
								<div class="form-column">
									<input type="email" placeholder="Email">
								</div>
							</div>
							<div class="form-row">
								<textarea cols="30" rows="5" placeholder="Message"></textarea>
							</div>
							<div class="form-row button-row">
								<input type="submit" value="Submit" />
							</div>
						</form>
					</div>
					<div class="column span7">
						<h2>Information</h2>
						<h3>Head Office</h3>
						<div class="row">
							<div class="column span4">
								<?php $this->widget('RichText',array(
									'name'=>'Head office contact details',
									'scope'=>'page',
								)); ?>
							</div>
							<div class="column span3">
								<?php $this->widget('RichText',array(
									'name'=>'Head office address',
									'scope'=>'page',
								)); ?>
							</div>
						</div>

						<h3>Mendip Office</h3>
						<div class="row">
							<div class="column span4">
								<?php $this->widget('RichText',array(
									'name'=>'Mendip office contact details',
									'scope'=>'page',
								)); ?>			
							</div>
							<div class="column span3">
								<?php $this->widget('RichText',array(
									'name'=>'Mendip office address',
									'scope'=>'page',
								)); ?>		
							</div>
						</div>

					</div>
				</div>

			</div>
			<!-- End  #main-content -->

		</div>
	</div>
	<!-- End #main -->

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script>
		function initialiseMap() {
			var mapPoint = new google.maps.LatLng(50.978642,-3.222863);
			var mapOptions = {
				zoom: 13,
				center: mapPoint,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);

			//var markerImage = new google.maps.MarkerImage("/themes/wetwindy/images/marker.png", new google.maps.Size(77, 28), new google.maps.Point(0,0), new google.maps.Point(31,27));

			var marker = new google.maps.Marker({
				position: mapPoint,
				map: map
			});
		}

		$(function(){
			initialiseMap();
		});
	</script>