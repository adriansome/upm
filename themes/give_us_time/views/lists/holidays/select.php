<?php /* @var $data CArrayDataProvider */ ?>
<select name="Search[holiday]" id="Search_holiday">
	<option>Choose When</option>
				<?php
				$this->widget('zii.widgets.CListView', array(
					'dataProvider'=>$this->contents,
					'itemView'=>'option',
					'htmlOptions' => array(
						'class' => 'constrained'					   
					),
					'template'=>'{items}',
				));
				?>

</select>

