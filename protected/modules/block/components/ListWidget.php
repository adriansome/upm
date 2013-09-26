<?php
class ListWidget extends CWidget
{
	public $type;
	public $name;
	public $scenario;
	public $pageSize;
	public $maxItems;
	public $item_id;

	protected $config;
	protected $page_id;
	protected $contents;
	protected $id;

	public function getViewPath($checkTheme=false)
	{
		return Yii::app()->theme->basepath.'/views/lists/'.$this->name;
	}

	public function init()
	{
		$this->page_id = Yii::app()->session['page_id'];
		$this->id = str_replace(' ', '-', $this->name);

		$this->configure();
		
		if(isset($this->item_id))
			$this->loadItem();
		else
			$this->loadItems();
	}

	protected function configure()
	{
		$config = file_get_contents(
			Yii::app()->theme->basepath.'/views/lists/'.$this->name.'.json'
		);

		$this->config = json_decode($config);
	}

	public function itemAttributes()
	{
		$attributes = Yii::app()->utility->object_to_array($this->config->attributes);
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

		$list = array();

		foreach($items as $index=>$item) 
		{
			foreach($item->contents as $content)
			{
				switch($attributes[$content->name]['type'])
				{
					case 'singleline':
					case 'multiline':
						$list[$index][$content->name] = htmlspecialchars($content->string_value);
						break;

					case 'html':
						$list[$index][$content->name] = $content->string_value;
						break;

					case 'date':
						$list[$index][$content->name] = date($attributes[$content->name]['format'], strtotime($content->date_value));
						break;

					case 'file':
						$list[$index][$content->name] = $content->file_value;
						break;

					case 'boolean':
						$list[$index][$content->name] = $content->boolean_value;
						break;
					
					default:
						throw new CHttpException(500, 'Unknown type "'.$definition['type'].'" for attribute "'.$content->name.'"');
				}
			}
		}
		
		if(isset($this->pageSize))
			$pagination = array('pageSize'=>$this->pageSize);
		else
			$pagination = false;

		$this->contents = new CArrayDataProvider($list, array(
		    'id'=>'title',
		    'keyField'=>'title',
		    'pagination'=>$pagination,
		));
	}

	public function run()
	{
		$this->render($this->scenario);

		if(Yii::app()->user->isAdmin() || Yii::app()->user->isEditor())
			require(Yii::app()->basepath.'/modules/block/widgets/views/_listManagement.php');
	}
}