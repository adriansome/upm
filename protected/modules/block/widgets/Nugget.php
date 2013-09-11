<?php
class Nugget extends BlockWidget
{
	public function attributes()
	{
		return array(
			'title'=>array(
				'type'=>'plaintext',
			),
			'text'=>array(
				'type'=>'plaintext',
			),
			'href'=>array(
				'type'=>'plaintext',
			),
			'target'=>array(
				'type'=>'boolean',
			),
			'link_title'=>array(
				'type'=>'plaintext',
			),
			'link_text'=>array(
				'type'=>'plaintext',
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