<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $criteria = new CDbCriteria();
        $criteria->compare('user_name', $this->username);
        
        $user = Operator::model()->find($criteria);
        
		if($user == null)
        {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if($user->user_passwd != $this->password)
        {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        else
        {
            $this->setState('idOperator', $user->id);
            $this->setState('idTypeUser', $user->id_type_operator);
            $this->setState('userName', $user->nama);
            
            if($user->id_type_operator == 2)
            {
                 $this->setState('name', "admin");
            }
            else
            {
                 
                 $this->setState('name', "operator");
            }
            
       
            $this->errorCode = self::ERROR_NONE;
        }
        
        return !$this->errorCode;
	}
}