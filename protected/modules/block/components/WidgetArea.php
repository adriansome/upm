<?php
class WidgetArea extends CWidget
{
	public $blocks = array();

	public function init()
	{
		
	}

	public function run()
	{
		foreach($this->blocks as $index=>$block)
			$this->widget($block['type'], $block['params']);
	}
}