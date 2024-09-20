<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    const SCENARIO_NOPASS = 'nopass';
    
    public $username;
    public $email;
    public $password;
    public $password2;
    public $role;
    public $date;
    public $package;
    public $status;
    public $statusselect;
   

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['username', 'safe'],

            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            
            ['role', 'required'],
            ['role', 'integer', 'min' => 10, 'max' => 50],
            
            ['status', 'safe'],
            ['status', 'integer', 'min' => 0, 'max' => 20],
            ['statusselect', 'required'],
            ['statusselect', 'integer', 'min' => 0, 'max' => 1],

            ['password', 'required'],
            //['password', 'string', 'min' => 6],
            ['password','passwordStrength'],
            
            ['password2', 'required'],
            ['password2','passwordCompare'],
            
            [['username', 'email'], 'required', 'on' => self::SCENARIO_NOPASS],
            
            ['date', 'safe'],
       
        ];
    }

    public function passwordStrength($attribute, $params)
    {
        $password_required_length = 6;
        $password = $this->$attribute;
        
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        //$specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || /*!$specialChars ||*/ strlen($password) < $password_required_length) {
            //$this->addError($attribute, 'Password should be at least '.$password_required_length.' characters in length and should include at least one upper case letter, one number, and one special character.');
            $this->addError($attribute, 'Password should be at least '.$password_required_length.' characters in length and should include at least one upper case letter, and one number.');
        }
        
    }
    public function passwordCompare($attribute, $params)
    {
        
        $password = $this->password;
        $password2 = $this->$attribute;

        if($password !== $password2) {
            $this->addError($attribute, 'Passwords do not match.');
        }
        
    }
    
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_NOPASS] = ['username', 'email'];

        return $scenarios;
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($role,$status = NULL)
    {
        $this->role = $role;
        if(!empty($status)){
            $this->status = $status;
        }else{
            $this->status = 10;
        }        
        $this->validate();
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->email;
            $user->role = $role;
            $user->status = $this->status;
            
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();            
            return $user;
        }
        

        return false;
    }
    
    
    public function attributeLabels()
    {
        return [
            'password2' => 'Confirm Password',
        ];
    }
}
