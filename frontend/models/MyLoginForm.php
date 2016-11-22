<?php
namespace frontend\models;

use common\models\LoginForm;
class MyLoginForm extends LoginForm{
    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
             
            'username' => '用户名',
    
            'password' => '密码',
    
            'rememberMe' => '记住密码',
             
        ];
    }
}
