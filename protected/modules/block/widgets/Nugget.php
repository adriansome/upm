<?php
class Nugget extends BlockWidget
{
	public function attributes()
	{
		return array(
			'title'=>array(
				'type'=>'singleline',
			),
			'title_is_link'=>array(
				'type'=>'boolean',
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
			'link_in_body'=>array(
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