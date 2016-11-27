<?php

namespace backend\models;

use Yii;

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
            [['project_ID'], 'integer'],
            [['time'], 'safe'],
            [['username'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'resume_ID' => 'Resume  ID',
            'username' => 'Username',
            'project_ID' => 'Project  ID',
            'time' => 'Time',
        ];
    }
}
