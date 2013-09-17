<?php
class Image extends BlockWidget
{
	public function attributes()
	{
		return array(
			'image'=>array(
				'type'=>'file',
			),
			'alt'=>array(
				'type'=>'singleline',
			),
			'title'=>array(
				'type'=>'singleline'
			),
		);
	}

	public function run()
	{
		$this->render('image');
		parent::run();
	}
}