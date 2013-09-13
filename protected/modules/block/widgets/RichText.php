<?php
class RichText extends BlockWidget
{
	public function attributes()
	{
		return array(
			'text'=>array(
				'type'=>'html',
			),
		);
	}

	public function run()
	{
		$this->render('text');
		parent::run();
	}
}