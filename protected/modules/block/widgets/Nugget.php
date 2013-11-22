<?php
class Nugget extends BlockWidget
{
	public $isManaged;

	public function attributes()
	{
		return array(
			'title'=>array(
				'type'=>'singleline',
                'label'=>'Title'
			),
			'title_is_link'=>array(
				'type'=>'boolean',
                'label'=>'Make title a link'
			),
			'text'=>array(
				'type'=>'multiline',
                'label'=>'Text'
			),
			'href'=>array(
				'type'=>'singleline',
                'label'=>'Link address'
			),
			'target'=>array(
				'type'=>'boolean',
                'label'=>'Open a new window'
			),
			'link_in_body'=>array(
				'type'=>'boolean',
                'label'=>'Use a button for link'
			),
			'link_title'=>array(
				'type'=>'singleline',
                'label'=>'Link title tag'
			),
			'link_text'=>array(
				'type'=>'singleline',
                'label'=>'Button label'
			),
			'image_src'=>array(
				'type'=>'file',
                'label'=>'Image thumbnail'
			),
			'image_alt'=>array(
				'type'=>'singleline',
                'label'=>'Alternate text to image',
			),
			'image_title'=>array(
				'type'=>'singleline',
                'label'=>'Image title tag'
			),
		);
	}

	public function run()
	{
		$this->render('nugget');
		
		if(!$this->isManaged)
			parent::run();
	}
}