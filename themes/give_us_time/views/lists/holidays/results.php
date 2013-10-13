<?php /* @var $this ListWidget */ ?>
<?php print_r($this->contents)?>
			<h1>Results&ndash; March 4, <?php //echo $this->viewData['attributes']['location']['values'][$_POST['Search']['location']]?></h1>
			<p>We have 4 matches for Gran Caneria beginning in the week of March 4, 2014</p>
			<ul class="resort-listing search-listing">
				<?php
				$this->widget('zii.widgets.CListView', array(
					'id'=>'properties',
					'dataProvider'=>$this->contents,
					'itemView'=>'item',
					'htmlOptions' => array(
						'class' => 'constrained'					   
					),
					//'summaryText'=> 'Properties',
					'template'=>'{items}',
					/*'pager'=>array(
				            'class'=>'CLinkPager',
				            'header'=>'',
				   	),*/
					'viewData'=>array('attributes'=>$this->viewData['attributes'])
				));
				?>
			</ul>
				
