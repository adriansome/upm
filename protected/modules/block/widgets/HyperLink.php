<?php
class HyperLink extends BlockWidget
{
	public function attributes()
	{
		return array(
			'href'=>array(
				'type'=>'singleline',
			),
			'title'=>array(
				'type'=>'singleline',
			),
			'text'=>array(
				'type'=>'singleline'
			),
			'target'=>array(
				'type'=>'boolean'
			)
		);
	}

	public function run()
	{
		$this->render('hyperlink');
		parent::run();
	}
}