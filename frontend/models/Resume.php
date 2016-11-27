<?php

namespace frontend\models;

use Yii;
use frontend\models\Project;
use frontend\models\User;
/**
 * This is the model class for table "resume".
 *
 * @property integer $resume_ID
 * @property string $username
 * @property integer $project_ID
 * @property string $time
 */
class Resume extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'project_ID'], 'required'],
            [['resume_ID', 'project_ID'], 'integer'],
            [['time' ,'username'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resume_ID' => 'Resume  ID',
            'username' => '学号',
            'project_ID' => 'Project  ID',
            'time' => 'Time',
        ];
    }
    
    public function sendMail($pro_id){
        $project=Project::findOne($pro_id);
        $student=User::findOne(Yii::$app->user->id);
        return Yii::$app
        ->mailer
        ->compose('resume_send',[
            'student'=>$student,
            'project'=>$project,
        ])
        ->setFrom([Yii::$app->params['supportEmail'] => '申报系统邮件机器人'])
        ->setTo($project->instructor->email)
        ->setSubject('简历信息')
        ->send();
    }
    
    
    public function getProject()
    {
        return $this->hasOne(Project::className(),['project_ID'=>'pro_ID']);
    }
}
