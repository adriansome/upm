<?php $this->pageTitle = $model->window_title;

// If this user isn't logged in, redirect
if (!Yii::app()->user->isLoggedIn()) {
    $this->redirect('/register');
}

// Redirect to home page if no search results provided
if (!isset($_POST['Search'])) {
    $this->redirect('/');
}

$customQuery = null;

if ($_POST['Search']['country']) {
    $id = (int)$_POST['Search']['country'];
    $customQuery = "SELECT b.* "
                    . "FROM `property_country` pc "
                    . "LEFT JOIN block b "
                    . "ON pc.`property_id` = b.id "
                    . "WHERE pc.`country_id` = \"{$id}\"";
}


// Set location and date params
$selectedLocation = (isset($_POST['Search']['country'])) 
                    ? $_POST['Search']['country'] : '';
$selectedDate = (isset($_POST['Search']['holiday']))
                ? $_POST['Search']['holiday'] : '';

$listWidget = new ListWidget();
$listWidget->name = 'properties';
$listWidget->init();

$attributes = $listWidget->itemAttributes(array('withHolidays' => TRUE));
$locationAttributes = array('' => 'Any Country');
$locationAttributes += $attributes['country']['values'];
unset($listWidget);

require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<div class="constrained">

		<!-- Begin #sidebar -->
		<div id="sidebar" class="column span4">
                    <?php
                    $this->renderPartial('webroot.themes.give_us_time.views.elements.search-bar', array(
                        'selectedLocation' => $selectedLocation,
                        'selectedDate' => $selectedDate,
                        'locationAttributes' => $locationAttributes
                    ));
                    ?>
		</div>
		<!-- End #sidebar -->

		<!-- Begin #main-content -->
		<section id="main-content" class="column span12">
			<?php
			$this->widget('ListWidget',array(
                            'name'=>'properties',
                            'scenario'=>'results',
                            'customQuery' => $customQuery,
                            'viewData'=>array('attributes'=>$attributes),
			)); 
                        ?>
		</section>
		<!-- End #main-content -->
	</div>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/search.js"></script>
<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

