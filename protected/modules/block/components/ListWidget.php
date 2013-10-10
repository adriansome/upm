<?php
class ListWidget extends CWidget
{
	public $name;
	public $scenario;
	public $pageSize;
	public $maxItems;
	public $item_id;
	public $item_slug;

	protected $config;
	protected $page_id;
	protected $contents;
	protected $attributes;
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
		
		$this->attributes = $this->itemAttributes();
		
		if(isset($this->item_id) || isset($this->item_slug))
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
			$list[$index] = $this->loadContents($item);
			$list[$index]['block_id'] = $item->id;
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
	
	/**
	 * Load a specific item for output
	 *
	 * @param $id The ID of the item from the database
	 */
	protected function loadItem() {

		// Prioritise looking up item slug over item ID
		if ($this->item_id) {
			$item = Block::model()->with('contents')->find(array(
				'condition'=>'t.name LIKE "'.$this->name.' item%" AND t.id = "' . $this->item_id . '"',
			));						
		} else {
			$sql = "SELECT b.* "
				. "FROM block AS b "
				. "LEFT JOIN content AS c "
				. "ON c.`block_id` = b.`id` "
				. "WHERE b.`name` LIKE '{$this->name} item%' "
				. "AND c.`name` = 'slug' "
				. "AND c.`string_value` = '{$this->item_slug}'";

			$item = Block::model()->findBySql($sql);
		}
		
		// Make sure we have the record
		if ($item) {
			$content = $this->loadContents($item);

			$this->contents = new CArrayDataProvider($content, array(
				'id'=>'title',
				'keyField'=>'title'
			));			
		}
		
	}
	
	/**
	 * Loads content for a specific item
	 * @param Block $item
	 */
	protected function loadContents(Block $item) {

		$contents = array();
		
		foreach($item->contents as $content)
		{
			switch($this->attributes[$content->name]['type'])
			{
				case 'singleline':
				case 'multiline':
					$contents[$content->name] = htmlspecialchars($content->string_value);
					break;

				case 'html':
					$contents[$content->name] = $content->string_value;
					break;

				case 'date':
					$contents[$content->name] = date($this->attributes[$content->name]['format'], strtotime($content->date_value));
					break;

				case 'file':
					$contents[$content->name] = $content->file_value;
					break;

				case 'boolean':
					$contents[$content->name] = $content->boolean_value;
					break;
				
				case 'hidden';
					$contents[$content->name] = $content->string_value;
					break;
				
				default:
					throw new CHttpException(500, 'Unknown type "'.$this->attributes[$content->name]['type'].'" for attribute "'.$content->name.'"');
			}
		}		
		return $contents;
	}

	public function run()
	{
		if(Yii::app()->user->isAdmin() || Yii::app()->user->isEditor()){
			echo '<div>';
			$this->render($this->scenario);
			require(Yii::app()->basepath.'/modules/block/widgets/views/_listManagement.php');
			echo '</div>';
		}
		else
			$this->render($this->scenario);
	}
}
