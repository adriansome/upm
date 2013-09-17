<?php
class Nugget extends BlockWidget
{
	public $headerLink = true;
	public $contentLink = false;

	public function attributes()
	{
		return array(
			'title'=>array(
				'type'=>'singleline',
			),
			'text'=>array(
				'type'=>'multiline',
			),
			'href'=>array(
				'type'=>'singleline',
			),
			'target'=>array(
				'type'=>'boolean',
			),
			'link_title'=>array(
				'type'=>'singleline',
			),
			'link_text'=>array(
				'type'=>'singleline',
			),
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
		$this->render('nugget');
		parent::run();
	}
}