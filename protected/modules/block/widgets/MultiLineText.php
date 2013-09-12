<?php
class MultiLineText extends BlockWidget
{
	public function attributes()
	{
		return array(
			'text'=>array(
				'type'=>'multiline',
			),
		);
	}

	public function run()
	{
		$this->render('text');
	}
}