<?php $this->pageTitle = $model->window_title; ?>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<div class="constrained">

		<!-- Begin #sidebar -->
		<div id="sidebar" class="column span4">
			<nav id="sub-navigation">

			<?php $this->widget('Menu',array(
				'id'=>'submenu',
                'page_id' => $model->id
			)); ?><!-- mainmenu -->
			</nav>

			<?php $this->widget('NuggetArea',array(
				'name'=>'nugget area',
			)); ?>

		</div>
		<!-- End #sidebar -->

		<!-- Begin #main-content -->
		<section id="main-content" class="column span12">
			<h1>
			<?php
				$this->widget('SingleLineText', array(
				'name'=>'page heading',
				'scope'=>'page',
			)); ?>
			</h1>
			<div class="inner-content">
				<?php $this->widget('RichText',array(
					'name'=>'main content area',
					'scope'=>'page',
				)); ?>

				<div class="key">
					<p>Fields marked '<span class="required">(required)</span>' are mandatory.</p>
				</div>

				<form action="#" method="post" class="standard-form" id="contact-form">
					<div class="form-row">
						<label for="contact-name">Name <span class="required">(required)</span></label>
						<input  id="contact-name" type="text" />
						<p class="validation error">Please enter a name</p>
					</div>
					<div class="form-row">
						<label for="contact-email">E-mail <span class="required">(required)</span></label>
						<input  id="contact-email" type="text" />
						<p class="validation error">Please enter a valid e-mail address</p>
					</div>
					<div class="form-row">
						<label for="contact-message">Name <span class="required">(required)</span></label>
						<textarea id="contact-message" cols="20" rows="6"></textarea>
						<p class="validation error">Please enter a message</p>
					</div>
					<div class="form-row button-row">
						<input type="submit" value="Send" />
					</div>
				</form>

			</div>
		</section>
		<!-- End #main-content -->
	</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>
