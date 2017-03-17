<?php
namespace frontend\models;

use common\models\UserModel;
use yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $rePassword;
    //验证码
    public $verifyCode;

    /**
     * 验证规则
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\UserModel', 'message' => '用户名已存在'],
            ['username', 'string', 'min' => 3, 'max' => 16],
            ['username', 'match', 'pattern' => '/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u', 'message' => '用户名由字母、汉字、数字、下划线组成，且不能以数字或下划线开头'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\UserModel'],

            [['password', 'rePassword'], 'required'],
            [['password', 'rePassword'], 'string', 'min' => 6],
            ['rePassword', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('common', 'Two times the password is not consistent.')],
            //框架自带验证码验证规则
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username'   => '用户名',
            'email'      => Yii::t('common', 'Email'),
            'password'   => Yii::t('common', 'Password'),
            'rePassword' => '重复密码',
            'verifyCode' => '验证码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user           = new UserModel();
        $user->username = $this->username;
        $user->email    = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}