<?php
class Form extends BlockWidget
{
    public $view, $json;
    protected $success, $errors;
    // Stores form config options, taken from JSON file
    private $_config = array();
    
    // Map field types to methods
    protected $_methodMapping = array(
        'text' => 'textField',
        'textarea' => 'textArea',
        'submit' => 'submitButton'
    );
    
    public function init()
    {
        
        // A JSON file must be used for setting fields and validation rules
        if ($this->json !== null) {
            $jsonPath = Yii::app()->theme->basepath . DIRECTORY_SEPARATOR 
                        . 'views' . DIRECTORY_SEPARATOR . $this->json . '.json';
            if (is_file($jsonPath)) {
                $jsonObj = json_decode(file_get_contents($jsonPath));
                $this->_config = $jsonObj;
            } else {
                throw new Exception("Could not load JSON file from: " . $jsonPath);
            }
        } else {
            throw new Exception('A JSON file must be set to load config from');        
        }
        parent::init();
        
        
    }
    
	public function attributes()
	{
        return Yii::app()->utility->object_to_array($this->_config->attributes);
	}

	public function run()
	{
        
        if (isset($this->_config->postHandler)) {
            $postHandler = $this->id . '-' . $this->_config->postHandler;
            if (isset($_POST[$postHandler])) {
                var_dump('YES!');
            }
        }
        
        $view = 'form';
        
        // Use a custom view to output form?
        if ($this->view !== null) {
            $viewPath = 'webroot.themes.' . Yii::app()->theme->getName() 
                . '.views.';
            $view = $viewPath . $this->view;
        }
        
		$this->render($view);
        // Don't allow editing of this block
        //parent::run();
	}
}