<?php
class ListWidget extends CWidget
{
	public $name;
	public $scope;
	public $type;
	public $scenario;
	public $items;
	public $item_id;
	public $maxItems;

	protected $id;
	protected $page_id;
	protected $contents;
	protected $config;

	public function init()
	{
		if(!isset($this->scope))
			$this->scope = 'site';

		$this->configure();
		
		if(isset($this->item_id))
			$this->loadItem();
		else
			$this->loadItems();
	}

	public function getViewPath($checkTheme=false)
	{
		return Yii::app()->theme->basepath.'/views/lists/'.$this->type;
	}

	protected function configure()
	{
		$config = file_get_contents(
			Yii::app()->theme->basepath.'/views/lists/'.$this->type.'.json'
		);

		$this->config = json_decode($config);
	}

	public function itemAttributes()
	{
		$attributes = Yii::app()->Utility->object_to_array($this->config->attributes);
	    return $attributes;
	}

	protected function loadItems()
	{
		$params = array();
		
		if(isset($this->maxItems))
			$params['limit'] = $this->maxItems;

		$items = Block::model()->with('contents')->findAll(array(
			'condition'=>'t.name LIKE "'.$this->name.' item%"'
		), $params);
		
		$attributes = $this->itemAttributes();

		foreach($items as $index=>$item) 
		{
			foreach($item->contents as $content)
			{
				switch($attributes[$content->name]['type'])
				{
					case 'singleline':
					case 'multiline':
						$this->items[$index][$content->name] = htmlspecialchars($content->string_value);
						break;

					case 'html':
						$this->items[$index][$content->name] = $content->string_value;
						break;

					case 'date':
						$this->items[$index][$content->name] = date($attributes[$content->name]['format'], strtotime($content->date_value));
						break;

					case 'file':
						$this->items[$index][$content->name] = $content->file_value;
						break;

					case 'boolean':
						$this->items[$index][$content->name] = $content->boolean_value;
						break;
					
					default:
						throw new CHttpException(500, 'Unknown type "'.$definition['type'].'" for attribute "'.$content->name.'"');
				}
			}
		}

		$this->contents = new CArrayDataProvider($this->items, array(
		    'id'=>'title',
		    'keyField'=>'title',
		    'pagination'=>array(
		        'pageSize'=>10,
		    ),
		));
	}

	public function run()
	{
		$this->render($this->scenario);

		if(Yii::app()->user->isAdmin())
		{
			/*Yii::app()->clientScript->registerScriptFile(
				Yii::app()->getAssetManager()->publish(
                	Yii::getPathOfAlias('application.modules.block.assets')
                ).'/js/blockManagement.js'
			);*/
			require_once(dirname(__FILE__).'/../widgets/views/_listManagement.php');
		}
	}
}