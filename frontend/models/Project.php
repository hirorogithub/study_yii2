<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $pro_ID
 * @property string $title
 * @property integer $ins_ID
 * @property string $type
 * @property integer $level
 * @property string $apply_time
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_ID', 'title', 'ins_ID', 'type', 'level'], 'required'],
            [['pro_ID', 'ins_ID', 'level'], 'integer'],
            [['apply_time'], 'safe'],
            [['title'], 'string', 'max' => 32],
            [['type'], 'string', 'max' => 16],
            [['ins_ID'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pro_ID' => 'Pro  ID',
            'title' => 'Title',
            'ins_ID' => 'Ins  ID',
            'type' => 'Type',
            'level' => 'Level',
            'apply_time' => 'Apply Time',
        ];
    }
}
