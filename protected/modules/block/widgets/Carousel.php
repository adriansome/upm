<?php 
Yii::import('application.vendors.caroufredsel.ECarouFredSel');

class Carousel extends ListWidget
{
	public $options=array();

	public function run()
	{
		$this->scenario = 'container';

		$caroufredsel = $this->createWidget('ECarouFredSel',array(
			'id' => 'carousel',
			'target' => '.carousel',
			'config' => $this->options,
		));

		$caroufredsel->run();
		
		parent::run();
	}
}