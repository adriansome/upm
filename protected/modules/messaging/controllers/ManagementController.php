<?php

class ManagementController extends Controller
{
	public function actionIndex()
	{
        // Get all available templates
        $templates = MessageCentre::getTemplates();
        
		$dataProvider = new CActiveDataProvider('Message');

		$this->renderPartial('index', array(
            'templates' => $templates,
            'dataProvider' => $dataProvider
        ));
	}
    
    /**
     * Edit this template
     * @param string $name
     *      The name of the template to edit
     */
    public function actionEdit($name='')
    {
        $template = new Template;
        $row = $template->findByAttributes(array(
            'name' => $name
        ));
        
        // If a row doesn't exist
        if ($row === null) {
            $template->name = $name;
            if ($template->save()) {
                $row = $template->findByAttributes(array(
                    'name' => $name
                ));            
            }
        }
        
        if (isset($_POST['Template'])) {
            $row->header = $_POST['Template']['header'];
            $row->footer = $_POST['Template']['footer'];
            if ($row->save()) {
                $response['success'] = $row->name.' has been saved.';
                $response['id'] = $row->id;
            }
            else
                $response['error'] = $row->name.' could not be saved.';

            echo json_encode($response);
            exit;
        }
        
        $this->renderPartial('edit', array('model' => $row));
    }
    
    /**
     * Deletes a message
     * @param type $name
     */
    public function actionDelete($name='')
    {
        if(isset($_POST['ajax']))
		{
			$response =array();
            $message = Message::model();
            
			if($message->deleteByPk($name))
				$response['success'] = 'Block has been deleted.';
			else
				$response['error'] = 'Unable to delete block.';
		}
		else
			$response['error'] = 'Invalid request';

		echo json_encode($response);

    }
    
    /**
     * View a message
     * @param type $name
     */
    public function actionView($name='') 
    {
        
        $message = Message::model();
        $model = $message->findByPk($name);

		$this->renderPartial('view', array(
            'id' => $name,
            'model' => $model
        ));        
    }    

}