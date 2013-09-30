<?php
class AdminzoneMenu extends CWidget
{
	protected $listItems = array();
	protected $coreItems = array();

	public function init()
	{
		foreach (Yii::app()->params['managementActions'] as $label => $link)
		{
			$this->listItems[] = CHtml::link($label, $link, array('data-toggle' => 'modal', 'data-target'=>'#'.strtolower(str_replace(' ', '-', $label))));
		}
		foreach (Yii::app()->params['coreManagementActions'] as $label => $link)
		{
			$this->coreItems[] = CHtml::link($label, $link, array('data-toggle' => 'modal', 'data-target'=>'#'.strtolower(str_replace(' ', '-', $label))));
		}
	}

	public function run()
	{
		$this->render('adminzoneMenu');
	}
}
