<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CredentialsForm extends CFormModel
{
	public $email;

	private $_user;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// email address is required
			array('email', 'required'),
			array('email', 'authenticate'),
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_user=User::model()->findByAttributes(array('email'=>$this->email));

			if(empty($this->_user))
				$this->addError('email','No account was found for this e-mail address');
			if(empty($this->_user->date_email_validated))
				$this->addError('email','Your e-mail address has not been validated');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function sendEmail()
	{
		if($this->_user===null)
			$this->_user=User::model()->findByAttributes(array('email'=>$this->email));

		if(!empty($this->_user))
		{
			$this->_user->resetCredentials();
			return true;
		}
		else
			return false;
	}
}
