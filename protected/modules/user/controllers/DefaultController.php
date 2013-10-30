<?php

class DefaultController extends UserController
{
	// Define form fields required for different registration user types
	private $_formFields = array(
		'landlord' => array(
			'steps' => array(
				'details' => array(
					'title' => 'Your Details',
					'desc' => 'Please tell us about yourself.',
					'fields' => -1
				)
			),
			'fields' => array(
				'firstname' => array(),
				'lastname' => array(),
				'phone_number' => array(),
				'email' => array('type' => 'email'),
				'address1' => array(),
				'address2' => array(),
				'area' => array(),
				'city' => array(),
				'county' => array(),
				'postcode' => array(),
				'country' => array(),
				'password1' => array('type' => 'password'),
				'password2' => array('type' => 'password'),
				'date_terms_agreed' => array('type' => 'checkbox'),
				'captcha_code' => array('type' => 'captcha')
			)
		),
		'user' => array(
			'steps' => array(
				'service' => array(
					'title' => 'Service Details',
					'desc'	=> 'Please tell us about your service history.',
					'fields' => 4
				),
				'details' => array(
					'title' => 'Your Details',
					'desc'	=> 'Please tell us about yourself.',
					'fields' => 9
				),
				'confirmation' => array(
					'title' => 'Confirmation',
					'desc'	=> 'Please confirm your details and accept the terms and conditions.'
				)
			),
			'fields' => array(
				'personnel_type' => array('type' => 'dropdown'),
				'personnel_rank' => array('type' => 'dropdown'),
				'personnel_service_number' => array(),
				'personnel_unit' => array(
					'tooltip' => "<p>Please enter the name of the last unit or ship you were on or were based in</p>"
				),
				'title' => array(),
				'initial' => array(),
				'lastname' => array(),
				'phone_number' => array(),
				'email' => array('type' => 'email'),
				'email_confirm' => array(
					'type' => 'email',
					'tooltip' => '<p>Your Email address will become your username.</p><p>It is important you have frequent access to this email address as it will be the main means for us to communicate with you.</p>'
				),
				'password1' => array('type' => 'password'),
				'password2' => array('type' => 'password'),
				'accessibility' => array('type' => 'textarea'),
				'date_terms_agreed' => array('type' => 'checkbox'),
				'captcha_code' => array('type' => 'captcha')
			)
		)
	);

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

    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
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
					'revertEmail',
					'captcha'
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

                if (isset($_POST['type'])) {
                    $regType = $_POST['type'];
                } else {
                    // Get the type of registration form to output
                    $regType = Yii::app()->request->getQuery('type', 'user');
                }

		// Default to user type registration if not a defined reg type
		if (!isset($this->_formFields[$regType])) {
                    $regType = 'user';
		}

		$outputFields = $this->_formFields[$regType];

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model, $regType);

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
                            if (isset($_POST['register-type'])) {
                                echo json_encode(array('error' => 'This email address has already been validated'));
                                exit;
                            } else {
                                $this->redirect(array('login', 'username'=>$record->username));
                            }
			else {
                            $regMethod = isset($_POST['register_method']) ? $_POST['register_method'] : 'ajax';
                            $model=$this->saveModel($model, $_POST['User'], 'registrationSuccess', $regType, $regMethod);
                            if ($model === TRUE) {
                                if (isset($_POST['success_view'])) {
                                    $view = $this->renderPartial($_POST['success_view'],
                                            array('type' => $regType), TRUE);
                                }
                                echo json_encode(array(
                                    'success' => 1,
                                    'html' => $view
                                ));
                                exit;
                            }

			}
		}

		$this->render('register',array(
                    'model'=>$model,
                    'reg_type' => $regType,
                    'form_fields' => $outputFields['fields'],
                    'steps' => $outputFields['steps']
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
			$this->setRefererSessionData($model->email, $model->id, $model->email);
			$this->redirect(array('login'));
		}
		else {
			$this->redirect(array('login'));
		}
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
			if($model->validate() && $model->login()) {
				$returnUrl = Yii::app()->user->returnUrl;
				if (Yii::app()->user->isLandlord()) {
                                    $returnUrl = '/profile';
                                } else {
                                    $returnUrl = '/';
                                }
				$this->redirect($returnUrl);
			}
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
					$this->setRefererSessionData($model->email, null, $model->email);
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
	public function actionProfile($id=null)
	{

		$role = Yii::app()->user->role;

		if (isset($this->_formFields[$role]['fields'])) {
			$fields = $this->_formFields[$role]['fields'];
		} else {
			$fields = array();
		}

		$view = 'profile';

		$themeView = 'webroot.themes.' . Yii::app()->theme->getName() . '.views.templates.profile';

		if ($this->getViewFile($themeView)) {
			$view = $themeView;

		}

		$this->render($themeView ,array(
                    'model'=>$this->loadModel(),
                    'fields' => $fields,
                    'id' => $id
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

	protected function saveModel($model, $attributes, $action, $regType='user', $regMethod='ajax')
	{

		if(!empty($model->email) && $attributes['email'] !== $model->email)
		{
			$model->old_email = $model->email;
			$model->emailChanged = true;
		}

                // Save fields dependent on registration type
		if (isset($this->_formFields[$regType])) {
			$fields = $this->_formFields[$regType]['fields'];
			foreach ($fields as $field_name => $properties) {
                            // Convert string to bool for checkboxes
                            if(isset($properties['type']) && $properties['type'] == 'checkbox') {
                                $attributes[$field_name] = ($attributes[$field_name]) ? 1 : 0;
                            }
                            $model->$field_name = $attributes[$field_name];
			}
		}

		if ($regType == 'landlord') {
			$model->scenario = 'register_landlord';
		}

		if($model->save())
		{
			if($action == 'registrationSuccess') {
                            $this->setRefererSessionData($model->email, $model->id, $model->email);
                            if ($regMethod == 'ajax') {
                                return TRUE;
                            }
                        }

                        $this->redirect(array($action));

		}

		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model, $regType='user')
	{

            if(isset($_POST['ajax']))
            {
                if (isset($_POST['User']['captcha_code'])) {
                    unset($_POST['User']['captcha_code']);
                }
                if ($_POST['ajax']==='user-form') {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
                } else if (strpos($_POST['ajax'], 'registration-form') !== FALSE) {
                    // Validate this step
                    foreach ($_POST['User'] as $field => $value) {
                        $attributes[] = $field;
                    }
                    echo CActiveForm::validate($model, $attributes);
                    Yii::app()->end();
                }

            }
	}
}
