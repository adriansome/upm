<?php
abstract class ListWidget extends BlockWidget
{
	public $name;
	public $scope;
	public $items;
	public $itemView;

	protected $id;
	protected $page_id;
	protected $contents;

	abstract public function itemAttributes();

	public function attributes()
	{
		return array();
	}

	public function init()
	{
		if(!isset($this->scope))
			$this->scope = 'site';

		parent::init();

		$this->loadItems();
	}

	protected function loadItems()
	{
		$items = Block::model()->with('contents')->findAllByAttributes(array('name'=>$this->name.' item'));
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
		if(Yii::app()->user->isAdmin())
		{
			/*Yii::app()->clientScript->registerScriptFile(
				Yii::app()->getAssetManager()->publish(
                	Yii::getPathOfAlias('application.modules.block.assets')
                ).'/js/blockManagement.js'
			);*/
			$this->render('_listManagement');
		}
	}
}