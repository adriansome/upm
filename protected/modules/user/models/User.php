<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $old_email
 * @property string $password
 * @property string $role
 * @property string $username
 * @property string $title
 * @property string $initial
 * @property string $firstname
 * @property string $lastname
 * @property string $address1
 * @property string $address2
 * @property string $area
 * @property string $city
 * @property string $county
 * @property string $postcode
 * @property string $country
 * @property string $phone_number
 * @property string $personnel_type
 * @property string $personnel_rank
 * @property string $personnel_service_number
 * @property string $personnel_unit
 * @property string $accessibility
 * @property string $date_terms_agreed
 * @property string $date_updated
 * @property string $date_last_login
 * @property string $date_created
 * @property string $date_validation_email_sent
 * @property string $activation_code
 * @property string $date_email_validated
 * @property string $date_account_expire
 * @property string $date_revert
 * @property string $date_reset
 * @property string $date_deleted
 * @property string $reset_code
 * @property string $revert_code
 */
class User extends CActiveRecord
{
	public $email_confirm;
	public $captcha_code;
	public $password1;
  	public $password2;
  	public $currentPassword;
  	public $emailChanged = false;
  	public $searchTerm;
	
	public $personnel_type_dropdown = array(
		'serving' => 'Serving in the Armed Forces',
		'veteran' => 'A Veteran discharged since 2001 through injury',
		'widow' => 'I am a widow of a member of the Armed Forces in receipt of an attributable pension'
	);
	public $personnel_rank_dropdown = array(
		'Able Seaman' => 'Able Seaman',
		'Airman' => 'Airman',
		'Captain' => 'Captain',
		'Chief Petty Officer' => 'Chief Petty Officer',
		'Chief Technician' => 'Chief Technician',
		'Colonel or Above' => 'Colonel or Above',
		'Colour Sergeant' => 'Colour Sergeant',
		'Corporal' => 'Corporal',
		'Flight Lieutenant' => 'Flight Lieutenant',
		'Flight Sergeant' => 'Flight Sergeant',
		'Flying Officer' => 'Flying Officer',
		'Junior Technician' => 'Junior Technician',
		'Lance Corporal' => 'Lance Corporal',
		'Leading Seaman' => 'Leading Seaman',
		'Lieutenant Colonel' => 'Lieutenant Colonel',
		'Lieutenant or above' => 'Lieutenant or above',
		'Major' => 'Major',
		'Marine' => 'Marine',
		'Midshipman' => 'Midshipman',
		'Officer Cadet' => 'Officer Cadet',
		'Petty Officer' => 'Petty Officer',
		'Private' => 'Private',
		'Regimental Sergeant Major' => 'Regimental Sergeant Major',
		'Second Lieutenant' => 'Second Lieutenant',
		'Senior Aircraftman' => 'Senior Aircraftman',
		'Sergeant' => 'Sergeant',
		'Squadron Leader' => 'Squadron Leader',
		'Staff Sergeant' => 'Staff Sergeant',
		'Sub-Lieutenant' => 'Sub-Lieutenant',
		'Warrant Officer' => 'Warrant Officer',
		'Wing Commander and above' => 'Wing Commander and above',
		'WO2' => 'WO2',
		'Other' => 'Other'
	);
	
