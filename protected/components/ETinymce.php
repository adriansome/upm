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
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerScriptFile($this->tinymce.'/tinymce.min.js');
		$this->render('tinymce');
	}

	public function loadAssets()
	{
		$this->tinymce = Yii::app()->getAssetManager()->publish(
                Yii::getPathOfAlias('tinymce'
            )
        );

        $this->filemanager = Yii::app()->getAssetManager()->publish(
                Yii::getPathOfAlias('filemanager'
            )
        );
	}
}