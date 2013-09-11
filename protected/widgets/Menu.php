<?php
Yii::import('zii.widgets.CMenu');

class Menu extends CMenu
{
	public function init()
	{
		if(Yii::app()->hasModule('page') && isset($this->id))
		{
			$_id = null;

			// Get site menus array from the site config.
			$menus = Yii::app()->params['menus'];

			// Get id number for this menu.
			foreach($menus as $index=>$menu)
			{
				if($menu['name'] == lcfirst($this->id))
					$_id = $index;
			}

			// Find all the active/visible pages that belong to this menu.
			$sql  = 'SELECT page.name AS label, page.link AS url ';
			$sql .= 'FROM page ';
			$sql .= 'LEFT JOIN page_menu ON page.id = page_menu.page_id ';
			$sql .= 'WHERE page.date_active IS NOT NULL ';
			$sql .= 'AND page.date_visible IS NOT NULL ';
			$sql .= 'AND page_menu.menu_id = :menu_id ';
			$sql .= 'ORDER BY page.lft ASC';

			$command = Yii::app()->db->createCommand($sql);
			$command->params = array(':menu_id' => $_id);
			$pages = $command->queryAll();

			// If pages were found for this menu then
			if(is_array($pages))
			{
				foreach ($pages as $index => $page)
				{
					$page_uri = $page['url'];
					if($page_uri[0] != '/')
						$page_uri = '/'.$page_uri;

					$pages[$index]['active'] = ($_SERVER['REQUEST_URI'] == $page_uri);
					$pages[$index]['url'] = Yii::app()->getBaseUrl(true).$page_uri;
				}
				
				$this->items = array_merge($pages, $this->items);
			}	
		}

		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class'] = 'menu-widget';

		parent::init();
	}
}