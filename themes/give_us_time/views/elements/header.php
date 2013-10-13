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
		<?php endif?>
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
