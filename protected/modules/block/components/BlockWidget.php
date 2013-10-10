<?php
abstract class BlockWidget extends CWidget
{
	public $name;
	public $scope;
	
	protected $id;
	protected $page_id;
	protected $contents;
	protected $dbID;

	abstract public function attributes();

	public function __set($attribute, $value)
	{
		$this->contents[$attribute] = $value;
	}

	public function __get($attribute)
	{
		return $this->contents[$attribute];
	}

	public function init()
	{
		$this->page_id = Yii::app()->session['page_id'];
		$this->id = str_replace(' ', '-', $this->name);
		
		$this->loadBlock();
	}

	protected function loadBlock()
	{
		$params = array('name'=>$this->name, 'page_id'=>$this->page_id);

		if(!empty($this->scope))
			$params = array_merge($params, array('scope'=>$this->scope));

		$block = Block::model()->with('contents')->findByAttributes($params);
		
		if(!isset($block))
			$block = $this->createBlock();

		$this->dbID = $block->id;
		$this->loadContents($block->contents);
	}

	protected function createBlock()
	{
		$block = new Block;
		$block->name = $this->name;

		if(!empty($this->page_id))
			$block->page_id = $this->page_id;

		if(!empty($this->scope))
			$block->scope= $this->scope;

		$block->save();
		$this->createContents($block->id);

		return $block;
	}

	protected function createContents($block_id)
	{
		foreach($this->attributes() as $attribute=>$definition)
		{
			$content = new Content;
			$content->name = $attribute;
			$content->block_id = $block_id;
			$content->type_id = ContentType::model()->findByAttributes(array('name'=>$definition['type']))->id;
			$content->save();	
		}
	}

	protected function loadContents($contents)
	{

		$values = array();

		foreach ($contents as $content)
			$values[$content->name] = $content;

		foreach($this->attributes() as $attribute=>$definition)
		{
			switch($definition['type'])
			{
				case 'singleline':
				case 'multiline':
					$this->$attribute = htmlspecialchars($values[$attribute]->string_value);
					break;

				case 'html':
					$this->$attribute = $values[$attribute]->string_value;
					break;

				case 'date':
					$this->$attribute = date($definition['format'], strtotime($values[$attribute]->date_value));
					break;

				case 'file':
					$this->$attribute = $values[$attribute]->file_value;
					break;

				case 'boolean':
					$this->$attribute = $values[$attribute]->boolean_value;
					break;
				case 'hidden':
					$this->$attribute = $values[$attribute]->string_value;
					break;
				
				default:
					throw new CHttpException(500, 'Unknown type "'.$definition['type'].'" for attribute "'.$attribute.'"');
			}
		}
	}

	public function run()
	{
		if(Yii::app()->user->isAdmin() || Yii::app()->user->isEditor())
			$this->render('_management');
	}
}
