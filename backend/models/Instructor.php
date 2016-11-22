<?php

namespace backend\models;

use Yii;
use backend\models\Project;
/**
 * This is the model class for table "instructor".
 *
 * @property integer $ins_ID
 * @property string $name
 * @property string $sex
 * @property string $degree
 * @property string $researchDirection
 * @property string $email
 * @property integer $phone
 * @property string $dept_name
 */
class Instructor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    

    public static function tableName()
    {
        return 'instructor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sex', 'degree', 'researchDirection', 'dept_name'], 'required'],
            [[ 'phone'], 'integer'],
            [['sex'],'string', 'max' => 4],
            [['email'],'email'],
            [['email'],'string','max'=>128],
            [['name'], 'string', 'max' => 11],
            [['degree', 'dept_name'], 'string', 'max' => 8],
            [['researchDirection'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ins_ID' => 'Ins  ID',
            'name' => '导师姓名',
            'sex' => '性别',
            'degree' => '职称',
            'researchDirection' => '研究方向',
            'email' => '邮箱地址',
            'phone' => '联系电话',
            'dept_name' => '所属系别',
        ];
    }
    
    public static function getInstructorList()
    {
        $data=Instructor::findBySql("SELECT `ins_ID`,`name`from `instructor`")->all();
        $d=array();
        foreach ($data as $keys){
            $d[$keys['ins_ID']]=$keys['name'];
        }
        return $d;
    }
   
    public function getOrder()
    {
        return $this->hasMany(Project::classname(),['ins_ID'=>'ins_ID']);
    }
}
