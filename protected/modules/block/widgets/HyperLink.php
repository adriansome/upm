<?php
class HyperLink extends BlockWidget
{
	public function attributes()
	{
		return array(
			'href'=>array(
				'type'=>'plaintext',
			),
			'title'=>array(
				'type'=>'plaintext',
			),
			'text'=>array(
				'type'=>'plaintext'
			),
			'target'=>array(
				'type'=>'boolean'
			)
		);
	}

	public function run()
	{
		
	}
}