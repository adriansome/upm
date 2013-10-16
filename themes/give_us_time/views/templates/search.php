<?php $this->pageTitle = $model->window_title;

// Redirect to home page if no search results provided
if (!isset($_POST['Search'])) {
    $this->redirect('/');
}

require_once(Yii::app()->theme->basepath.'/views/elements/header.php'); ?>

	<div class="constrained">

		<!-- Begin #sidebar -->
		<div id="sidebar" class="column span4">
			<form class="search nugget" id="search-form" action="/search" method="post">
			<h1>Holiday search</h1>
				<fieldset>
                                    <div class="form-row">
                                    <?php
                                    $listWidget = new ListWidget();
                                    $listWidget->name = 'properties';
                                    $listWidget->init();

                                    $attributes = $listWidget->itemAttributes();
                                    $locationAttributes = array('' => 'Choose Where');
                                    $locationAttributes += $attributes['location']['values'];
                                    unset($listWidget);

                                    echo CHtml::dropDownList('Search[location]',$_POST['Search']['location'], $locationAttributes);
                                    ?>
                                    </div>
                                    <div class="form-row">
                                        <?php
                                        $weeks[''] = 'Choose When';
                                        $weeks += Yii::app()->utility->get_week_options('M d, Y');
                                        echo CHtml::dropDownList('Search[holiday]',$_POST['Search']['holiday'], $weeks);
                                        ?>
                                    </div>
                                    <div class="form-row button-row">
                                            <input type="submit" value="Search" />
                                    </div>
				</fieldset>
			</form>
		</div>
		<!-- End #sidebar -->

		<!-- Begin #main-content -->
		<section id="main-content" class="column span12">
			<?php
			$this->widget('ListWidget',array(
                            'name'=>'properties',
                            'scenario'=>'results',
                            'filters' => array(
//					'id' => array(
//						'field_type' => 'string_value',
//						'value' => $_POST['Search']['holiday']
//					),
                                'location' => array(
                                    'field_type' => 'string_value',
                                    'value' => $_POST['Search']['location']
                                )
                            ),
                            'viewData'=>array('attributes'=>$attributes),
			)); 
                        ?>
		</section>
		<!-- End #main-content -->
	</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

