<?php
class WebUser extends CWebUser
{
    public function __get($name)
    {
        if ($this->hasState('__userInfo')) {
            $user=$this->getState('__userInfo',array());
            
            if (isset($user[$name]))
                return $user[$name];
        }
 
        return parent::__get($name);
    }
 
    public function login($identity, $duration=0) {
        $this->setState('__userInfo', $identity->getUser());
        parent::login($identity, $duration);
    }

    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($operation, $params=array())
    {
        if (empty($this->id))
            return false; // Not identified => no rights

        $role = $this->getState("roles");

        if ($role === 'admin')
            return true; // admin role has access to everything

        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }

    public function isAdmin()
    {
        return $this->_checkUser('admin');
    }

    public function isEditor()
    {
        return $this->_checkUser('editor');
    }
    
    public function isLandlord()
    {
        return $this->_checkUser('landlord');
    }
    
    public function isUser()
    {
        return $this->_checkUser('user');
    }
    
    public function isLoggedIn()
    {
        return ($this->getIsGuest()) ? FALSE : TRUE;
    }
    
    /**
     * Check the user against a role type
     */
    protected function _checkUser($type)
    {
        $role = $this->getState("roles");
        return ($type === $role);
    }
}
