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
			$command = Yii::app()->db->createCommand()
				->select('lv1.id AS lv1ID, lv2.id AS lv2ID, lv3.id AS lv3ID, lv1.name AS label, lv1.link AS url, lv1.role AS role, lv2.name AS lv2Label, lv2.link AS lv2Url, lv2.role AS lv2Role, lv3.name AS lv3Label, lv3.link AS lv3Url, lv3.role AS lv3Role')
				->from('page lv1')
				->join('page_menu menu', 'lv1.id = menu.page_id')
				    
				->leftJoin('page lv2', 'lv1.id = lv2.parent_id')
				->leftJoin('page lv3', 'lv2.id = lv3.parent_id')
				    
				->where('lv1.date_active IS NOT NULL AND lv1.date_visible IS NOT NULL')
				->andWhere('((lv2.date_active IS NOT NULL AND lv2.date_visible IS NOT NULL) OR lv2.name IS NULL)')
				->andWhere('((lv3.date_active IS NOT NULL AND lv3.date_visible IS NOT NULL) OR lv3.name IS NULL)')
				->andWhere('menu.menu_id = :menu_id', array(':menu_id' => $_id))
				    
				->order('lv1.lft ASC, lv2.lft ASC, lv3.lft ASC')
			;
			$pages = $command->queryAll();
			
			$menu_pages = array();

			// If pages were found for this menu then
			if(is_array($pages))
			{
				foreach ($pages as $index => $page)
				{
					$page_uri = $page['url'];
					
					if($page_uri[0] != '/')
						$page_uri = '/'.$page_uri;

					$menu_pages[$page['lv1ID']]['label'] = $page['label'];
					$menu_pages[$page['lv1ID']]['active'] = ($_SERVER['REQUEST_URI'] == $page_uri);
					$menu_pages[$page['lv1ID']]['visible'] = ($page['role'] == 'all' || (Yii::app()->user->isGuest && $page['role'] == 'guest') || ((!Yii::app()->user->isGuest && Yii::app()->user->role == $page['role']) || (($page['role'] == 'user' || $page['role'] == 'subscriber') && Yii::app()->user->isAdmin())));
					$menu_pages[$page['lv1ID']]['url'] = Yii::app()->getBaseUrl(true).$page_uri;
					     
					if($page['lv2ID']){
						$page_uri = $page['lv2Url'];
					      
						if($page_uri[0] != '/')
							$page_uri = '/'.$page_uri;
						$menu_pages[$page['lv1ID']]['items'][$page['lv2ID']] = array('label'=>$page['lv2Label'],
							'active'=>($_SERVER['REQUEST_URI'] == $page_uri),
							'visible'=>($page['lv2Role'] == 'all' || (Yii::app()->user->isGuest && $page['lv2Role'] == 'guest') || ((!Yii::app()->user->isGuest && Yii::app()->user->role == $page['lv2Role']) || (($page['lv2Role'] == 'user' || $page['lv2Role'] == 'subscriber') && Yii::app()->user->isAdmin()))),
							'url'=>Yii::app()->getBaseUrl(true).$page_uri
							);
						if($page['lv3ID']){
							$page_uri = $page['lv3Url'];
	
							if($page_uri[0] != '/')
								$page_uri = '/'.$page_uri;
							$menu_pages[$page['lv1ID']]['items'][$page['lv2ID']]['items'][$page['lv3ID']] = array('label'=>$page['lv3Label'],
								'active'=>($_SERVER['REQUEST_URI'] == $page_uri),
								'visible'=>($page['lv3Role'] == 'all' || (Yii::app()->user->isGuest && $page['lv3Role'] == 'guest') || ((!Yii::app()->user->isGuest && Yii::app()->user->role == $page['lv3Role']) || (($page['lv3Role'] == 'user' || $page['lv3Role'] == 'subscriber') && Yii::app()->user->isAdmin()))),
								'url'=>Yii::app()->getBaseUrl(true).$page_uri
								);
						}
					}
				}
				
				$this->items = array_merge($menu_pages, $this->items);
			}	
		}

		if(!isset($this->htmlOptions['class']))
			$this->htmlOptions['class'] = 'menu-widget';

		parent::init();
	}
}
