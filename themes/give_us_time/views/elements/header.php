<!-- Begin #page-header -->
<header id="page-header">
	<div class="constrained">
		<a href="index.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" class="logo" alt="Give Us Time" /></a>

		<div class="login">
			<input type="email" placeholder="Email" />
			<input type="password" palceholder="Password" />
			<input type="submit" value="Login" />
		</div>
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