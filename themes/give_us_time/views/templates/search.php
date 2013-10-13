<?php print_r($_POST);?>
<?php
$this->widget('ListWidget',array(
	'name'=>'properties',
	'scenario'=>'list',
	'filters' => array(
		'location' => array(
			'field_type' => 'string_value',
			'value' => $_POST['Search']['location']
		)
	)
)); ?>


