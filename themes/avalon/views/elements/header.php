	<!-- Begin #page-header -->
	<header id="page-header">
		<div class="constrained">
			<a href="/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" class="logo" alt="Avalon Marshes" /></a>

			<nav>
				<?php $this->widget('Menu',array(
					'id'=>'mainmenu'
				)); ?>
		 	</nav>

			<div class="search">
				<label for="search-terms">Search</label>
				<input type="search" id="search-terms" />
				<input type="submit" value="search" />
			</div>
		</div>
	</header>
	<!-- End #page-header -->