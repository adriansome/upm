<?php

class ManagementController extends UserController
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow admins to perform all actions
				'users'=>array('@'),
				'roles'=>array('admin'),
			),
            array('allow',
                'users' => array('@'),
                'roles' => array('landlord', 'user'),
                'actions' => array('sendNotification')
            ),
            array('allow',
                'actions' => array('update'),
                'users' => array('@')
            ),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$response['success'] = "User added";
			else
				$response['error'] = "Could not add user";
			echo json_encode($response);
			exit;
		}

		$this->renderPartial('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$response['success'] = $model->email.' has been saved.';
			else
				$response['error'] = $model->email.' could not be saved.';
			
			echo json_encode($response);
			exit;
		}

		$this->performAjaxValidation($model);

		$this->renderPartial('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(isset($_POST['ajax']))
		{
			$response =array();

			if($this->loadModel($id)->delete())
				$response['success'] = 'User has been deleted.';
			else
				$response['error'] = 'Unable to delete user.';
		}
		else
			$response['error'] = 'Invalid request';

		echo json_encode($response);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['User']))
	 		$model->attributes=$_GET['User'];

		$this->renderPartial('index',array(
			'model'=>$model,
			'dataProvider'=>$model->search(),
		));
	}

	public function actionResendEmailVerification($id)
	{
		if(isset($_POST['ajax']))
		{
			$response =array();

			$model = $this->loadModel($id);
			$model->scenario = 'resendEmailVerification';
			if($model->save())
				$response['success'] = 'Email sent.';
			else
				$response['error'] = 'Could not send email.';
		}
		else
			$response['error'] = 'Invalid request';

		echo json_encode($response);
	}

	public function actionSendCredentialsReminder($id)
	{
		if(isset($_POST['ajax']))
		{
			$response =array();

			$model = $this->loadModel($id);
			$model->scenario = 'credentialsReminder';
			if($model->save())
				$response['success'] = 'Email sent.';
			else
				$response['error'] = 'Could not send email.';
		}
		else
			$response['error'] = 'Invalid request';

		echo json_encode($response);
	}

	public function actionRevertEmailAddress($id)
	{
		if(isset($_POST['ajax']))
		{
			$response =array();

			$model = $this->loadModel($id);
			$model->scenario = 'revertEmailAddress';
			if($model->save())
				$response['success'] = 'Email sent.';
			else
				$response['error'] = 'Could not send email.';
		}
		else
			$response['error'] = 'Invalid request';

		echo json_encode($response);
	}

	public function actionReactivate($id)
	{
		if(isset($_POST['ajax']))
		{
			$response =array();

			$model = $this->loadModel($id);
			$model->scenario = 'revertDeletion';
			if($model->save())
				$response['success'] = 'User reactivated.';
			else
				$response['error'] = 'Could not reactivate user.';
		}
		else
			$response['error'] = 'Invalid request';

		echo json_encode($response);
	}
        
        /**
         * Sends a notification email to the user
         * 
         * @param type $id
         *      The ID of the user to send to
         * @param string $viewPath
         *      The view to use as a notification
         */
        public function actionSendNotification()
        {
            if (isset($_POST['ajax'])) {
                if (!isset($_POST['id']) || !isset($_POST['view_path'])) {
                    $response['error'] = "Missing required information to send notification";
                } else {
                    $id = (int)$_POST['id'];
                    if (!$this->getViewFile($_POST['view_path']) || !$id) {
                        $response['error'] = 'Invalid parameters';
                    } else {
                        $viewPath = $_POST['view_path'];
                        $model = $this->loadModel($id);
                        if (isset($_POST['params']) && is_array($_POST['params'])) {
                            $params = $_POST['params'];
                        } else {
                            $params = array();
                        }
                        if ($model->sendNotification($viewPath, $params)) {
                            $response['success'] = 'Notification sent';
                        } else {
                            $response['error'] = 'Could not send notification';
                        }
                    }
                }
                
            } else {
                $response['error'] = "Invalid request";
            }
            
            echo json_encode($response);
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
