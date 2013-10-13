<?php
class SelectList extends BlockWidget
{
	public function attributes()
	{
		return array(
			'text'=>array(
				'type'=>'list',
			),
		);
	}

	public function run()
	{
		$this->render('text');
		parent::run();
	}
}
