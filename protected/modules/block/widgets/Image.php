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
				'type'=>'plaintext',
			),
			'title'=>array(
				'type'=>'plaintext'
			),
		);
	}

	public function run()
	{
		
	}
}