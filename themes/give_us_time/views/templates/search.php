<?php $this->pageTitle = $model->window_title;

// Redirect to home page if no search results provided
if (!isset($_POST['Search'])) {
    $this->redirect('/');
}

$filters = array();

if ($_POST['Search']['location']) {
    $filters = array('location' => array(
        'field_type' => 'string_value',
        'value' => $_POST['Search']['location']
    ));
}

// Set location and date params
$selectedLocation = (isset($_POST['Search']['location'])) 
                    ? $_POST['Search']['location'] : '';
$selectedDate = (isset($_POST['Search']['holiday']))
                ? $_POST['Search']['holiday'] : '';

$listWidget = new ListWidget();
$listWidget->name = 'properties';
$listWidget->init();

$attributes = $listWidget->itemAttributes();
$locationAttributes = array('' => 'Any Location');
$locationAttributes += $attributes['location']['values'];
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
                            'filters' => $filters,
                            'viewData'=>array('attributes'=>$attributes),
			)); 
                        ?>
		</section>
		<!-- End #main-content -->
	</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

