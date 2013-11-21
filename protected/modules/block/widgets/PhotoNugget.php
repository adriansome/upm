<?php
class PhotoNugget extends BlockWidget
{
	public $isManaged;

	public function attributes()
	{
		return array(
			'image_src'=>array(
				'type'=>'file',
			),
			'image_alt'=>array(
				'type'=>'singleline',
			),
			'image_title'=>array(
				'type'=>'singleline',
			),
		);
	}

	public function run()
	{
		$this->render('photoNugget');
		
		if(!$this->isManaged)
			parent::run();
	}
}