<?php

$errors = array();
$success = FALSE;

// Send the contact form
if (isset($_POST['contact-send']) && $_POST['contact-send']) {

    if(isset($_POST['name'], $_POST['email'], $_POST['message'])) {
        if ($_POST['name'] && $_POST['email'] && $_POST['message']) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Please enter a valid email address.';
            }

            $email = new MessageCentre('contact');
            $email->setMessage($_POST['message']);
            $email->setSubject('Contact Form - ' . Yii::app()->name);
            $email->setFrom(array($_POST['email'] => $_POST['name']));
            if ($email->send()) {
                // If message sends, clear out contact form
                unset($_POST['name'], $_POST['email'], $_POST['message']);
                $success = TRUE;
            }

        } else {
            if (!$_POST['name']) {
                $errors['name'] = 'This field is required.';
            }
            if (!$_POST['email']) {
                $errors['email'] = 'This field is required.';
            }
            if (!$_POST['message']) {
                $errors['message'] = 'This field is required.';
            }
        }
    } else {
        $errors[] = 'Missing required fields';
    }

}

?>

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
				<div class="contact-form-text">
				<?php $this->widget('RichText',array(
						'name'=>'main content area',
						'scope'=>'page',
					));
				?>
                </div>
                <div class="contact-form-wrapper">
					<?php
						/*
						try {
							$this->widget('Form', array(
								'name' => 'contact-form',
								'page_id' => $model->id,
								'scope' => 'page',
								//'view' => 'forms.templates.contact',
								'json' => 'forms/json/contact'
							));
						} catch (Exception $e) {
							Yii::log($e->getMessage(), 'error');
							echo "<p class='error'>An error occurred while outputting this form</p>";
						}*/
					?>
					<?php
						if ($success) {
							echo "<p class='success'>Your message has been sent.</p>";
						}
						if (!empty($errors)) {
							echo "<p class='validation error'>An error occurred while trying to send the form.</p>";
						}
					?>

					<div class="key">
						<p>Fields marked '<span class="required">(required)</span>' are mandatory.</p>
					</div>

					<form action="#" method="post" class="standard-form" id="contact-form">
						<div class="form-row">
							<label for="contact-name">Name <span class="required">(required)</span></label>
							<input name="name" id="contact-name" value="<?php if (isset($_POST['name'])) { echo  htmlentities($_POST['name']); } ?>" type="text" />
							<?php
							if (isset($errors['name'])):
							?>
							<p class="validation error"><?php echo $errors['name'] ?></p>
							<?php
							endif;
							?>
						</div>
						<div class="form-row">
							<label for="contact-email">E-mail <span class="required">(required)</span></label>
							<input name="email" value="<?php if (isset($_POST['email'])) { echo  htmlentities($_POST['email']); } ?>"  id="contact-email" type="text" />
							<?php
							if (isset($errors['email'])):
							?>
							<p class="validation error"><?php echo $errors['email'] ?></p>
							<?php
							endif;
							?>
						</div>
						<div class="form-row">
							<label for="contact-message">Message <span class="required">(required)</span></label>
							<textarea name="message" id="contact-message" cols="20" rows="6"><?php if (isset($_POST['message'])) {
								echo htmlentities($_POST['message']);
							} ?></textarea>
							<?php
							if (isset($errors['message'])):
							?>
							<p class="validation error"><?php echo $errors['message'] ?></p>
							<?php
							endif;
							?>
						</div>
						<div class="form-row button-row">
							<input name="contact-send" type="submit" value="Send" />
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- End #main-content -->
	</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>
