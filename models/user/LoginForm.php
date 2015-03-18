<?php

namespace app\models\user;

use yii\base\Model;

class LoginForm extends Model {
    public $username;
    public $password;
    public $rememberMe = true;
    
    public $user;
    
    private $duration = 3600;
    
    public function rules() {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }
    
    public function validatePassword($attributeName)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser($this->username);
            
            if ($user && $this->isCorrectHash($this->attributeName, $user->password)) {
                $this->addError('password', 'Username or password not correct.');
            }
        }
    }
    
    public function getUser()
    {
        if (!$this->user) {
            $this->user = UserRecord::findOne(['username', $this->userame]);
        }
        
        return $this->user;
    }
    
    public function isCorrectHash($plaintext, $hash)
    {
        return \Yii::$app->security->validatePassword($plaintext, $hash);
    }
    
    public function login() {
        if ($this->validate() == false) {
            return false;
        } else {
            $user = $this->getUser();
            if ($user == false) {
                return false;
            } else {
                return \Yii::$app->user->login($user, $this->rememberMe ? $this->duration : 0);
            }
        }
    }
}
