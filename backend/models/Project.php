<?php

namespace backend\models;

use Yii;
use backend\models\Instructor;
/**
 * This is the model class for table "project".
 *
 * @property integer $pro_ID
 * @property string $title
 * @property integer $ins_ID
 * @property string $type
 * @property string $level
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
            [['title', 'ins_ID', 'type', 'level'], 'required'],
            [['ins_ID'], 'integer'],
            [['apply_time'], 'safe'],
            [['title', 'level'], 'string', 'max' => 32],
            [['type'], 'string', 'max' => 16],
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
            'name' => '导师姓名',
            'sex' => '性别',
            'degree' => '职称',
            'researchDirection' => '研究方向',
            'email' => '邮箱地址',
            'phone' => '联系电话',
            'dept_name' => '所属系别',
        ];
    }
    
    public function getInstructor()
    {
        return $this->hasOne(Instructor::className(),['ins_ID'=>'ins_ID']);
    }
}
