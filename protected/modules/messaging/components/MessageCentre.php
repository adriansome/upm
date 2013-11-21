<?php
class MessageCentre extends YiiMailMessage
{
    
    private $_message, $_templateData = array();
    
    public function __construct($template)
    {
        parent::__construct();
        $templates = self::getTemplates();
        // Make sure this template exists
        if (isset($templates[$template])) {
            $model = Template::model();
            $templateData = array('template' => $templates[$template]);
            $rowData = $model->findByAttributes(array(
                'name' => $template
            ));
            if ($rowData !== null) {
                $rowData = array('data' => $rowData->getAttributes());
                $this->_templateData = array_merge($templateData, $rowData);
            } else {
                $this->_templateData = $templateData;
            }

        } else {
            throw new Exception($template . " template does not exist");
        }

    }
    
    /**
     * Send the email
     * 
     * @param string $template
     *      The template to use to send the email
     */
    public function send()
    {
        
        $this->addTo($this->_getRecipient());
        
        $templateData = (isset($this->_templateData['data'])) 
                        ? $this->_templateData['data']
                        : array();

        $data = array_merge(array('message' => $this->_message), $templateData);
        $this->view = $this->_templateData['template']['alias'] . '.view';
        $this->setBody($data);

        if (!Yii::app()->mail->send($this)) {
            throw new Exception("Sending this email caused an error");
        } else {
            // Record this email
            $model = new Message;
            $model->from_email = key($this->getFrom());
            $model->message = $this->getBody();
            $model->subject = $this->getSubject();
            $model->recipients = implode(',', array_keys($this->getTo()));
            $model->created_date = date('Y-m-d');
            if (!$model->save()) {
                throw new Exception("Recording this message caused an error");
            }
        }
        return TRUE;
    }
    
    /**
     * Set the body of the view
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->_message = $message;
    }
    
    private function _getRecipient()
    {
        $templateRecipient = Yii::app()->params['adminEmail'];
        if (isset($this->_templateData['data']['recipient'])) {
            $recipient = $this->_templateData['data']['recipient'];
            if (!empty($recipient) && filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                $templateRecipient = $recipient;
            }
        }
        return $templateRecipient;
    }
    
    /**
     * Get email templates available
     */
    public static function getTemplates()
    {
        
        $viewPath = '/views/emails/';
        
        // Get email templates for the active theme
        $templatePath = (Yii::app()->theme->basePath . $viewPath);
        
        $files = array_diff(scandir($templatePath), array('.', '..'));

        $templates = array();
        
        foreach ($files as $file) {
            if (is_dir($templatePath . $file)) {
                $templates[$file] = array(
                    'name' => ucfirst($file),
                    'path' => $templatePath . $file . DIRECTORY_SEPARATOR,
                    'alias' => 'webroot.themes.' . Yii::app()->theme->getName() 
                            . '.views.emails.' . $file
                );
            }
        }
        
        return $templates;
    }
    
}