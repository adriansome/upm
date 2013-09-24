<?php
class AdminzoneMenu extends CWidget
{
	protected $items = array();

	public function init()
	{
		foreach (Yii::app()->params['managementActions'] as $label => $link)
		{
			$this->items[] = CHtml::link($label, $link, array('data-toggle' => 'modal', 'data-target'=>'#'.strtolower(str_replace(' ', '-', $label))));
		}
	}

	public function run()
	{
		$this->render('adminzoneMenu');
	}
}