<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class RegistryForm extends Model
{
    public $username;
    public $password;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            //проверим, есть ли пользователь с таким именем
            ['username', 'validateUsername'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateUsername($attribute, $params)
    {
        echo 'lalala';
        if(!$this->hasErrors()){
            if(User::findByUsername($this->username)){
                 $this->addError($attribute, 'Пользователь с таким именем уже существует');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->password = $this->password;
            var_dump($user->username);
            var_dump($user->password);
            $result = Yii::$app->db->createCommand()
                        ->insert('user', array('username'=>$this->username, 'password'=>$this->password))
                        ->query();
            if($result){
                return Yii::$app->user->login($this->getUser(), 3600*24*30);    
            }
            else{
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
            //$this->_user = UserDB::find()->where(['username'=>$this->username])->one();
        }
        return $this->_user;
    }
}
