<?php
class NuggetArea extends CWidget
{
	public $name;
	public $scope;
	
	protected $id;
	protected $dbID;
	protected $page_id;
	protected $blocks=array();

	public function init()
	{
		$this->page_id = Yii::app()->session['page_id'];
		$this->id = str_replace(' ', '-', $this->name);
		
		$this->loadArea();
	}

	protected function loadArea()
	{
		$params = array('name'=>$this->name, 'page_id'=>$this->page_id);

		$area = Area::model()->with('blocks')->findByAttributes($params);

		if(!isset($area))
			$area = $this->createArea();
        
		$this->dbID = $area->id;
		$this->loadBlocks($area->blocks);

	}

	protected function createArea()
	{
		$area = new Area;
		$area->name = $this->name;

		if(!empty($this->page_id))
			$area->page_id = $this->page_id;

		// if(!empty($this->scope))
		// 	$area->scope= $this->scope;

		$area->save();

		return $area;
	}

	protected function loadBlocks($blocks)
	{
		foreach($blocks as $block)
		{
			$this->blocks[] = $this->createWidget('Nugget', array(
				'name'=>$block->name,
				'scope'=>$block->scope,
                'block_id'=>$block->id,
				'isManaged'=>true,
			));
		}
	}

	public function run()
	{
		if(Yii::app()->user->isAdmin() || Yii::app()->user->isEditor()){
			echo '<div>';
			$this->render('nuggetArea');
			$this->render('_areaManagement');
			echo '</div>';
		}
		else
			$this->render('nuggetArea');
	}
}
