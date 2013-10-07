<?php

/**
 * UserIdentity represents the data needed to identify a user.
 * It contains the authentication method that checks if the provided
 * data can identify the user.
 */
class UserIdentity extends CUserIdentity
{
    const ERROR_NOT_ACTIVATED = 3;
    
    private $_id;
    private $_user;

    public function authenticate()
	{
		$record = User::model()->findByAttributes(array('username' => $this->username, 'date_deleted'=>null));
		$ph = new PasswordHash(Yii::app()->params['phpass']['iteration_count_log2'], Yii::app()->params['phpass']['portable_hashes']);
		
		if(!isset($record) || !empty($record->date_deleted))
            $this->errorCode = self::ERROR_USERNAME_INVALID;
		else if(md5($this->password) !== $record->password && !$ph->CheckPassword($this->password, $record->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else if(empty($record->date_email_validated))
            $this->errorCode = self::ERROR_NOT_ACTIVATED;
        else
		{
			//Is this a vanilla hash?
			if($record->password{0} !== '$')
			{
				$record->password = $ph->HashPassword($this->password);
				$record->save();
			}

			$this->_id = $record->id;
			$this->_user = $record->attributes;
			$this->setState('roles', $record->role); 
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
 
    public function getId()
    {
        return $this->_id;
    }

    public function getUser()
    {
        return $this->_user;
    }
}