  	private $purgeRecord = false;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('personnel_type, personnel_rank, personnel_service_number, personnel_unit,
					email, email_confirm, lastname, title, initial, phone_number, date_terms_agreed',
					'required',
					'on'=>'register'),
			array('firstname, lastname, email, phone_number, date_terms_agreed', 'required', 'on' => 'register_landlord'),
			array('fullname', 'safe'),
			array('password1, password2', 'required', 'on'=>'register, passwordReset, updatePassword'),
			array('password1, password2', 'required', 'on'=>'emailRevert, updateEmail, updatePassword'),
			//array('currentPassword', 'authenticate', 'on'=>'emailRevert, updateEmail, updatePassword'),
			array('role', 'required', 'on'=>'adminUpdate'),
			array('email, old_email, firstname, lastname', 'length', 'max'=>140),
			array('captcha_code', 'captcha', 'on' => 'register, register_landlord'),
			array('password', 'length', 'max'=>60),
			array('password2', 'compare', 'compareAttribute'=>'password1'),
			array('email_confirm', 'compare', 'compareAttribute' => 'email', 'on' => 'register'),
			array('role', 'length', 'max'=>10),
			array('username, activation_code', 'length', 'max'=>40),
			array('searchTerm, currentPassword, date_updated, date_last_login, date_validation_email_sent, date_email_validated, date_account_expire, date_revert, dateReset, date_deleted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('searchTerm, id, email, old_email, password, password1, password2, role, username, firstname, lastname, fullname, date_terms_agreed, date_updated, date_last_login, date_created, date_validation_email_sent, activation_code, date_email_validated, date_account_expire, date_revert, dateReset, date_deleted', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'E-mail',
			'email_confirm' => 'Confirm E-mail address',
			'old_email' => 'Old E-mail', 'password' => 'Password',
			'currentPassword' => 'Current Password',
			'password1' => 'New Password',
			'password2' => 'Confirm New Password',
			'role' => 'role',
			'username' => 'Username',
			'personnel_type' => 'I am Currently',
			'personnel_rank' => 'Rank / Rating',
			'personnel_service_number' => 'Service Number',
			'personnel_unit' => 'Unit / Station / Ship',
			'title' => 'Title',
			'initial' => 'Initial',
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'fullname' => 'Name',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'area' => 'Area',
			'city' => 'City',
			'county' => 'County',
			'postcode' => 'Postcode',
			'country' => 'Country',
			'phone_number' => 'Telephone number',
			'accessibility' => 'Please tell us about any accessibility considerations you have when booking a holiday',
			'date_terms_agreed' => 'I agree to the Terms and Conditions (click here to read)',
			'date_updated' => 'Date Updated',
			'date_last_login' => 'Date Last Login',
			'date_created' => 'Date Joined',
			'date_validation_email_sent' => 'Date Validation Email Sent',
			'activation_code' => 'Activation Code',
			'date_email_validated' => 'Date Email Validated',
			'date_account_expire' => 'Date Account Expire',
			'date_revert' => 'Date Revert',
			'dateReset' => 'Date Reset',
			'date_deleted' => 'Date Deleted',
			'searchTerm' => 'Search Name or E-mail Address',
                        'captcha_code' => 'Please enter the displayed code'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->select = array('*', 'CONCAT(firstname, " ", lastname, " ", email) AS searchTerm');
		$criteria->compare('CONCAT(firstname, " ", lastname, " ", email)', $this->searchTerm, true);
		$criteria->compare('role', $this->role, true);
		
		$criteria->addCondition('date_deleted IS NULL');

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getFullname()
	{
                if (!$this->firstname) {
                    $fullname = $this->initial . '. ' . $this->lastname;
                } else {
                    $fullname = $this->firstname . ' ' . $this->lastname;
                }
		return $fullname;
	}

	public function getreset_codeExpiryTime()
	{
		// Return time 1 hour from when reset request was made.
		return (strtotime($this->date_reset)+3600);
	}

	public function setPurgeRecord($value)
	{
		if(Yii::app()->user->role == 'admin')
			$this->purgeRecord = true;
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$identity=new UserIdentity($this->username,$this->currentPassword);
			$identity->authenticate();

			if($identity->errorCode===UserIdentity::ERROR_USERNAME_INVALID)
				$this->addError('username','Username not found');
			
			if($identity->errorCode===UserIdentity::ERROR_PASSWORD_INVALID)
				$this->addError('currentPassword','Incorrect Password');

			if($identity->errorCode===UserIdentity::ERROR_NOT_ACTIVATED)
				$this->addError('username','Your e-mail address has not been validated');
		}
	}

	public function delete()
	{
		if($this->purgeRecord)
			return parent::delete();
		else
		{
			$this->date_deleted = new CDbExpression('NOW()');
			$this->revert_code = $this->generateUniqueId();
			$this->sendRevertEmail('user.views.mail.deletionEmail');
			return $this->save();
			
		}
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$now = new CDbExpression('NOW()');
			$this->date_terms_agreed = $now;
			$this->date_created = $now;
		}

		if($this->scenario == 'register')
		{
			$this->updatePassword();
			$this->activation_code = $this->generateUniqueId();
			$this->role = 'user';
			$this->sendValidationEmail();
			$this->date_validation_email_sent = new CDbExpression('NOW()');
		}
		
		if ($this->scenario == 'register_landlord') {
			$this->updatePassword();
			$this->activation_code = $this->generateUniqueId();
			$this->role = 'landlord';
			$this->sendValidationEmail();
			$this->date_validation_email_sent = new CDbExpression('NOW()');			
		}

		if($this->scenario == 'resendEmailVerification')
		{
			$this->sendValidationEmail();
			$this->date_validation_email_sent = new CDbExpression('NOW()');
		}

		else if($this->scenario == 'update' || $this->scenario == 'updatePassword' || $this->scenario == 'updateEmail' || $this->scenario == 'adminUpdate')
		{
			$this->date_updated = new CDbExpression('NOW()');
		}

