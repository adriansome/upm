<?php
class SingleLineText extends BlockWidget
{
	public function attributes()
	{
		return array(
			'text'=>array(
				'type'=>'singleline',
			),
		);
	}

	public function run()
	{
		$this->render('text');
		parent::run();
	}
}