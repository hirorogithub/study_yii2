<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property integer $resume_ID
 * @property integer $student_ID
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
            [['resume_ID', 'student_ID', 'project_ID'], 'required'],
            [['resume_ID', 'student_ID', 'project_ID'], 'integer'],
            [['time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resume_ID' => 'Resume  ID',
            'student_ID' => 'Student  ID',
            'project_ID' => 'Project  ID',
            'time' => 'Time',
        ];
    }
}
