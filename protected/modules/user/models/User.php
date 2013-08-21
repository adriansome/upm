<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $oldEmail
 * @property string $password
 * @property string $permissions
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $dateTermsAgreed
 * @property string $dateUpdated
 * @property string $dateLastLogin
 * @property string $dateCreated
 * @property string $dateValidationEmailSent
 * @property string $activationCode
 * @property string $dateEmailValidated
 * @property string $dateAccountExpire
 * @property string $dateRevert
 * @property string $dateReset
 * @property string $dateDeleted
 */
class User extends CActiveRecord
{
	public $password1;
  	public $password2;
  	public $emailChanged = false;

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
			array('email, username, firstname, lastname', 'required', 'on'=>'register, update, adminUpdate'),
			array('fullname', 'safe'),
			array('password1, password2', 'required', 'on'=>'register, passwordReset, updatePassword'),
			array('password', 'required', 'on'=>'emailRevert'),
			array('permissions', 'required', 'on'=>'adminUpdate'),
			array('email, oldEmail, firstname, lastname', 'length', 'max'=>140),
			array('password', 'length', 'max'=>60),
			array('password2', 'compare', 'compareAttribute'=>'password1'),
			array('permissions', 'length', 'max'=>6),
			array('username, activationCode', 'length', 'max'=>40),
			array('dateUpdated, dateLastLogin, dateValidationEmailSent, dateEmailValidated, dateAccountExpire, dateRevert, dateReset, dateDeleted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, oldEmail, password, password1, password2, permissions, username, firstname, lastname, fullname, dateTermsAgreed, dateUpdated, dateLastLogin, dateCreated, dateValidationEmailSent, activationCode, dateEmailValidated, dateAccountExpire, dateRevert, dateReset, dateDeleted', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'oldEmail' => 'Old Email',
			'password1' => 'Password',
			'password2' => 'Confirm Password',
			'permissions' => 'Permissions',
			'username' => 'Username',
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'fullname' => 'Full Name',
			'dateTermsAgreed' => 'Date Terms Agreed',
			'dateUpdated' => 'Date Updated',
			'dateLastLogin' => 'Date Last Login',
			'dateCreated' => 'Date Joined',
			'dateValidationEmailSent' => 'Date Validation Email Sent',
			'activationCode' => 'Activation Code',
			'dateEmailValidated' => 'Date Email Validated',
			'dateAccountExpire' => 'Date Account Expire',
			'dateRevert' => 'Date Revert',
			'dateReset' => 'Date Reset',
			'dateDeleted' => 'Date Deleted',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('oldEmail',$this->oldEmail,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('permissions',$this->permissions,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('dateTermsAgreed',$this->dateTermsAgreed,true);
		$criteria->compare('dateUpdated',$this->dateUpdated,true);
		$criteria->compare('dateLastLogin',$this->dateLastLogin,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);
		$criteria->compare('dateValidationEmailSent',$this->dateValidationEmailSent,true);
		$criteria->compare('activationCode',$this->activationCode,true);
		$criteria->compare('dateEmailValidated',$this->dateEmailValidated,true);
		$criteria->compare('dateAccountExpire',$this->dateAccountExpire,true);
		$criteria->compare('dateRevert',$this->dateRevert,true);
		$criteria->compare('dateReset',$this->dateReset,true);
		$criteria->compare('dateDeleted',$this->dateDeleted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getFullname()
	{
		return $this->firstname.' '.$this->lastname;
	}

	public function getResetCodeExpiryTime()
	{
		// Return time 1 hour from when reset request was made.
		return (strtotime($this->dateReset)+3600);
	}

	public function delete()
	{
		if(Yii::app()->user->permissions == 'admin')
			parent::delete();
		else
		{
			$this->dateDeleted = new CDbExpression('NOW()');
			$this->revertCode = $this->generateUniqueId();
			$this->sendRevertEmail('user.views.mail.deletionEmail');
			$this->save();
		}
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
		{
			$now = new CDbExpression('NOW()');
			$this->dateTermsAgreed = $now;
			$this->dateCreated = $now;
		}

		if($this->scenario == 'register')
		{
			$this->updatePassword();
			$this->activationCode = $this->generateUniqueId();
			$this->sendValidationEmail();
			$this->dateValidationEmailSent = new CDbExpression('NOW()');
		}

		else if($this->scenario == 'update' || $this->scenario == 'updatePassword' || $this->scenario == 'adminUpdate')
		{
			$this->dateUpdated = new CDbExpression('NOW()');

			if($this->scenario == 'update')
			{
				if(!empty($this->password1) && !empty($this->password2) && $this->password1 == $this->password2)
				{
					$this->updatePassword();
					$this->dateRevert = new CDbExpression('NOW()');
					$this->revertCode = $this->generateUniqueId();
					$this->sendRevertEmail('user.views.mail.passwordChangeEmail');
				}

				if($this->emailChanged)
				{
					$this->dateRevert = new CDbExpression('NOW()');
					$this->revertCode = $this->generateUniqueId();
					$this->sendRevertEmail('user.views.mail.emailChangeEmail');
				}
			}
		}

		else if($this->scenario == 'updatePassword')
		{
			$this->updatePassword();
			$this->resetCode = null;
			$this->sendRevertEmail('user.views.mail.passwordChangeEmail');
		}

		else if($this->scenario == 'validate')
		{
			$this->dateEmailValidated = new CDbExpression('NOW()');
			$this->activationCode = null;
		}

		else if ($this->scenario == 'revertEmail')
		{
			$this->email = $this->oldEmail;
			$this->oldEmail = null;
			$this->revertCode = null;
		}

		else if ($this->scenario == 'revertDelete')
		{
			$this->dateDeleted = null;
			$this->revertCode = null;
		}

		return parent::beforeSave();
	}

	protected function sendValidationEmail()
	{
		$validationEmail = new YiiMailMessage;
		$validationEmail->view = 'user.views.mail.validationEmail';
		$validationEmail->setBody(array('fullname'=>$this->fullname, 'uid'=>$this->activationCode), 'text/html');
		$validationEmail->addTo($this->email);
		$validationEmail->from = Yii::app()->params['adminEmail'];
		Yii::app()->mail->send($validationEmail);
	}

	protected function sendCredentialsEmail()
	{
		$uidExpires = date('H:i:s', $this->resetCodeExpiryTime);
		$credentialsEmail = new YiiMailMessage;
		$credentialsEmail->view = 'user.views.mail.credentialsEmail';
		$credentialsEmail->setBody(array('fullname'=>$this->fullname, 'username'=>$this->username, 'uid'=>$this->resetCode, 'uidExpires'=>$uidExpires), 'text/html');
		$credentialsEmail->addTo($this->email);
		$credentialsEmail->from = Yii::app()->params['adminEmail'];
		Yii::app()->mail->send($credentialsEmail);
	}

	protected function sendRevertEmail($message)
	{
		$revertEmail = new YiiMailMessage;
		$revertEmail->view = $message;
		$revertEmail->setBody(array('fullname'=>$this->fullname, 'uid'=>$this->revertCode), 'text/html');
		$revertEmail->addTo($this->email);
		$revertEmail->from = Yii::app()->params['adminEmail'];
		Yii::app()->mail->send($revertEmail);
	}

	private function generateUniqueId()
	{
		return md5(uniqid($this->email, true));
	}

	public function recordSuccessfulLogin()
	{
		$this->dateLastLogin = new CDbExpression('NOW()');
		return $this->save();
	}

	public function resetCredentials()
	{
		$this->dateReset = new CDbExpression('NOW()');
		$this->resetCode = $this->generateUniqueId();
		$this->sendCredentialsEmail();
		return $this->save();
	}

	private function updatePassword()
	{
		$ph = new PasswordHash(Yii::app()->params['phpass']['iteration_count_log2'], Yii::app()->params['phpass']['portable_hashes']);
		$this->password = $ph->HashPassword($this->password1);
	}
}