		if($this->scenario == 'updateEmail')
		{
			$this->date_revert = new CDbExpression('NOW()');
			$this->revert_code = $this->generateUniqueId();
			$this->sendRevertEmail('user.views.mail.emailChangeEmail');
		}

		else if($this->scenario == 'updatePassword')
		{
			$this->updatePassword();
			$this->reset_code = null;
			// $this->sendRevertEmail('user.views.mail.passwordChangeEmail');
		}

		else if($this->scenario == 'validate')
		{
			$this->date_email_validated = new CDbExpression('NOW()');
			$this->activation_code = null;
		}

		else if ($this->scenario == 'revertEmail')
		{
			$this->email = $this->old_email;
			$this->old_email = null;
			$this->revert_code = null;
		}

		else if ($this->scenario == 'revertDelete')
		{
			$this->date_deleted = null;
			$this->revert_code = null;
		}

		return parent::beforeSave();
	}

	protected function sendValidationEmail()
	{
		$validationEmail = new YiiMailMessage;
		$validationEmail->view = 'user.views.mail.validationEmail';
		$validationEmail->setBody(array('fullname'=>$this->fullname, 'uid'=>$this->activation_code), 'text/html');
                $validationEmail->setSubject('Validate Email - ' . Yii::app()->name);
		$validationEmail->addTo($this->email);
		$validationEmail->from = Yii::app()->params['adminEmail'];
		return (Yii::app()->mail->send($validationEmail));
        }

	protected function sendCredentialsEmail()
	{
		$uidExpires = date('H:i:s', $this->reset_codeExpiryTime);
		$credentialsEmail = new YiiMailMessage;
		$credentialsEmail->view = 'user.views.mail.credentialsEmail';
		$credentialsEmail->setBody(array('fullname'=>$this->fullname, 'username'=>$this->username, 'uid'=>$this->reset_code, 'uidExpires'=>$uidExpires), 'text/html');
		$credentialsEmail->setSubject('Reset Password Request - ' . Yii::app()->name);
                $credentialsEmail->addTo($this->email);
		$credentialsEmail->from = Yii::app()->params['adminEmail'];
		Yii::app()->mail->send($credentialsEmail);
	}

	protected function sendRevertEmail($message)
	{
		$revertEmail = new YiiMailMessage;
		$revertEmail->view = $message;
		$revertEmail->setBody(array('fullname'=>$this->fullname, 'uid'=>$this->revert_code), 'text/html');
		$revertEmail->addTo($this->old_email ? $this->old_email : $this->email);
		$revertEmail->from = Yii::app()->params['adminEmail'];
		Yii::app()->mail->send($revertEmail);
	}
        
        /**
         * Sends a notification
         * @param type $view
         * @param array $params
         *      Additional params for view
         */
        public function sendNotification($view, array $params = array())
        {
            $notification = new YiiMailMessage;
            $notification->view = $view;
            if (isset($params['booking']) && $params['booking']) {
                $params['from_email'] = Yii::app()->user->email;
                $userModel = User::model()->findByPk(Yii::app()->user->id);
                $params['user_name'] = $userModel->getFullname();
                // Load landlord name
                if (isset($params['id']) && (int)$params['id']) {
                    $landlordModel = User::model()->findByPk($params['id']);
                    $params['landlord_name'] = $landlordModel->getFullname();
                } else {
                    // Don't try to send email without landlord info
                    return FALSE;
                }
            }
            $notification->setBody(array('data' => $this, 'params' => $params), 'text/html');
            $subject = 'Provisional Booking';
            if (isset($params['status'])) {
                $subject .= ucfirst($params['status']);
            }
            $notification->setSubject($subject);
            $notification->addTo($this->email);
            if (isset($params['from_email'])) {
                $from = $params['from_email'];
            } else {
                $from = Yii::app()->params['adminEmail'];
            }
            $notification->from = $from;
            return (Yii::app()->mail->send($notification));
            
        }

	private function generateUniqueId()
	{
		return md5(uniqid($this->email, true));
	}

	public function recordSuccessfulLogin()
	{
		$this->date_last_login = new CDbExpression('NOW()');
		return $this->save();
	}

	public function resetCredentials()
	{
		$this->date_reset = new CDbExpression('NOW()');
		$this->reset_code = $this->generateUniqueId();
		$this->sendCredentialsEmail();
		return $this->save();
	}

	private function updatePassword()
	{
		$ph = new PasswordHash(Yii::app()->params['phpass']['iteration_count_log2'], Yii::app()->params['phpass']['portable_hashes']);
		$this->password = $ph->HashPassword($this->password1);
	}
}