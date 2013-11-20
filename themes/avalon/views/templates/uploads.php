<?php
	$this->pageTitle = $model->window_title;
?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<!-- Begin #banner -->
	<div class="banner">
		<div class="constrained">
			<h1>
			<?php
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

            <!--form for image upload-->
		
		</div>
	</div>
	<!-- End #main -->

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>