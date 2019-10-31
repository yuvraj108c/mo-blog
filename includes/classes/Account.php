<?php
class Account
{
    private $errorArray;
    public function __construct()
    {
        $this->errorArray = array();
    }
    public function validateUserLogin($username, $password)
    {
        $isValid = false;
        $usersXML = simplexml_load_file(Constants::$usersXmlPath);

        foreach($usersXML as $user){
            if($user->username == $username && strtolower($user->password) == strtolower(md5($password))){
                $isValid = true;
                break;
            }
        }

        if(!$isValid){
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
        }else{
            return true;
        }
    }

    public function getErrors()
    {
        return $this->errorArray;
    }
}