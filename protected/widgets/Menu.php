<?php
Yii::import('zii.widgets.CMenu');

class Menu extends CMenu
{
	public $id;

	public function init()
	{
		if(empty($this->items))
		{
			$_id = null;
			$menus = Yii::app()->params['menus'];

			foreach($menus as $index=>$menu)
			{
				if($menu['name'] == lcfirst($this->id))
					$_id = $index;
			}

			$criteria = new CDbCriteria;
			$criteria->select = array('t.name AS label','t.link AS url');
			$criteria->join = 'LEFT JOIN page_menu ON t.id = page_menu.page_id';
			$criteria->condition = "page_menu.menu_id = $_id";
			$criteria->addCondition('t.date_active IS NOT NULL');
			$criteria->addCondition('t.date_visible IS NOT NULL');

			$tableSchema = Page::model()->getTableSchema();
			$command = Page::model()->getCommandBuilder()->createFindCommand($tableSchema, $criteria);
			$this->items = $command->queryAll();
		}

		$this->htmlOptions['class'] = 'menu-widget';

		/* START :: Extracted from CMenu init() method */
		if(isset($this->htmlOptions['id']))
			$this->id=$this->htmlOptions['id'];
		else
			$this->htmlOptions['id']=$this->id;

		$route=$this->getController()->getRoute();
		$this->items=$this->normalizeItems($this->items,$route,$hasActiveChild);
		/* END :: Extracted from CMenu init() method */
	}
}