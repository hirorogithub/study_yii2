<?php

namespace frontend\models;

use Yii;
use backend\models\Instructor;
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
            [['pro_ID', 'title', 'ins_ID', 'type', 'level','has_viewed'], 'required'],
            [['pro_ID', 'ins_ID', 'level','has_viewed'], 'integer'],
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
            'title' => '项目名称',
           'ins_ID' => '导师ID',
           'type' => '项目类型',
           'level' => '项目级别',
           'apply_time' => '申请时间',
           'has_viewed' => '浏览数'
        ];
    }
    
    public function getInstructor()
    {
        return $this->hasOne(Instructor::className(),['ins_ID'=>'ins_ID']);
    }
}
