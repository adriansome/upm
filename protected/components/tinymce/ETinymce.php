<?php
class ETinymce extends CWidget
{
	public $model;
	public $attribute;
	public $name;
	public $id;
	public $value;
	public $htmlOptions = array();
	public $options = array();
	protected $tinymce;
	protected $filemanager;

	public function init()
	{
		$this->loadAssets();

		if(isset($this->htmlOptions['id']))
			$this->id = $this->htmlOptions['id'];
		else
			$this->htmlOptions['id'] = $this->id;

		$this->htmlOptions['class'] = 'tinymce';
	}

	public function run()
	{
		$this->render('tinymce');
	}

	public function loadAssets()
	{
		$this->tinymce = Yii::app()->getAssetManager()->publish(
                Yii::getPathOfAlias('application.vendors.tinymce'
            )
        );

        $this->filemanager = Yii::app()->getAssetManager()->publish(
                Yii::getPathOfAlias('application.vendors.filemanager'
            )
        );
	}
}