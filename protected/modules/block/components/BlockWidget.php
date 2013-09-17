<?php
abstract class BlockWidget extends CWidget
{
	public $name;
	public $scope;
	
	protected $id;
	protected $page_id;
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
		$this->page_id = Yii::app()->session['page_id'];
		$this->loadBlock();
	}

	protected function loadBlock()
	{
		$params = array('name'=>$this->name, 'page_id'=>$this->page_id);

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
				
				default:
					throw new CHttpException(500, 'Unknown type "'.$definition['type'].'" for attribute "'.$attribute.'"');
			}
		}
	}

	public function run()
	{
		if(Yii::app()->user->isAdmin())
		{
			Yii::app()->clientScript->registerScriptFile(
				Yii::app()->getAssetManager()->publish(
                	Yii::getPathOfAlias('application.modules.block.assets')
                ).'/js/blockManagement.js'
			);
			$this->render('_management');
		}
	}
}