<?php
class Nugget extends BlockWidget
{
	public function attributes()
	{
		return array(
			'title'=>array(
				'type'=>'singleline',
			),
			'text'=>array(
				'type'=>'smultiline',
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
			'image_'
		);
	}

	public function run()
	{
		
	}
}