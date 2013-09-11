<?php
abstract class BlockWidget extends CWidget
{
	public $name;
	public $page_id;
	public $scope;
	
	protected $id;
	private $contents;

	abstract public function attributes();

	public function __set($attribute, $value) {
		$this->contents[$attribute] = $value;
	}

	public function __get($attribute) {
		return $this->contents[$attribute];
	}

	public function init()
	{
		$this->loadBlock();
	}

	protected function loadBlock()
	{
		$params = array('name'=>$this->name);

		if(!empty($this->page_id))
			$params = array_merge($params, array('page_id'=>$this->page_id));
		if(!empty($this->scope))
			$params = array_merge($params, array('scope'=>$this->scope));

		$block = Block::model()->findByAttributes($params);
		
		if(!isset($block))
			$block = $this->createBlock();

		$this->id = $block->id;
		$this->loadContents($block->contents);
	}

	protected function createBlock()
	{
		$block = new Block;
		$block->name = $this->name;

		if(!empty($this->page_id))
			$block->page_id = $this->page_id;

		if(!$block->save())
		{
			echo '<pre>'.print_r($block->getErrors(),1).'</pre>';
			exit;
		}

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
				case 'plaintext':
					$this->$attribute = htmlspecialchars($values[$attribute]->string_value);
					break;

				case 'html':
					$this->$attribute = $values[$attribute]->string_value;
					break;

				case 'date':
					$this->$attribute = date($definition['format'], strtotime($values[$attribute]->date_value));
					break;

				case 'file':
					$this->$attribute = $values[$attribute]->file->url;
					break;

				case 'boolean':
					$this->$attribute = $values[$attribute]->boolean_value;
					break;
				
				default:
					throw new CHttpException(500, 'Unknown type "'.$definition['type'].'" for attribute "'.$attribute.'"');
			}
		}
	}

	public function run()
	{
		if(Yii::app()->user->isAdmin())
			$this->render('_management');
	}
}