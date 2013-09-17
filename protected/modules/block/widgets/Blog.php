<?php
class Blog extends ListWidget
{
	public function itemAttributes()
	{
		return array(
			'title'=>array(
				'type'=>'singleline',
			),
			'text'=>array(
				'type'=>'html',
			),
			'image'=>array(
				'type'=>'file',
			),
			'image_alt'=>array(
				'type'=>'singleline',
			),
			'image_title'=>array(
				'type'=>'singleline',
			),
			'link_text'=>array(
				'type'=>'singleline',
			),
			'author'=>array(
				'type'=>'singleline',
			),
			'date_published'=>array(
				'type'=>'date',
				'format'=>'d/m/Y'
			),
		);
	}

	public function run()
	{
		$this->render('listView');
		parent::run();
	}
}