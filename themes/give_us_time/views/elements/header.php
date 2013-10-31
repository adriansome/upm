<!-- Begin #page-header -->
<header id="page-header">
	<div class="constrained">
		<a href="/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" class="logo" alt="Give Us Time" /></a>
		<?php if(Yii::app()->user->getId() === null):?>
		<div class="login">
			<form id="login-form" action="/login" method="post">
				<input name="LoginForm[username]" id="LoginForm_username" type="text" placeholder="Email" />
				<div class="errorMessage" id="LoginForm_username_em_" style="display:none"></div>
				<input name="LoginForm[password]" id="LoginForm_password" type="password" placeholder="Password" />
				<div class="errorMessage" id="LoginForm_password_em_" style="display:none"></div>

				<input type="submit" name="yt0" value="Login" />
			</form>
		</div>


		<?php elseif(Yii::app()->user->isLandlord()): ?>
		<div class="login">
			<form action="/logout">
				<p>Welcome <?php echo Yii::app()->user->firstname
					. ' ' . Yii::app()->user->lastname ?></p>
				<a href="/profile" class="message">Profile</a>
				<input type="submit" value="Logout" />
			</form>
		</div>
		<?php elseif(Yii::app()->user->isUser()):
		$userModel = User::model()->findByPk(Yii::app()->user->id);
		$fullname = $userModel->getFullname();
		?>
		<div class="login">
			<form action="/logout">
				<p>Welcome <?php echo $fullname ?></p>
				<input type="submit" value="Logout" />
			</form>
		</div>
		<?php endif; ?>

		<div class="social-media">
			<a href="https://twitter.com/giveustime" title="Follow us on Twitter" class="twitter" target="_blank">Follow us on Twitter</a>
			<a href="https://www.facebook.com/GiveUsTime" title="Find us on Facebook" class="facebook" target="_blank">Find us on Facebook</a>
		</div>

		<div class="strapline">Helping Families Adjust to Life After Combat</div>

	</div>

	<nav id="main-navigation">
		<div class="constrained">
			<?php $this->widget('Menu',array(
				'id'=>'mainmenu'
			)); ?><!-- mainmenu -->
		</div>
	</nav>
</header>
<!-- End #page-header -->
