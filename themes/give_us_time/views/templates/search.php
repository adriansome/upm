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
                                        unset($listWidget);

                                        echo CHtml::dropDownList('Search[location]',$_POST['Search']['location'], $attributes['location']['values']);
                                        ?>
					</div>
					<div class="form-row">
						<select>
							<option>March 4, 2014</option>
						</select>
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
			)); ?>
		</section>
		<!-- End #main-content -->
	</div>

<?php require_once(Yii::app()->theme->basepath.'/views/elements/footer.php'); ?>

