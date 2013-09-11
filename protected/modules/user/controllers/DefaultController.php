<?php

class DefaultController extends UserController
{
		/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/single';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(
					'register',
					'resendEmailVerification',
					'validate',
					'login',
					'resetPassword',
					'forgottenCredentials',
					'reminderSent',
					'resetPasswordSuccess',
					'logout',
					'registrationSuccess',
					'revertDelete',
					'revertPassword',
					'revertEmail'
				),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(
					'profile',
					'update',
					'updateEmail',
					'updatePassword',
					'delete'
				),
				'users'=>array('@'),
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
	public function actionRegister()
	{
		$model=new User;
		$model->scenario = 'register';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']['email']))
		{
			$record=User::model()->find(array(
			  'select'=>array('date_deleted','date_email_validated','username'),
		      'condition'=>'email=:email',
		      'params'=>array(':email'=>$_POST['User']['email']),
		    ));

		    if(isset($record) && !isset($record->date_deleted) && !isset($record->date_email_validated))
		    {
		    	$model = $record;
		    	unset($record);
		    }

			if(isset($record->date_email_validated))
				$this->redirect(array('login', 'username'=>$record->username));
			else
				$model=$this->saveModel($model, $_POST['User'], 'registrationSuccess');
		}

		$this->render('register',array(
			'model'=>$model,
		));
	}

	public function actionRegistrationSuccess()
	{ 
		$model=$this->loadModel(Yii::app()->session['referer']['id']);

		if(isset($_GET['resend']) && $_GET['resend'] == 1)
		{
			$this->setRefererSessionData($model->username, $model->id);
			$this->redirect(array('resendEmailVerification'));
		}

		$this->render('registrationSuccess',array(
			'email'=>$model->email,
		));
	}

	public function actionResendEmailVerification()
	{
		$model = $this->loadModel(Yii::app()->session['referer']['id']);
		$model->scenario = 'resendEmailVerification';
		$model->save();
		$this->redirect(array('registrationSuccess'));
	}

	public function actionValidate($uid)
	{
		$model=$this->loadByUid('activation_code', $uid);
		$model->scenario = 'validate';

		if(empty($model->date_email_validated))
		{
			$model->save();
			$this->setRefererSessionData($model->username);
			$this->redirect(array('login'));
		}
		else
			$this->redirect(array('login'));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		$referer = null;
		$email = null;

		if(isset(Yii::app()->session['referer']))
		{
			$referer = Yii::app()->session['referer']['action'];
			$email = Yii::app()->session['referer']['email'];
			$model->username = Yii::app()->session['referer']['user'];
			unset(Yii::app()->session['referer']);
		}	

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}

		// display the login form
		$this->render('login',array(
			'model'=>$model,
			'referer'=>$referer,
			'email'=>$email,
		));
	}

	public function actionForgottenCredentials()
	{
		$model=new CredentialsForm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CredentialsForm']))
		{
			$model->attributes=$_POST['CredentialsForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->sendEmail())
				$this->redirect($this->createUrl('/user/default/reminderSent'));
		}

		$this->render('forgottenCredentials',array(
			'model'=>$model,
		));
	}

	public function actionReminderSent()
	{
		$this->render('reminderSent');
	}

	public function actionResetPassword($uid)
	{
		$model=$this->loadByUid('reset_code', $uid);

	    $model->scenario = 'updatePassword';

		// Get current time from MySQL server as unix timestamp.
		$command=Yii::app()->db->createCommand("SELECT NOW() as 'now';")->queryAll();
		$now=strtotime($command[0]['now']);

	    if($now < $model->reset_codeExpiryTime)
	    {
			if(isset($_POST['User']))
			{
				$model->password1 = $_POST['User']['password1'];
				$model->password2 = $_POST['User']['password2'];
				
				if($model->save())
				{
					$this->setRefererSessionData($model->username);
					$this->redirect(array('login'));
				}
			}

			$this->render('resetPassword',array(
				'model'=>$model,
			));
		}
		else
			$this->render('resetExpired');
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionProfile()
	{
		$this->layout='//layouts/righty';

		$this->render('profile',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$this->layout='//layouts/righty';

		$model=$this->loadModel();
	    
		$model->scenario = 'update';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model=$this->saveModel($model, $_POST['User'], 'profile');
			unset($_POST);
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateEmail()
	{
		$this->layout='//layouts/righty';

		$model=$this->loadModel();
	    
		$model->scenario = 'updateEmail';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->currentPassword = $_POST['User']['currentPassword'];
			$model->old_email = $model->email;
			$model->email = $_POST['User']['email'];
			
			if($model->save())
				$this->redirect(array('profile'));
		}

		$this->render('updateEmail',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdatePassword()
	{
		$this->layout='//layouts/righty';

		$model=$this->loadModel();
	    
		$model->scenario = 'updatePassword';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->currentPassword = $_POST['User']['currentPassword'];
			$model->password1 = $_POST['User']['password1'];
			$model->password2 = $_POST['User']['password2'];
			
			if($model->save())
				$this->redirect(array('profile'));
		}

		$this->render('updatePassword',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		$this->loadModel()->delete();
		$this->redirect(array('logout'));
	}

	public function actionRevertDelete($uid)
	{
		$model = $this->loadByUid('revert_code', $uid);
	    $model->scenario = 'revertDelete';
	   	$model->save();
	   	$this->setRefererSessionData($model->username, $model->id, $model->email);
		$this->redirect(array('login'));
	}

	public function actionRevertEmail($uid)
	{
		$model = $this->loadByUid('revert_code', $uid);
    	$model->scenario = 'revertEmail';
    	$model->save();
    	$this->setRefererSessionData($model->username, $model->id, $model->email);
		$this->redirect(array('login'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	protected function loadModel($id = null)
	{
		if(empty($id))
			$id = Yii::app()->user->id;

		$model=User::model()->findByPk($id);

		if(!isset($model))
			throw new CHttpException(404,'The requested page does not exist.');

		return $model;
	}

	protected function loadByUid($field, $uid)
	{
		$model=User::model()->find(array(
			'condition'=>"$field=:$field",
			'params'=>array(":$field"=>$uid),
	    ));

	    if(!isset($model))
			throw new CHttpException(404,'The requested page does not exist.');

		return $model;
	}

	protected function saveModel($model, $attributes, $action)
	{	
		if(!empty($model->email) && $attributes['email'] !== $model->email)
		{
			$model->old_email = $model->email;
			$model->emailChanged = true;
		}
		
		$model->email = $attributes['email'];
		$model->firstname = $attributes['firstname'];
		$model->lastname = $attributes['lastname'];
		$model->username = $attributes['username'];
		$model->password1 = $attributes['password1'];
		$model->password2 = $attributes['password2'];	

		if($model->save())
		{
			if($action == 'registrationSuccess')
				$this->setRefererSessionData($model->username, $model->id);

			$this->redirect(array($action));
		}
		
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