<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $student_name
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $grade
 * @property string $subject
 * @property integer $phone
 * @property string $GPA_discribe
 * @property string $self_discribe
 * @property integer $have_Init
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'grade', 'subject', 'phone', 'GPA_discribe', 'self_discribe', 'have_Init'], 'required'],
            [['status', 'created_at', 'updated_at', 'phone'], 'integer'],
            [['grade'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['subject','student_name'], 'string', 'max' => 16],
            [['GPA_discribe'], 'string', 'max' => 256],
            [['self_discribe'], 'string', 'max' => 512],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            //['have_Init', 'value' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '学号',
            'student_name'=>'姓名',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => '邮箱地址',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'grade' => '年级',
            'subject' => '专业',
            'phone' => '联系电话',
            'GPA_discribe' => '平均绩点',
            'self_discribe' => '自我描述',
            'have_Init' => 'Have  Init',
        ];
    }
    
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            $this->have_Init=1;
        }
        return true;
    }
    
    public static function getGradeList(){
        $year=date('Y');
        $result=array();
        for($i=4;$i>=0;$i--){
             $result[$year-$i]=strval($year-$i);
        }
        return $result;
    }
}
