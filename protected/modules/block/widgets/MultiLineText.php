<?php
class MultiLineText extends BlockWidget
{
	public function attributes()
	{
		return array(
			'text'=>array(
				'type'=>'plaintext',
			),
		);
	}

	public function run()
	{
		$this->render('text');
	}
}